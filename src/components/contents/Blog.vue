<template>
  <div class="m-fnt">
    <div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
    <h1 class="staggeredAnim content-title">Berita &amp; Artikel</h1>
    <h6 class="staggeredAnim content-caption">Ceritanya himatekkom</h6>
    <div class="row">
      <div class="col-xs-12 col-md-9 col-lg-10">
        <isotope ref="cpt" v-bind:options="isotopeOptions()" v-bind:list="list" v-images-loaded:on="callback" v-on:layout="doneLayout" class="grid-isotope">
            <div v-for="data,index in list" v-bind:class="data.class" v-bind:key="index">
              <router-link v-bind:to="'/artikel/'+data.link" v-if="data.class == 'grid-item'" class="center-align staggeredAnimIso">
                <img class="cover" v-bind:src="data.cover">
                <h5>{{ data.title }}</h5>
                <p v-html="data.shorttext"></p>
                <img v-if="data.featured == 1" class="star-featured" src="/public/assets/icon/favorite.svg">
              </router-link>
            </div>
        </isotope>
        <h3 class="async-msg" v-if="responsemsg != '' ">{{ responsemsg }}</h3>
        <button class="load-btn m-fnt" v-on:click="getPost" v-if="postLoaded && !overOffset">Muat Lebih</button>
        <img class="loading" src="/public/assets/spiner-802.svg" v-if="postLoad">
      </div>
      <div class="col-xs-12 col-md-3 col-lg-2 first-xs last-md right-side">
        <input type="text" placeholder="Cari" class="staggeredAnim" v-model="find" />
        <h4 class="partTitle staggeredAnim">Tahun</h4>
        <ul class="staggeredAnim">
          <li v-on:click="year = 0" v-bind:class="{'filter-active' : year == 0}">Semua</li>
          <li v-for="yeari,index in yearAvailable" v-on:click="year = yeari" v-bind:class="{'filter-active' : year == yeari}">{{ yeari }}</li>
        </ul>
        <h4 class="partTitle staggeredAnim">Urutkan</h4>
        <ul class="staggeredAnim">
          <li v-on:click="$refs.cpt.sort('new'); sorted = 0;" v-bind:class="{'sort-active' : sorted == 0}">Paling Terbaru</li>
          <li v-on:click="$refs.cpt.sort('view'); sorted = 1;" v-bind:class="{'sort-active' : sorted == 1}">Paling Dilihat</li>
          <li v-on:click="$refs.cpt.sort('like'); sorted = 2;" v-bind:class="{'sort-active' : sorted == 2}">Paling Disuka</li>
        </ul>
      </div>
    </div>
    <div class="back-header"></div>
  </div>
</template>

<script>

  var debounce = function(func, wait, immediate) {
    var timeout;
    return function(){
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  export default {
    data () {
      return {
        postLoad: true,
        postLoaded: false,
        list : [
          {
            class: 'grid-sizer'
          }
        ],
        yearAvailable : [],
        callback: {
          always: (instance) => {
            this.$refs.cpt.layout('masonry');
          }
        },
        find: "",
        year: 0,
        sorted : 0,
        filtered : '',
        responsemsg : '',
        offset: 0,
        overOffset: false
      }
    },
    methods: {
      errorMsg (msg) {
          this.responsemsg = msg;
          this.postLoad = false;
      },
      isotopeOptions () {
        return {
          itemSelector : '.grid-item',
          percentPosition: true,
          layoutMode: 'masonry',
          masonry: {
            columnWidth: '.grid-sizer',
            gutter: 40
          },
          sortAscending: false,
          getSortData: {
            new: (itemElem) => {
              return parseInt(itemElem.id);
            },
            view: (itemElem) => {
              return parseInt(itemElem.viewed);
            },
            like: (itemElem) => {
              return parseInt(itemElem.liked);
            }
          }
        }
      },
      doneLayout () {
        setTimeout(() => {
          this.postLoad = false;
          this.postLoaded = true;
          TweenMax.staggerTo('.staggeredAnimIso', 1.2, {
            scale: 1,
            opacity: 1,
            ease: Elastic.easeOut.config(1,0.3),
            onComplete: (tween) => {
              tween.target.classList.remove('staggeredAnimIso');
            },
            onCompleteParams:["{self}"]
          }, .1);
        },800)
      },
      getPost () {
        this.postLoaded = false;
        this.postLoad = true;

        this.$http.get('/public/posts/feeds.php?c=artikel&t=list&l=10&o='+this.offset+this.filtered).then(response => {

          this.list.splice(1, this.list.length - 1);

          if (!response.body.list) {
            this.errorMsg('Tidak ada berita atau artikel.');
            this.overOffset = true;
          } else {

            this.list = this.list.concat(response.body.list);
    
            this.errorMsg('');
            
            if (response.body.list.length == 8) {
              this.offset += 8;
            } else {
              this.overOffset = true;
            }

            this.$refs.cpt.layout('masonry');
            
          }

          if (!response.body.year) {} else {
            this.yearAvailable = response.body.year;
          }

        }, response => {
          this.errorMsg('Terjadi kesalahan server.');
        })
      },
      fdebounce : debounce((val, vms) => {
        vms.filtered = (val != 0)? '&f='+val : '';
      },700)
    },
    watch: {
      find (val, oldval) {
        if (val == true) {
          this.find = '';
        } else {
          if (oldval != true) {
            this.year = true;
            this.fdebounce(val, this);
          }
        } 
      },
      year (val, oldval) {
        if (val == true) {
          this.year = 0;
        } else {
          if (oldval != true) {
            this.find = true;
            this.filtered = (val != 0)? '&y='+val : '';
          }
        }        
      },
      filtered (val) {
        this.offset = 0;
        this.overOffset = false;
        this.getPost();
      }
    },
    mounted () {
      this.getPost();
      setTimeout(() => {
        TweenMax.staggerTo('.staggeredAnim', .8, {
          x: 1,
          opacity: 1,
          ease: Power2.easeOut
        }, .1);
      },600)

    },
    head: {
      title: {
        inner : 'Berita & Artikel'
      }
    }
  }
</script>

<style scoped>

  .loading {
    margin-top: 0;
  }

  .load-btn {
    display: block;
    margin: 0 auto;
    font-size: 12px;
    letter-spacing: 1px;
    padding: 8px 15px;
    background-color: #151A30;
    color: #7B86B2;
    font-weight: 700;
    border-radius: 4px;
    cursor: pointer;
    transition: color 0.2s ease;
  }

  .load-btn:hover {
    color: #f8f8f8;
  }

  .partTitle {
    margin: 15px 0 10px;
    color: #8B91AC;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .partTitle-val {
    font-size: 36px;
    line-height: 100%;
    color: #025eb7;
  }

  .sort-active,
  .filter-active {
    font-weight: 700;
    color: #f6871e;
  }

  .left-side {
    border-right: 1px solid #353E68;
  }

  .grid-isotope {
      margin-right: 0px;
    }

  .grid-sizer,
  .grid-item {
    width: 100%;
  }

  .grid-item {
    margin-bottom: 40px;
  }

  .grid-item a {
    padding: 15px;
    width: 100%;
    border: 3px solid #353E68;
    display: block;
    border-radius: 7px;
    background-color: #12162A;
    -webkit-box-shadow: 10px 10px 20px rgba(0,0,0,.5);
    -moz-box-shadow: 10px 10px 20px rgba(0,0,0,.5);
    box-shadow: 10px 10px 20px rgba(0,0,0,.5);
    opacity: 0;
    transform: scale(0.85);
    transition: border-color 0.4s ease;
  }

  .grid-item a:hover {
    border-color: #f6871e;
  }

  .grid-item .cover {
    width: 100%;
    border-radius: 3px;
  }

  .grid-item h5 {
    font-weight: 400;
    font-size: 15px;
    color: #025eb7;
    line-height: 130%;
    text-transform: uppercase;
    margin-top: 20px;
    letter-spacing: 1px;
  }

  .grid-item p {
    font-size: 14px;
    line-height: 130%;
    color: #f8f8f8;
    margin: 20px 0 5px;
  }

  .star-featured {
    position: absolute;
    top: -12px;
    left: -12px;
    width: 30px;
  }

  ol {
    margin-bottom: 8px;
    padding-left: 25px;
  }

  li {
    color : #C3C7DB;
    font-size: 15px;
    padding: 5px 15px;
    cursor: pointer;
  }

  .right-side {
    margin-bottom: 30px;
  }

  @media only screen and (min-width: 40em) {
    .grid-sizer,
    .grid-item {
      width: calc(100% / 2 - 40px);
    }

    .grid-isotope {
      margin-right: -40px;
    }
  }

  @media only screen and (min-width: 64em) {
    .grid-isotope {
      margin-right: 0px;
    }
  }

  @media only screen and (min-width: 75em) {

    .grid-sizer,
    .grid-item {
      width: calc(100% / 3 - 40px);
    }
  }

  @media only screen and (min-width: 100em) {
    .grid-sizer,
    .grid-item {
      width: calc(100% / 4 - 40px);
    }
  }


</style>