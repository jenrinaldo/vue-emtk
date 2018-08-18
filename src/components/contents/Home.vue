<template>
  <div class="m-fnt">
    <img class="loading" src="/public/assets/spiner-802.svg" v-if="postLoad">
    <div v-images-loaded:on="callback">
      <img class="route-lazy waitImg" src="/public/images/wallpaper/4.jpg" width="1643px" height="960px">
      <div class="wallpaper"></div>
      <div class="grad-overlay"></div>
      <div class="center-align">
        <h1 class="center-align staggered">#SatuDulur</h1>
        <h4 class="staggered">Siskom!, Siskom!, Satu Dulur Siskom!</h4>
        <div class="sosmed staggered">
          <h6 >Ikuti Kami</h6>
          <div>
            <a v-bind:href="social.line" target="_blank">
              <img src="/public/assets/icon/line.svg" height="20px" width="20px" alt="line-icon">
            </a>
            <a v-bind:href="social.fb" target="_blank">
              <img src="/public/assets/icon/facebook.svg" height="20px" width="20px" alt="facebook-icon">
            </a>
            <a v-bind:href="social.ig" target="_blank">
              <img src="/public/assets/icon/instagram.svg" height="20px" width="20px" alt="instagram-icon">
            </a>
            <a v-bind:href="social.yt" target="_blank">
              <img src="/public/assets/icon/youtube.svg" height="20px" width="20px" alt="youtube-icon">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      postLoad : true,
      social : {
        line: 'https://line.me/R/ti/p/%40slz1174b',
        fb: 'https://www.facebook.com/himatekkomub/',
        ig: 'https://www.instagram.com/himatekkomub/',
        yt: 'https://www.youtube.com/channel/UCPsvgSE2SpxWf0UECeeCxkA'
      },
      callback : {
        always : (instance) => {
          this.loaded();
        }
      }
    }
  },
  methods: {
    loaded () {
      setTimeout(() => { 
        this.postLoad = false;

        TweenMax.to('.wallpaper', 1.5, {
          scale: 1,
          opacity: 0.6,
          ease: Power3.easeInOut
        })

        TweenMax.to('.grad-overlay', 1.5, {
          opacity: 0.3,
          ease: Power3.easeInOut
        },.2)

        TweenMax.staggerTo('.staggered', 1.5, {
          scale: 1,
          opacity: 1,
          ease: Power3.easeInOut
        },.2)

      },600)
    }
  },
    head: {
      title: {
        inner : 'Home'
      }
    }
}
</script>

<style scoped>

  h1 {
    font-size: 60px;
    margin-top: 70px;
    transform: scale(1.5);
    opacity: 0;
    color: #f8f8f8;;
    position: relative;
    display: inline-block;
    z-index: 2;
    letter-spacing: 10px;
    font-weight:400;
    animation: animsss 6s ease-in-out 0s infinite alternate;
    font-family: 'Bungee Outline', cursive;
  }

  h1:before {
    content: '#SatuDulur';
    position: absolute;
    top: 2px;
    left: 2px;
    color: #f6871e;
    animation: anims .5s linear 0s infinite;
    z-index: -1;
  }

  h1:after {
    content: '#SatuDulur';
    position: absolute;
    top: 4px;
    left: 4px;
    color: #025eb7;
    animation: animss .5s linear 0s infinite;
    z-index:-1;
  }

  h4 {
    color: #f8f8f8;
    font-weight: 400;
    letter-spacing: 10px;
    text-transform: uppercase;
    transform: scale(1.5);
    opacity: 0;
    /*margin-top: 15px;*/
  }

  h6 {
    color: #AFB4CC;
    text-transform: uppercase;
    margin-bottom: 15px;
    letter-spacing: 5px;
  }

  .sosmed {
    position: fixed;
    bottom: 15px;
    left: 0;
    width: 100%;
    transform: scale(0.8);
    opacity: 0;
  }

  .sosmed a {
    width: 40px;
    display: inline-block;
  }

  .sosmed img {
    display: inline-block;
    width: 20px;
  }

  @keyframes anims {
    0% {
      top: 2px;
      left: 2px;
    }

    1% {
      top: 2px;
      left: -2px;
    }
    25% {
      top: 2px;
      left: -2px;
    }

    26% {
      top: -2px;
      left: -2px;
    }
    50% {
      top: -2px;
      left: -2px;
    }

    51% {
      top: -2px;
      left: 2px;
    }
    75% {
      top: -2px;
      left: 2px;
    }

    76% {
      top: 2px;
      left: 2px;
    }

  }

  @keyframes animss {
    0% {
      top: 4px;
      left: 4px;
    }

    1% {
      top: 0px;
      left: 4px;
    }
    25% {
      top: 0px;
      left: 4px;
    }

    26% {
      top: 0px;
      left: 0px;
    }
    50% {
      top: 0px;
      left: 0px;
    }

    51% {
      top: 4px;
      left: 0px;
    }
    75% {
      top: 4px;
      left: 0px;
    }

    76% {
      top: 4px;
      left: 4px;
    }

  }

  @keyframes animsss {
    0% {
      letter-spacing: 10px;
    }

    100% {
      letter-spacing: 18px;
    }
  }

  .wallpaper {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: url(/public/images/wallpaper/4.jpg) no-repeat center center;
    background-size: cover;
    z-index: -1;
   /* opacity: 0.5;*/
    transform: scale(0.8);
    opacity: 0;
  }

  .grad-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: -webkit-linear-gradient(-45deg, #f6871e 0%, #025eb7 100%);
    background: linear-gradient(-45deg, #f6871e 0%, #025eb7 100%);
    z-index: -1;
    opacity: 0;
  }


  .waitImg {
    display: none;
  }

  @media only screen and (max-width: 89.9375em) {
    h1 {
      margin-top: 10px;
    }
  }

  @media only screen and (max-width: 44.9375em) {
    h1 {
      font-size: 50px;
    }
  }

  @media only screen and (max-width: 39.9375em) {
    h1 {
      font-size: 40px;
    }
  }

  @media only screen and (max-width: 34.9375em) {

    h4 {
      font-size: 12px;
    }

    @keyframes animsss {
      0% {
        letter-spacing: 2px;
      }

      100% {
        letter-spacing: 10px;
      }
    }
  }

  @media only screen and (max-width: 29.9375em) {
    h1 {
      font-size: 30px;
    }
  }

  @media only screen and (max-width: 24.9375em) {
    h1 {
      font-size: 26px;
    }
  }

</style>