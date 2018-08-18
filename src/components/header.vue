<template>
  <div itemscope itemtype ="http://schema.org/Organization" v-images-loaded:on="callback" v-bind:class="{'menu--open' : sides.menuState, 'user--open' : sides.userState, 'msg--open' : sides.msgState}">
    <div class="slide-loader" v-bind:style="'width :'+ progressPerc+'%' "></div>
    <header class="u-fnt">
      <div class="side-menu-btn left" v-on:click="sides.userState = false; sides.msgState = false; sides.menuState = !sides.menuState">
        <button class="menu-hamburger"><span>Menu</span></button>
      </div>
      <div class="header-logo left">
        <router-link to="/" exact>
          <img class="lazy logo-text" v-on:click="sides.menuState = false; sides.userState = false; sides.msgState = false;" src="/public/assets/logo28px.png" height="26px" width="168px" >
          <img class="lazy logo-only" itemprop="logo" v-on:click="sides.menuState = false; sides.userState = false; sides.msgState = false;" src="/public/assets/logo28px-only.png" height="26px" width="26px" >
        </router-link>
      </div>
      <div class="box-msg-btn right" v-on:click="sides.menuState = false; sides.userState = false; sides.msgState = !sides.msgState">
        <span>Kontak &amp; Saran</span><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>
      </div>
      <div class="account-btn right" v-on:click="sides.menuState = false; sides.msgState = false; sides.userState = !sides.userState">
        <span>Post Terbaru</span><i class="fa fa-feed fa-lg" aria-hidden="true"></i>
      </div>
    </header>
    <div class="side-nav rbd-clr">
      <div class="nav-left side-menu">
        <div>
          <ul class="menus u-fnt">
            <li class="staggered-left"><a><span v-on:click="submenus.prof = !submenus.prof">PROFIL</span></a></li>
            <ul class="sub-menus sm-prof" v-bind:class="{'sub-menus--open' : submenus.prof}">
              <li><router-link to="/profil/sekilas" exact><span v-on:click="sides.menuState = false">SEKILAS</span></router-link></li>
              <li><router-link to="/profil/sejarah" exact><span v-on:click="sides.menuState = false">SEJARAH</span></router-link></li>
              <li><router-link to="/profil/tujuan-fungsi" exact><span v-on:click="sides.menuState = false">TUJUAN &amp; FUNGSI</span></router-link></li>
              <li><router-link to="/profil/lambang-jargon" exact><span v-on:click="sides.menuState = false">LAMBANG &amp; JARGON</span></router-link></li>
              <li><router-link to="/profil/struktur" exact><span v-on:click="sides.menuState = false">STRUKTUR</span></router-link></li>
            </ul>
            <li class="staggered-left"><router-link to="/sekilas-prodi" exact><span v-on:click="sides.menuState = false;">SEKILAS PRODI</span></router-link></li>
            <li class="staggered-left"><a><span v-on:click="submenus.emtk = !submenus.emtk">EMTK</span></a></li>
            <ul class="sub-menus sm-emtk" v-bind:class="{'sub-menus--open' : submenus.emtk}">
              <li><router-link to="/emtk/sekilas" exact><span v-on:click="sides.menuState = false">SEKILAS</span></router-link></li>
              <li><router-link to="/emtk/tugas-wewenang" exact><span v-on:click="sides.menuState = false">TUGAS &amp; WEWENANG</span></router-link></li>
              <li><router-link to="/emtk/visi-misi" exact><span v-on:click="sides.menuState = false">VISI &amp; MISI</span></router-link></li>
              <li><router-link to="/emtk/struktur" exact><span v-on:click="sides.menuState = false">STRUKTUR</span></router-link></li>
              <li><router-link to="/emtk/jajaran" exact><span v-on:click="sides.menuState = false">JAJARAN</span></router-link></li>
            </ul>
            <li class="staggered-left"><a><span v-on:click="submenus.fpatk = !submenus.fpatk">FPATK</span></a></li>
            <ul class="sub-menus sm-fpatk" v-bind:class="{'sub-menus--open' : submenus.fpatk}">
              <li><router-link to="/fpatk/sekilas" exact><span v-on:click="sides.menuState = false">SEKILAS</span></router-link></li>
              <li><router-link to="/fpatk/tugas-wewenang" exact><span v-on:click="sides.menuState = false">TUGAS &amp; WEWENANG</span></router-link></li>
              <li><router-link to="/fpatk/visi-misi" exact><span v-on:click="sides.menuState = false">VISI &amp; MISI</span></router-link></li>
              <li><router-link to="/fpatk/struktur" exact><span v-on:click="sides.menuState = false">STRUKTUR</span></router-link></li>
              <li><router-link to="/fpatk/jajaran" exact><span v-on:click="sides.menuState = false">JAJARAN</span></router-link></li>
            </ul>
            <!-- <li class="staggered-left"><a href=""><span v-on:click="sides.menuState = false">FORUM SEDULUR</span></a></li> -->
            <li class="staggered-left"><router-link to="/artikel" exact><span v-on:click="sides.menuState = false;">BERITA &amp; ARTIKEL</span></router-link></li>
            <li class="staggered-left"><router-link to="/pengumuman" exact><span v-on:click="sides.menuState = false;">PENGUMUMAN</span></router-link></li>
            <li class="staggered-left"><router-link to="/beasiswa" exact><span v-on:click="sides.menuState = false;">INFO BEASISWA</span></router-link></li>
            <li class="staggered-left"><router-link to="/tautan-aktif" exact><span v-on:click="sides.menuState = false;">TAUTAN AKTIF</span></router-link></li>
          </ul>
        </div>
      </div>
      <div class="nav-right side-user">
        <div class="right-align m-fnt">
          <h4 class="u-fnt staggered-right" v-on:click="sides.userState = false;"><router-link to="/artikel" exact>BERITA &amp; ARTIKEL</router-link></h4>
          <div class="artikel staggered-right">
            <h3 class="async-msg" v-if="responsemsg[0] != '' ">{{ responsemsg[0] }}</h3>
            <div class="lists" v-for="arti in list.artikel" v-on:click="sides.userState = false;">
                <router-link v-bind:to="'/artikel/'+arti.link">
                    <h5>{{ arti.title }} <span>{{ arti.datecreated }}</span></h5>
                    <img class="lazy" v-bind:src="arti.cover">
                  </router-link>
            </div>
          </div>
          <h4 class="u-fnt staggered-right" v-on:click="sides.userState = false;"><router-link to="/pengumuman" exact>PENGUMUMAN</router-link></h4>
          <div class="staggered-right">
            <h3 class="async-msg" v-if="responsemsg[1] != '' ">{{ responsemsg[1] }}</h3>
            <div class="lists" v-for="peng in list.pengumuman" v-on:click="sides.userState = false;">
                <router-link v-bind:to="'/pengumuman/'+peng.link">
                    <h5>{{ peng.title }}</h5>
                    <p>{{ peng.datecreated }}</p>
                  </router-link>
            </div>
          </div>
          <h4 class="u-fnt staggered-right" v-on:click="sides.userState = false;"><router-link to="/beasiswa" exact>INFO BEASISWA</router-link></h4>
          <div class="staggered-right">
            <h3 class="async-msg" v-if="responsemsg[2] != '' ">{{ responsemsg[2] }}</h3>
            <div class="lists" v-for="bea in list.beasiswa" v-on:click="sides.userState = false;">
                <router-link v-bind:to="'/beasiswa/'+bea.link">
                    <h5>{{ bea.title }}</h5>
                    <p>{{ bea.datecreated }}</p>
                  </router-link>
            </div>
          </div>
        </div>
      </div>
      <div class="nav-right side-msg">
        <div class="right-align m-fnt">
            <h4 class="u-fnt staggered-right">HUBUNGI KAMI</h4>
            <div>
               <a v-bind:href="'tel:'+contacts.telp" class="m-fnt staggered-right">
                <i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; <span itemprop="telephone">{{contacts.telp}}</span>
            </a>
                <a v-bind:href="'mailto:'+contacts.email" class="m-fnt staggered-right">
                    <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; <span itemprop="email">{{contacts.email}}</span>
                </a> 
            </div>
            <h4 class="u-fnt staggered-right">IKUTI KAMI</h4>
            <div class="sosmed staggered-right">
                <a v-bind:href="social.line" target="_blank">
                    <img src="/public/assets/icon/line.svg" class="lazy" height="20px" width="20px" alt="line-icon">
                  </a>
                  <a itemprop="sameAs" v-bind:href="social.fb" target="_blank">
                    <img src="/public/assets/icon/facebook.svg" class="lazy" height="20px" width="20px" alt="facebook-icon">
                  </a>
                  <a itemprop="sameAs" v-bind:href="social.ig" target="_blank">
                    <img src="/public/assets/icon/instagram.svg" class="lazy" height="20px" width="20px" alt="instagram-icon">
                  </a>
                  <a itemprop="sameAs" v-bind:href="social.yt" target="_blank">
                    <img src="/public/assets/icon/youtube.svg" class="lazy" height="20px" width="20px" alt="youtube-icon">
                  </a>
            </div>
          <h4 class="u-fnt staggered-right">KRITIK &amp; SARAN</h4>
          <form>
            <input class="staggered-right" type="text" placeholder="Nama / Anonim">
            <textarea class="staggered-right" placeholder="Pesan"></textarea>
            <button class="staggered-right" type="submit">KIRIM</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    props: ['sides'],
    data () {
      return {
        progressBar: 0,
        progressPerc: 0,
        totalImage: -1,
        callback : {
            progress: (instance, image) => {
                this.totalImage = instance.images.length;
                if (image.img.classList[0] == 'lazy') {
                    image.img.classList.remove('lazy')
                    this.progressBar++;
                }
            }
        },
        contacts : {
            telp: '08123450460',
            telpName: 'Syahriel',
            email: 'himatekkom@gmail.com'
          },
          social : {
            line: 'https://line.me/R/ti/p/%40slz1174b',
            fb: 'https://www.facebook.com/himatekkomub/',
            ig: 'https://www.instagram.com/himatekkomub/',
            yt: 'https://www.youtube.com/channel/UCPsvgSE2SpxWf0UECeeCxkA'
          },
        submenus: {
          emtk: false,
          fpatk : false,
          prof : false
        },
        list : {
            artikel: [],
            pengumuman: [],
            beasiswa: []
        },
        responsemsg: ['','','']
      }
    },
    methods : {
        errorMsg (msg, arr = 2) {
          this.responsemsg[arr] = msg;
          this.postLoad = false;
        },
        sideLeft (state) {
            var el = document.querySelector('.side-menu');
            el.children[0].style.overflowY = 'hidden';
            el.style.display = 'block';
            TweenMax.staggerTo('.staggered-left', .6, {
                x: (state)? 0 : 70,
                autoAlpha: (state)? 1 : 0,
                ease: Power2.easeInOut,
                onComplete: () => {
                    if (!state) {
                      el.style.display = 'none';
                      el.children[0].style.overflowY = 'hidden';
                    } else {
                      el.style.display = 'block';
                      el.children[0].style.overflowY = 'auto';
                    }
                }
            },.05)
        },
        sideRight (state, classes) {
            var el = document.querySelector(classes);
            el.style.display = 'block';
            TweenMax.staggerTo(classes+' .staggered-right', .6, {
                x: (state)? 0 : -140,
                autoAlpha: (state)? 1 : 0,
                ease: Power2.easeInOut,
                onComplete: () => {
                    el.style.display = (!state)? 'none' : 'block';
                }
            },.05)
        },
        initFeed() {
            this.$http.get('/public/posts/feeds.php?t=all-list&l=3&o=0').then(response => {
                if (!response.body.artikel) {
                    this.errorMsg('Tidak ada berita atau artikel.', 0);
                } else {
                    this.list.artikel = response.body.artikel;
                }

                if (!response.body.pengumuman) {
                    this.errorMsg('Tidak ada pengumuman.', 1);
                } else {
                    this.list.pengumuman = response.body.pengumuman;
                }

                if (!response.body.beasiswa) {
                    this.errorMsg('Tidak ada beasiswa.', 2);
                } else {
                    this.list.beasiswa = response.body.beasiswa;
                }

                this.progressBar++;

            }, response => {
              this.errorMsg('Terjadi kesalahan server.');
            })
        }
    },
    watch: {
        'sides.menuState' (val) {
            this.sideLeft(val);
            this.submenus.emtk = false;
            this.submenus.fpatk = false;
            this.submenus.prof = false;
        },
        'sides.userState' (val) {
            this.sideRight(val, '.side-user');
        },
        'sides.msgState' (val) {
            this.sideRight(val, '.side-msg');
        },
        progressBar (val) {
            var perc = val / (this.totalImage + 1) * 100;

            this.progressPerc = perc;

            if (perc == 100) {
                this.$emit('pageready',true);
            }          
        }
    },
    mounted () {
        this.initFeed()
    }
  }
</script>

<style scoped>

  header {
    height: 65px;
    width: 100%;
    position: fixed;
    top: 6px;
    left: 0;
    z-index: 2;
  }

  header > div {
    height: 64px;
    cursor: pointer;
    transition: all .2s ease;
  }

  .side-menu-btn {
    width: 65px;
    padding: 19px 0;
    text-align: center;
    border-right: 1px dashed #353E68;
  }

  .header-logo {
    padding-top: 21px;
    margin: 0 19px;
    cursor: default;
  }

  .header-logo a,
  .header-logo img {
    vertical-align: middle;
  }

  .header-logo .logo-text {
    display: inline-block;
  }

  .header-logo .logo-only {
    display: none;
  }

  .account-btn,
  .box-msg-btn {
    min-width: 65px;
    text-align: center;
    padding-top: 22px;
    color: #C3C6D3;
  }

  .user--open .account-btn,
  .msg--open .box-msg-btn {
    border-bottom: 1px dashed #353E68;
  }

  .account-btn,
  .box-msg-btn {
    padding-left: 18px;
    padding-right: 18px;
  }
  .account-btn span,
  .box-msg-btn span {
    font-size: 12px;
    margin-right: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .account-btn:hover,
  .box-msg-btn:hover,
  .side-menu-btn:hover {
    background-color: #353E68;
  }

  .side-nav {
    position: fixed;
    width: 100%;
    height: 100%;
    display: block;
    left: 0;
    top: 0;
    z-index: 0;
  }

  .side-nav > div {
    position: absolute;
    top: 0;
    width: 280px;
    height: 100%;
    padding: 105px 5px 0;
 /*   transition: transform 0.5s ease;*/
  }

  .side-nav .nav-left {
    left: 0;
    display: none;
  }

  .staggered-left {
    transform: translateX(70px);
    visibility: hidden;
    opacity: 0;
  }

    .side-nav .nav-right {
        right: 0;
        display: none;
    }

  .staggered-right {
    transform: translateX(-70px);
    visibility: hidden;
    opacity: 0;
  }

  .side-nav > div > div {
    overflow-y: auto;
    overflow-x: hidden;
    height:100%;
  }

  .side-nav .no-overflow {
    overflow-y: hidden !important;
  }

  .side-nav .menus > li {
    width: 100%;
    padding: 15px 20px;
  }

  .side-nav .sub-menus {
    height: 0;
    overflow: hidden;
    opacity: 0;
    transition: all 0.5s cubic-bezier(0.77, 0, 0.175, 1);
  }

  .side-nav .sub-menus--open {
    opacity: 1;
    height: 140px;
  }

/*  .sm-emtk.sub-menus--open,
  .sm-prof.sub-menus--open,
  .sm-fpatk.sub-menus--open {
    height: 140px !important;
  }*/

  .side-nav .sub-menus > li {
    width: 100%;
    padding: 0px 20px 5px 40px;
  }

  .side-nav li a {
    display: inline-block;
    cursor: pointer;
  }

  .side-nav li a.sub-menus--open {
    font-weight: 700;
  }

  .side-nav li a span {
    padding: 5px;
    color: #7E85A2;
    font-size: 14px;
    letter-spacing: 2px;
    transition: all 0.2s ease;
    display: inline-block;
    font-weight: 700;
  }

  .side-nav .sub-menus > li a span {
    font-size: 12px;
    color: #8288A1;
    font-weight: 400;
  }

  .side-menu a.router-link-active span {
    color: #f6871e !important;
    font-weight: 700 !important;
  }

  .side-nav li a:hover span {
    color: #E6E8F3;
    font-weight: 700;
  }

  .right-nav {
    display: none;
  }

  .side-user > div,
  .side-msg > div {
    padding: 15px 20px 15px 10px;
  }

  .side-user h4,
  .side-msg h4 {
    color: #f6871e;
    letter-spacing: 3px;
    margin-bottom: 15px;
  }

  .side-user h4:not(:first-child),
  .side-msg h4:not(:first-child) {
    margin-top: 20px;
  }

  .side-msg a {
    color: #AFB4CC;
    font-size: 15px;
    margin: 10px 0;
    display: inline-block;
    width: 100%;
    letter-spacing: 1px;
  }

  .sosmed a {
    width: 40px;
  }

  .sosmed img {
    display: inline-block;
    width: 20px;
  }

  .side-msg input {
    text-align: right;
  }

  .side-msg textarea {
    text-align: right;
    resize: vertical;
    max-height: 250px;
    min-height: 130px;
  }

  .side-user .lists a {
    margin-top: 10px;
    padding-bottom: 10px;
    display: inline-block;
    width: 100%;
    border-bottom: 1px solid #12172D;
    transition: background 0.3s ease;
  }

  .side-user .lists a:hover {
    background: #070A17;
  }

  .side-user h4 a {
    color: #f6871e;
    display: block;
  }

  .side-user h5 {
    font-size: 13px;
    display: inline-block;
    vertical-align: middle;
    color: #AFB4CC;
    font-weight: 400;
    letter-spacing: 1px;
  }

  .side-user .artikel h5 {
    width: calc(100% - 85px);
    margin-right: 10px;
  }

  .side-user p,
  .side-user span {
    font-size: 13px;
    display: block;
    margin-top: 7px;
    color: #8E94AF;
    font-style: italic;
  }

  .side-user img {
    display: inline-block;
    vertical-align: middle;
    width: 70px;
    margin-bottom: 15px;
  }

  .async-msg {
    text-align: right;
  }

  @media only screen and (max-width: 39.9375em) {

    .account-btn span,
    .box-msg-btn span {
      display: none;
    }

    .account-btn,
    .box-msg-btn {
      padding-left: 0;
      padding-right: 0;
    }
  }

  @media only screen and (max-width: 29.9375em) {
    header > div {
      width: 25% !important;
      margin: 0 !important;
    }

    .header-logo {
      text-align: center !important;
    }

    .header-logo .logo-text {
      display: none;
    }

    .header-logo .logo-only {
      display: inline-block;
    }

    .side-menu-btn {
      border-right: none;
    }
  }

</style>