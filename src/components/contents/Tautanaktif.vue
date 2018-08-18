<template>
    <div class="m-fnt">
      <div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
      <h1 class="staggeredAnim content-title">Tautan Aktif</h1>
      <h6 class="staggeredAnim content-caption">link Pendaftaran dan lain-lain</h6>
      <h3 class="async-msg" v-if="responsemsg != '' ">{{ responsemsg }}</h3>
      <img class="loading" src="/public/assets/spiner-802.svg" v-if="postLoad">
      <div class="row center-md">
        <ol class="col-xs-12 col-md-8">
          <li v-for="link in links" class="staggeredAnimIso">
            <a v-bind:href="link.site" class="links" target="_blank">
              <div>
                <h5>{{ link.nama }}</h5>
                <h6>{{ link.author }}</h6>
              </div>
              <p>Dibuat {{ link.created }}<br><span>{{ link.timeleft }} hari</span> lagi</p>
            </a>
          </li>
        </ol>
      </div>
      <div class="back-header"></div>
    </div>
</template>

<script>

  export default {
    data () {
      return {
        postLoad: true,
        links : [],
        responsemsg : ''
      }
    },
    methods: {
      errorMsg (msg) {
          this.responsemsg = msg;
          this.postLoad = false;
      },
      doneGet() {
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
      getLinks () {
        this.$http.get('/public/posts/feeds.php?t=tautan').then(response => {
          if (!response.body.list) {
            this.errorMsg('Tidak ada tautan aktif.');
          } else {
            this.links = response.body.list;
            this.doneGet();
          }
        }, response => {
          this.errorMsg('Terjadi kesalahan server.');
        })
      }
    },
    mounted () { 
      this.getLinks();
      setTimeout(function(){
        TweenMax.staggerTo('.staggeredAnim', .8, {
          x: 0,
          opacity: 1,
          ease: Power2.easeOut
        }, .1);
      },600)
    },
      head: {
        title: {
          inner : 'Tautan Aktif'
        }
      }
  }
</script>

<style scoped>
   h4 {
    margin: 7px 0 15px 0;
    color: #f8f8f8;
  }

  h5 {
    font-size: 16px;
    color: #f8f8f8;
    text-transform: uppercase;
    font-weight: 400;
    letter-spacing: 1px;
  }

  .links div {
    display: inline-block;
    vertical-align: middle;
    width: 50%;
    text-align: left;
  }

  .links h6 {
    font-size: 13px;
    color: #025eb7;
    font-weight: 700;
    letter-spacing: 2px;
  }

  .links {
    padding: 20px 15px;
    display: block;
    transition: all 0.3s ease;
  }

  p {
    display: inline-block;
    width: 50%;
    margin-left: -5px;
    vertical-align: middle;
    text-align: right;
    line-height: 110%;
    font-size: 14px;
    font-style: italic;
    color: #5F6687;
  }

  p span {
    color: #025eb7;
    font-weight: 700;
  }

  li {
    color : #C3C7DB;
    opacity: 0;
    transform: scale(0.7);
  }

  .links:hover {
    background-color: #11152A;
  }

  li:not(:last-child) {
    border-bottom: 1px solid #353E68;
  }

  span.hl {
    font-weight: 800;
    color: #025eb7;
  }
</style>