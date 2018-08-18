<template>
  <div>
    <appmain v-bind:sides="sideS" v-bind:pageready="pageReady"></appmain>
    <appheader v-bind:sides="sideS" v-on:pageready="pageReady = true"></appheader>
  </div>
</template>

<script>

import Header from './components/header.vue';
import Main from './components/main.vue';

import TweenMax from './assets/js/TweenMax';

export default {
  components: {
    'appheader': Header,
    'appmain' : Main
  },
  data () {
    return {
      sideS : {
        menuState : false,
        userState : false,
        msgState : false
      },
      pageReady: false
    }
  }
}
</script>

<style>
  @import url('./assets/css/font-faces.css');
  @import url('./assets/css/flexboxgrid.min.css');
  @import url('./assets/css/font-awesome.css');
  @import url('./assets/css/menu-hamburger.css');


  * {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    text-decoration: none;
    -webkit-user-select: none;
    -moz-user-select: moz-none;
    -ms-user-select: none;
    user-select: none;
  }

  ul {
    list-style: none;
  }

  ::-webkit-scrollbar {
    width: 4px;
    height: 4px;
  }
  ::-webkit-scrollbar-track {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    background-color: #141930;
  }
  ::-webkit-scrollbar-thumb {
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    background: #353E68;
  }

  input,
  textarea {
    font-size: 15px;
  /*  letter-spacing: 1px;*/
    background-color: rgba(238,238,238,.1);
    padding: 10px 18px;
    font-family: 'Catamaran', sans-serif;
    letter-spacing: 1px;
    width: 100%;
    border-radius: 3px;
    margin: 10px 0;
    color : #F8F8F8;
    -webkit-box-shadow: inset 0 0 10px rgba(0,0,0,.3);
    -moz-box-shadow: inset 0 0 10px rgba(0,0,0,.3);
    box-shadow: inset 0 0 10px rgba(0,0,0,.3);
  }

  button[type="submit"] {
    font-size: 16px;
    font-family: 'Ubuntu', sans-serif;
    border-radius: 4px;
    padding: 12px 30px;
    background-color: transparent;
    border: 2px solid rgba(238,238,238,.6);
    color : #f6871e;
    letter-spacing: 2px;
    margin: 10px 0;
    font-weight: 700;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    border: 2px solid #f6871e;
  }

  .u-fnt {
    font-family: 'Ubuntu', sans-serif;
  }

  .m-fnt {
    font-family: 'Catamaran', sans-serif;
    /*letter-spacing: 1px;*/
  }

  .rbd-clr {
    background-color: #050711;
  }

  .rb-clr {
    background-color: #0b0e1c;
  }

  .b-clr {
    background-color: #025eb7;
  }

  .w-clr {
    background-color: #F8F8F8;
  }

  .o-clr {
    background-color: #f6871e;
  }

  .r-clr {
    background-color: #e61d36;
  }

  .right-align {
    text-align: right !important;
  }

  .left-align {
    text-align: left !important;
  }

  .center-align {
    text-align: center !important;
  }

  .right {
    float: right;
  }

  .left {
    float: left;
  }


  body {
    width: 100%;
    height: 100%;
  }

  .slide-loader {
    position: fixed;
    top: 0;
    left: 0;
    height: 6px;
    background: -webkit-linear-gradient(left, #353E68 0%, #025eb7 100%);
    background: linear-gradient(to right, #353E68 0%, #025eb7 100%);
    z-index: 5;
    width: 0%;
    transition: width 0.5s ease-in-out;
  }

  .slide-loader > div {
    position: absolute;
    top: 0;
    left: 0%;
    height: 6px;
    background-color: #f6871e;
    width: 100px;
    transition: left 1.5s ease;
    border-radius: 6px;
    transform: translateX(-100px);
  }

  .staggeredAnim {
    opacity: 0;
    transform: translateX(-80px);
  }

  .content-title {
    color : #f6871e;
    text-align: center;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 15px;
    font-size: 22px;
  }

  .content-caption {
    text-align: center;
    font-size: 11px;
    letter-spacing: 1px;
    color: #8B91AC;
    text-transform: uppercase;
    margin-bottom: 35px;
  }

  .inlinelink {
    font-style: italic;
    font-weight: 700;
    color: #f6871e;
  }

  .wongpeople {
    display: block;
    margin: 15px 0;
  }

  .wongpeople a {
    display: inline-block;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 5px solid #353E68;
    -webkit-box-shadow: 10px 10px 20px rgba(0,0,0,.5);
    -moz-box-shadow: 10px 10px 20px rgba(0,0,0,.5);
    box-shadow: 10px 10px 20px rgba(0,0,0,.5);
    overflow: hidden;
  }

  .wongpeople img {
    width: 100%;
  }

  .wongpeople h5 {
    margin-top: 15px;
    font-size: 15px;
    color: #025eb7;
    letter-spacing: 1px;
  }

  .wongpeople p {
    margin-top: 0px;
    font-size: 12px;
    color: #8B91AC;
  }

  .staff {
    margin-top: 25px;
  }

  .staff h5 {
    color : #C3C7DB;
    font-size: 14px;
    font-weight: 400;
    letter-spacing: 1px;
  }

  .staff-spacer {
    width: 100%;
    height: 1px;
    border-top: 1px dashed #353E68;
  }

  .staff .wongpeople a {
    width: 90px;
    height: 90px;
    border-width: 4px;
  }

  .main-article p {
    margin-bottom: 15px;
    color : #C3C7DB !important;
    font-size: 15px;
    word-wrap: break-word;
    line-height: 200%;
    /*letter-spacing: 1px;*/
  }

  .main-article p img {
    margin: 20px !important;
    -webkit-box-shadow: 5px 5px 10px rgba(0,0,0,.2);
    -moz-box-shadow: 5px 5px 10px rgba(0,0,0,.2);
    box-shadow: 5px 5px 10px rgba(0,0,0,.2);
  }

  .main-article a {
    color: #025eb7;
    font-weight: 700;
  }

  .main-article blockquote {
    border-left : 5px dotted #353E68;
    padding-left: 15px;
  }

  .main-article ol,
  .main-article ul {
    margin: 0 0 15px 15px;
  }

  .main-article ul {
    list-style: initial !important;
  }

  .main-article li {
    color: #C3C7DB;
    font-size: 15px;
    line-height: 200%;
    padding-left: 10px;
  }

  .main-article table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 15px;
    border-spacing: 0;
    border-collapse: collapse;
  }

  .main-article td {
    border-top: 1px solid #151A2F;
    padding: 8px;
    vertical-align: top;
  }

  .main-article td > p {
    margin-bottom: 10px;
  }

  span.hl {
      font-weight: 800;
      color: #025eb7;
  }

  .loading {
    display: block;
    margin: 40px auto ;
  }

  .padder-right {
    padding-right: 25px;
  }

  .padder-left {
    padding-left: 25px;
  }

  .back-header {
    position: fixed;
    top: 0px;
    left: 0;
    height: 71px;
    width: 100%;
    background-color: #0b0e1c;
  }

  .async-msg {
    text-align: center;
    color: #313857;
    letter-spacing: 1px;
    font-weight: 400;
    padding: 30px 0;
  }

  .hexa {
    position: absolute;
    display: none;
    perspective: 400px;
  }

  .hexa img {
    height: 46px !important;
  }

  .hexa-left {
    left: 65px;
  }

  .hexa-left img {
    animation: hexaleft 6s cubic-bezier(0.77, 0, 0.175, 1) 0s infinite alternate;
  }

  @keyframes hexaleft {
    0% {transform: rotateX(0deg);}
    30% {transform: rotateX(0deg);}
    70% {transform: rotateX(180deg);}
    100% {transform: rotateX(180deg);}
  }

  @keyframes hexaright {
    0% {transform: scaleX(-1) rotateX(0deg);}
    30% {transform: scaleX(-1) rotateX(0deg);}
    70% {transform: scaleX(-1) rotateX(180deg);}
    100% {transform: scaleX(-1) rotateX(180deg);}
  }

  .hexa-right {
    right: 65px;
  }

  .hexa-right img {
    transform: scaleX(-1);
    animation: hexaright 6s cubic-bezier(0.77, 0, 0.175, 1) 0.3s infinite alternate;
  }

  .nav-tabs {
    width: 100%;
    border-bottom: 1px solid #353E68 ; 
    margin-bottom: 5px;
    text-align: center;
  }

  .nav-tabs > p {
    padding: 12px 20px;
    color: #8B91AC;
    display: inline-block;
    margin-left: -5px;
    border-bottom-style: solid;
    border-bottom-width: 4px;
    border-bottom-color: #0b0e1c;
    font-size: 13px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.4s ease;
  }

  .nav-tabs > p.active {
    color: #C3C7DB;
    font-weight: 700;
    border-bottom-color: #025eb7;
  }

  .nav-tabs-content {
    padding: 25px;
  }

  @media only screen and (min-width: 64em) {

    .hexa {
      display: block;
    }
  }

</style>
