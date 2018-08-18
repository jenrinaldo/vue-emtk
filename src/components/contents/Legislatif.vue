<template>
  <div class="m-fnt">
    <div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
    <img class="loading" src="/public/assets/spiner-802.svg" v-if="imgLoad">
    <h1 class="staggeredAnim content-title">JAJARAN</h1>
    <h6 class="staggeredAnim content-caption">FPATK</h6>
    <div  v-images-loaded:on="callback">
      <div class="row center-xs">
        <div class="col-xs-12 col-sm-6 col-md-3 center-align staggeredAnim" v-for="nonkomisi in nonkomisis">
          <div class="wongpeople">
            <a v-bind:href="nonkomisi.ig" target="_blank">
              <img v-bind:src="nonkomisi.foto">
            </a>
            <h5>{{ nonkomisi.nama }}</h5>
            <p>{{ nonkomisi.sebagai }}</p>
          </div>
        </div>
      </div>
      <div class="staggeredAnim">
        <h4 class="center-align">Komisi</h4>
        <div class="staff-spacer"></div>
      </div>
      <div class="row center-xs staff">    
        <div class="col-xs-6 col-sm-3 center-align staggeredAnim" v-for="komisi in komisis">
          <div class="wongpeople">
            <a v-bind:href="komisi.ig" target="_blank">
              <img v-bind:src="komisi.foto">
            </a>
            <h5>{{ komisi.nama }}</h5>
            <p>{{ komisi.sebagai }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="back-header"></div>
  </div>
</template>

<script>

  export default {
    props: ['nonkomisis','komisis'],
    data () {
      return {
        imgLoad : true,
        callback: {
          always: (instance)=> {
            this.loaded();
          }
        }
      }
    },
    methods: {
      loaded () {
        setTimeout(() => {
          this.imgLoad = false;
          TweenMax.staggerTo('.staggeredAnim', .8, {
            x: 0,
            opacity: 1,
            ease: Power2.easeOut
          }, .1);
        },600)
      }
    },
      head: {
        title: {
          inner : 'Jajaran FPATK'
        }
      }
  }
</script>

<style scoped>

  h1 {
    letter-spacing: 10px;
  }

  h4 {
    margin: 7px 0 15px 0;
    color: #f8f8f8;
  }

  ul {
    margin-bottom: 8px;
    list-style: none;
  }

  li {
    color : #C3C7DB;
    font-size: 15px;
    padding: 8px 17px;
    letter-spacing: 1px;
    display: inline-block;
  }

  span.hl {
    font-weight: 800;
    color: #025eb7;
  }

</style>