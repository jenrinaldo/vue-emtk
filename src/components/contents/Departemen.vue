<template>
    <div class="m-fnt">
      <h6 class="breadcrumb staggeredAnim"><router-link to="/emtk/jajaran"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp; Jajaran EMTK</router-link> &nbsp;&nbsp;<i class="fa fa-caret-right"></i> &nbsp;&nbsp;Departemen {{ deptnama.pendek }}</h6>
      <div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
      <img class="loading" src="/public/assets/spiner-802.svg" v-if="imgLoad">
      <h1 class="staggeredAnim content-title">Departemen {{ deptnama.pendek }}</h1>
      <h6 class="staggeredAnim content-caption">{{ deptnama.panjang }}</h6>
      <div v-images-loaded:on="callback">
        <div class="staggeredAnim desc">
          <ul>
            <li v-for="descr in desc">{{ descr }}</li>
          </ul>
        </div>
        <div class="row center-md middle-sm">
          <div class="col-xs-12 col-sm-3 col-md-2 first-sm center-align staggeredAnim">
            <div class="wongpeople" v-for="deptleft in dept.lefts">
              <a v-bind:href="deptleft.ig" target="_blank">
                <img v-bind:src="deptleft.foto">
              </a>
              <h5>{{ deptleft.nama }}</h5>
              <p>{{ deptleft.sebagai }}</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-5 first-xs center-align staggeredAnim">
            <h4>Proker &amp; Kegiatan</h4>
            <ul>
              <li v-for="proker in prokers">{{ proker }}</li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-3 col-md-2 center-align staggeredAnim">
            <div class="wongpeople" v-for="deptright in dept.rights">
              <a v-bind:href="deptright.ig" target="_blank">
                <img v-bind:src="deptright.foto">
              </a>
              <h5>{{ deptright.nama }}</h5>
              <p>{{ deptright.sebagai }}</p>
            </div>
          </div>
        </div>
        <div class="staggeredAnim">
          <h4 class="center-align">Staff</h4>
          <div class="staff-spacer"></div>
        </div>
        <div class="row center-xs staff">    
          <div class="col-xs-6 col-sm-3 col-md-2 center-align staggeredAnim" v-for="deptstaff in deptstaffs">
            <div class="wongpeople">
              <a v-bind:href="deptstaff.ig" target="_blank">
                <img v-bind:src="deptstaff.foto">
              </a>
              <h5>{{ deptstaff.nama }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="back-header"></div>
    </div>
</template>

<script>

  export default {
    props: ['deptnama', 'prokers', 'dept', 'deptstaffs', 'desc'],
    data () {
      return {
        imgLoad : true,
        callback: {
          always: (instance) => {
            this.loaded();
            console.log(instance);
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
          inner: 'Departemen '+this.deptnama.pendek
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

  .desc {
    margin-bottom: 60px;
    text-align: center;
  }

  .desc ul li {
    font-size: 14px;
    display: block;
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