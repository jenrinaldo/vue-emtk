<template>
    <div class="m-fnt">
      <img class="loading" src="/public/assets/spiner-802.svg" v-if="postLoad">
      <div class="row" v-images-loaded:on="callback">
        <div class="col-xs-12 col-lg-9 sec-artikel">
          <h6 class="breadcrumb staggeredAnim"><router-link to="/pengumuman"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp; Pengumuman</router-link> &nbsp;&nbsp;<i class="fa fa-caret-right"></i> &nbsp;&nbsp;{{ pengData.title }}</h6>
          <div class="cover-image staggeredAnim" v-if="pengData.cover != ''">
            <img v-bind:src="pengData.cover">
          </div>
          <h1 class="staggeredAnim content-title left-align">{{ pengData.title }}</h1>
          <h6 class="staggeredAnim content-caption left-align"><i class="fa fa-calendar"></i> {{ pengData.datecreated }} {{ pengData.timecreated }}&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i> {{ pengData.author }}&nbsp;&nbsp;&nbsp;<i class="fa fa-eye"></i> {{ pengData.viewed }}</h6>
          <section class="main-article staggeredAnim" v-html="pengData.htmlcontent">
          </section>
        </div>
        <div class="col-xs-12 col-lg-3">
          <h4 class="newnews staggeredAnim">Post Terbaru</h4>
          <ul class="list-new">
            <li v-for="data in list" class="staggeredAnim">
              <router-link v-bind:to="'/artikel/'+data.link">
                <img v-bind:src="data.cover">
                <h5>{{ data.title }} <span>{{ data.datecreated }}</span></h5>
              </router-link>
            </li>
          </ul>
        </div>
      </div>
      <h3 class="async-msg" v-if="responsemsg != '' ">{{ responsemsg }}</h3>
      <div class="back-header"></div>
    </div>
</template>

<script>

  export default {
    props : ['link'],
    data () {
      return {
        pagetitle : 'Pengumuman',
        pengData : {
          cover : ''
        },
        list : [],
        postLoad : true,
        callback: {
          always: (instance) => {
            this.loaded++;
            console.log(instance);
          }
        },
        loaded : 0,
        responsemsg : '',
      }
    },
    methods: {
      errorMsg (msg) {
        this.responsemsg = msg;
        this.postLoad = false;
      },
      getPost () {
        this.$http.get('/public/posts/feeds.php?c=pengumuman&t=data-list&l=5&o=0&li='+this.link).then(response => {
          if (!response.body.data || !response.body.list) {
            this.errorMsg('Pengumuman tidak tersedia.');
          } else {
            this.pengData = response.body.data;
            this.list = response.body.list;
            this.pagetitle = this.pengData.title;
            this.$emit('updateHead');
          }
        }, response => {
          this.errorMsg('Terjadi kesalahan server.');
        })
      }
    },
    watch: {
      loaded (val) {
        if (val == 1) {
          setTimeout(() => {
            this.postLoad = false;
            TweenMax.staggerTo('.staggeredAnim', .8, {
              x: 1,
              opacity: 1,
              ease: Power2.easeOut,
              onComplete: (tween) => {
                tween.target.classList.remove('staggeredAnim');
              },
              onCompleteParams:["{self}"]
            }, .1);
          },600)
        }
      }
    },
    mounted () { 
      this.getPost();
    },
    head: {
      title: function() {
        return {
          inner: this.pagetitle
        }
      }
    }
  }
</script>

<style scoped>

  .content-title {
    letter-spacing: 2px;
  }

  .breadcrumb {
    font-size: 14px;
    margin-bottom: 25px;
    color: #353E68;
  }

  .breadcrumb a {
    color: #025eb7;
    transition: color 0.2s ease;
  }

  .breadcrumb a:hover {
    color: #f8f8f8;
  }

  .cover-image {
    width: 100%;
    margin-bottom: 10px;
  }

  .cover-image img {
    width: auto;
    max-width: 100%;
    -webkit-box-shadow: 5px 5px 10px rgba(0,0,0,.2);
    -moz-box-shadow: 5px 5px 10px rgba(0,0,0,.2);
    box-shadow: 5px 5px 10px rgba(0,0,0,.2);
  }

  .newnews {
    color: #8B91AC;
    font-weight: 400;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
    margin-top: 40px;
    border-bottom: 1px dashed #353E68;
    padding-bottom: 10px;
  }

  .list-new {
    width: 100%;
  }

  .list-new li {
    border-bottom: 1px solid #191D35;
  }

  .list-new a {
    padding: 12px 0;
    width: 100%;
    overflow: hidden;
    display: block;
    transition: background 0.2s ease;
  }

  .list-new a:hover {
    background: #13172A;
  }

  .list-new img {
    width: 90px;
    display: inline-block;
    vertical-align: middle;
  }

  .list-new h5 {
    display: inline-block;
    width: calc(100% - 105px);
    margin-left: 10px;
    vertical-align: middle;
    font-weight: 400;
    letter-spacing: 1px;
    color: #C3C7DB;
  }

  .list-new h5 span {
    font-size: 13px;
    color: #8E94AF;
    font-style: italic;
    margin-top: 7px;
    display: block
  }

  .love-btn {
    display: block;
    width: 82px;
    height: 82px;
    margin: 45px auto 65px;
    border-radius: 50%;
    border: 2px dashed #353E68;
    cursor: pointer;
    text-align: center;
  }

  .love-btn i {
    padding: 15px 0;
    color: #353E68;
  }

  @media only screen and (min-width: 75em) {
    .sec-artikel {
      padding-right: 25px;
    }
  }

</style>