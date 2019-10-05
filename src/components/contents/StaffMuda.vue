<template>
  <div class="m-fnt">
    <div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
    <h1 class="staggeredAnim content-title">Pengumuman Staff Muda</h1>
    <input class="staggeredAnim" type="text" placeholder="Masukkan NIM" v-model="filterText">
    <button class="staggered-right" type="submit" @click='getPost()' >Cari</button>
    <h1 class="async-msg" v-if="responsemsg !== ''">{{ responsemsg }}</h1>
     <h1 class="async-msg" v-if="blogData.data.status == 'Diterima' ">Selamat, {{ blogData.data.nama }}.<br> Kamu diterima sebagai staff muda HIMATEKKOM.</h1>
     <h1 class="async-msg" v-if="blogData.data.status == 'Ditolak' ">Semangat ya, {{ blogData.data.nama }}.<br> Untuk saat ini kamu belum diterima sebagai staff muda HIMATEKKOM.<br> Silahkan mencoba di open recruitment staff ahli ya. Tetap berkontribusi untuk Himpunan kita.</h1>
    <img class="loading" src="/public/assets/spiner-802.svg" v-if="postLoad">
    <div class="back-header"></div>
  </div>
</template>

<script>
  const axios = require('axios');
  export default {
    data () {
      return {
        postLoad: true,
        filterText: "",
        blogData : {},
        list : [
          {
            class: 'grid-sizer',
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
        this.$http.get('http://himatekkom.ub.ac.id/public/posts/feeds.php?c=staffMuda&t=staffM&p='+this.filterText).then(response => {
          if (typeof response.data !=== 'object') {
            this.responsemsg = 'Nim tidak terdaftar.'
          } else {}
            this.blogData = response.data
            }
        }, response => {
          this.errorMsg('Terjadi kesalahan server.');
        }),
        this.postLoad = false;
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
          inner : 'Pengumuman Staff Muda'
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