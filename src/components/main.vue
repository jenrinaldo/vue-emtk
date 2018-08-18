<template>
  <div class="mainvue" v-bind:class="{'menu--open' : sides.menuState, 'user--open' : sides.userState, 'msg--open' : sides.msgState, 'scr-down' : scroll}">
    <div class="main-screen">
      <main v-if="pageready">
        <router-view v-bind:key="$route.fullPath"></router-view>
      </main>
      <div class="side-release-wrapper" v-if="sides.userState || sides.msgState || sides.menuState" v-on:click="sides.userState = false; sides.msgState = false; sides.menuState = false"></div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['sides', 'pageready'],
  data () {
    return {
      contacts : {
        telp: '085105445751',
        telpName: 'Syahriel',
        email: 'himatekkom@gmail.com'
      },
      social : {
        line: 'https://line.me/R/ti/p/%40slz1174b',
        fb: 'https://www.facebook.com/himatekkomub/',
        ig: 'https://www.instagram.com/himatekkomub/',
        yt: 'https://www.youtube.com/channel/UCPsvgSE2SpxWf0UECeeCxkA'
      },
      scroll : false
    }
  }
}
</script>

<style scoped>

  .side-release-wrapper {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    cursor: pointer;
  }
  
  .main-screen {
    z-index: 1;
    width: 100%;
    height: 100%;
    position: fixed;
    -webkit-box-shadow: 0 0 40px rgba(0,0,0,.8);
    -moz-box-shadow: 0 0 40px rgba(0,0,0,.8);
    box-shadow: 0 0 40px rgba(0,0,0,.8);
    background-color: #0b0e1c;
    transition: transform .9s cubic-bezier(0.77, 0, 0.175, 1);
  }

  .menu--open .main-screen {
    transform: translate(285px, 105px);
  }

  .user--open .main-screen,
  .msg--open .main-screen {
    transform: translate(-285px, 105px);
  }

  main {
    position: fixed;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    padding: 100px 35px 50px 35px;
    overflow-y: auto;
    overflow-x: hidden;
    transition: all 0.3s ease-in-out;
  }

  @media only screen and (min-width: 40em) {
    main {
      padding: 100px 65px 50px 65px;
    }
  }

  @media only screen and (min-width: 100em) {
    main {
      padding: 100px 130px 50px 130px;
    }
  }

</style>