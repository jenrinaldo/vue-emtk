<template>
  <div class="m-fnt">
    <div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
    <h1 class="staggeredAnim content-title">Pengumuman</h1>
    <h6 class="staggeredAnim content-caption">Penting !</h6>
    <input class="staggeredAnim" type="text" placeholder="Cari" v-model="filterText">
    <h3 class="async-msg" v-if="responsemsg != '' ">{{ responsemsg }}</h3>
    <img class="loading" src="/public/assets/spiner-802.svg" v-if="postLoad">
    <div>
      <isotope ref="cpt" v-bind:options="isotopeOptions()" v-bind:list="list" v-on:layout="doneLayout" class="grid-isotope">
          <div v-for="data,index in list" v-bind:class="data.class" v-bind:key="index">
            <router-link v-bind:to="'/pengumuman/'+data.link" v-if="data.class == 'grid-item'" class="center-align staggeredAnimIso">
              <h5>{{ data.title }}</h5>
              <p>{{ data.datecreated }}</p>
            </router-link>
          </div>
      </isotope>
    </div>
    <div class="back-header"></div>
  </div>
</template>

<script>

  export default {
    data () {
      return {
        postLoad: true,
        filterText: "",
        list : [
          {
            class: 'grid-sizer'
          }
        ],
        responsemsg : ''
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
            gutter: 25
          },
          getFilterData: {
            byText : (itemElem) => {
              if (itemElem.title != undefined) {
                return itemElem.title.toLowerCase().includes(this.filterText.toLowerCase());
              }
            }
          }
        }
      },
      doneLayout () {
        setTimeout(() => {
          this.postLoad = false;
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
        this.postLoad = true;
        this.$http.get('/public/posts/feeds.php?c=pengumuman&t=list&l=50&o=0').then(response => {
          if (!response.body.list) {
            this.errorMsg('Tidak ada pengumuman.');
          } else {
            this.list = this.list.concat(response.body.list);
          }
          this.$refs.cpt.layout('masonry');
        }, response => {
          this.errorMsg('Terjadi kesalahan server.');
        })
      }
    },
    watch: {
      filterText (val) {
        this.$refs.cpt.filter('byText');
      }
    },
    mounted () {
      this.getPost();
      setTimeout(() => {
        TweenMax.staggerTo('.staggeredAnim', .8, {
          x: 1,
          opacity: 1,
          ease: Power3.easeOut,
        }, .1);
      },600)
    },
      head: {
        title: {
          inner : 'Pengumuman'
        }
      }
  }
</script>

<style scoped>

  .content-caption {
    margin-bottom: 15px;
  }

  input {
    margin: 0 auto 15px;
    padding: 3px 0;
    background-color: transparent;
    border-bottom: 1px solid #353E68;
    display: block;
    width: 100%;
    max-width: 300px;
    font-size: 14px;
    text-align: center;
    transition: border 0.3s ease;
    border-radius: 0;
    box-shadow: none;
  }

  input:hover,
  input:focus {
    border-color: #f6871e;
  }

  .loading {
    margin-top: 0;
  }

  .grid-isotope {
    margin-right: 0px;
  }

  .grid-sizer,
  .grid-item {
    width: 100%;
  }

  .grid-item {
    margin-bottom: 25px;
  }

  .grid-item a {
    padding: 15px;
    width: 100%;
    border: 2px solid #12162A;
    display: block;
    border-radius: 5px;
    background-color: #12162A;
    -webkit-box-shadow: 10px 10px 20px rgba(0,0,0,.3);
    -moz-box-shadow: 10px 10px 20px rgba(0,0,0,.3);
    box-shadow: 10px 10px 20px rgba(0,0,0,.3);
    opacity: 0;
    transform: scale(0.7);
    transition: border-color 0.4s ease;
  }

  .grid-item a:hover {
    border-color: #f6871e;
  }

  .grid-item h5 {
    font-weight: 400;
    font-size: 15px;
    color: #f8f8f8;
    line-height: 130%;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .grid-item p {
    font-size: 14px;
    line-height: 130%;
    color: #025eb7;
    margin-top: 20px;
  }

  @media only screen and (min-width: 35em) {
    .grid-sizer,
    .grid-item {
      width: calc(100% / 2 - 25px);
    }

    .grid-isotope {
      margin-right: -25px;
    }
  }

  @media only screen and (min-width: 60em) {
    .grid-sizer,
    .grid-item {
      width: calc(100% / 3 - 25px);
    }
  }

  @media only screen and (min-width: 75em) {

    .grid-sizer,
    .grid-item {
      width: calc(100% / 4 - 25px);
    }
  }

  @media only screen and (min-width: 100em) {
    .grid-sizer,
    .grid-item {
      width: calc(100% / 5 - 25px);
    }
  }


</style>