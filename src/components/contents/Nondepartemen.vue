<template>
  <div class="m-fnt">
    <h6 class="breadcrumb staggeredAnim"><router-link to="/emtk/jajaran"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp; Jajaran EMTK</router-link> &nbsp;&nbsp;<i class="fa fa-caret-right"></i> &nbsp;&nbsp;{{ deptnama }}</h6>
      <div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
    <img class="loading" src="/public/assets/spiner-802.svg" v-if="imgLoad">
    <h1 class="staggeredAnim content-title">{{deptnama}}</h1>
    <h6 class="staggeredAnim content-caption">emtk</h6>
    <div class="row center-md" v-images-loaded:on="callback">
      <div v-for="per in pers" class="col-xs-12 col-sm-6 col-md-3 center-align staggeredAnim" >
        <div class="wongpeople">
          <a v-bind:href="per.ig" target="_blank">
            <img v-bind:src="per.foto">
          </a>
          <h5>{{ per.nama }}</h5>
          <p>{{ per.sebagai }}</p>
        </div>
      </div>
    </div>
    <div class="back-header"></div>
  </div>
</template>

<script>

  export default {
    props: ['deptnama','pers'],
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
      title: function() {
        return {
          inner: this.deptnama+' EMTK'
        }
      }
    }
  }
</script>

<style scoped>

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

  .wongpeople a {
    width: 140px;
    height: 140px;
  }

  .breadcrumb {
    font-size: 14px;
    margin-bottom: 25px;
    color: #353E68;
    text-transform: capitalize;
  }

  .breadcrumb a {
    color: #025eb7;
    transition: color 0.2s ease;
  }

  .breadcrumb a:hover {
    color: #f8f8f8;
  }

</style>