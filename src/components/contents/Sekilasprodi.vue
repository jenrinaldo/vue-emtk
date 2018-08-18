<template>
    <div class="m-fnt">
        <div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <img class="loading" src="/public/assets/spiner-802.svg" v-if="imgLoad">
        <div v-images-loaded:on="callback" class="main-article">
            <h1 class="staggeredAnim content-title">Sekilas Prodi</h1>
            <h6 class="staggeredAnim content-caption">Teknik Komputer</h6>
            <p class="staggeredAnim"><img alt="02_Sesi_penjurian_keliling" src="/public/images/kaprodi/sabri.jpg" style="float:left; margin:10px; width:150px" />Keilmuan Teknik Komputer sebelumnya merupakan bagian dari keilmuan Teknik Elektro dan telah berkembang menjadi bidang keilmuan tersendiri sesuai dengan yang telah dideskripsikan pada Computing Curricula ACM 2016 Menurut Computing Curricula, saat ini bidang keilmuan Komputer telah berkembang menjadi bidang ilmu spesifik yang terdiri dari Ilmu Komputer/Informatika, Teknik Komputer, Sistem Informasi, Teknologi Informasi, dan Rekayasa/Teknik Perangkat Lunak.Keilmuan Teknik Komputer memiliki irisan dengan bidang ilmu Teknik Elektro dan Ilmu Komputer/Teknik Informatika namun memiliki fokus pada bidang Sistem Komputasi Modern, Perangkat Kontrol Komputer, dan Jaringan Perangkat Cerdas. Secara umum Keilmuan Teknik Komputer dipandang sebagai bidang keilmuan desain komputer, tidak sebatas itu, Teknik Komputer juga mendorong dan memajukan kemampuan komputer dan mikro elektronik saat ini di berbagai bidang.</p>
            <p class="staggeredAnim">Website : <a href="http://tkom.filkom.ub.ac.id" target="_blank">tkom.filkom.ub.ac.id</a></p>
        </div>
        <div class="back-header"></div>
    </div>
</template>

<script>

    export default {
        data () {
          return {
            imgLoad : true,
            callback: {
                always: (instance) => {
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
            inner : 'Sekilas Prodi'
          }
        }
    }
</script>

<style scoped>

</style>