<template>
<div class="m-fnt">
    <div class="hexa hexa-left staggeredAnim">
        <img src="/public/assets/hexa.svg" height="54px" />
    </div>
    <div class="hexa hexa-right staggeredAnim">
        <img src="/public/assets/hexa.svg" height="54px" />
    </div>
    <h1 class="staggeredAnim content-title">Pengumuman Staff Muda</h1>
    <input class="staggeredAnim" type="text" placeholder="Masukkan NIM" v-model="filterText" v-on:keyup="getData()" />
    <h1 class="async-msg" v-if="responsemsg !== ''">{{ responsemsg }}</h1>
    <h1 class="async-msg" v-if="blogData.status == 'DITERIMA' ">
        Selamat, {{ blogData.nama }}.
        <br />Kamu diterima sebagai staff muda HIMATEKKOM.
        <br />Info !
        <h6>Jangan Lupa datang first gathering pada Jumat, 11 Oktober 2019 Pukul 19.00 di A2.25 ya!</h6>
    </h1>
    <h1 class="async-msg" v-if="blogData.status == 'DITOLAK' ">
        Semangat ya, {{ blogData.nama }}.
        <br />Untuk saat ini kamu belum diterima sebagai staff muda HIMATEKKOM.
        <br />Silahkan mencoba di open recruitment staff ahli ya.
        <br /> Tetap berkontribusi untuk Himpunan kita.
    </h1>
    <img class="loading" src="/public/assets/spiner-802.svg" v-if="postLoad" />
    <div class="back-header"></div>
</div>
</template>

<script>
const axios = require("axios");
export default {
    data() {
        return {
            postLoad: true,
            filterText: "",
            blogData: {},
            list: [{
                class: "grid-sizer"
            }],
            responsemsg: ""
        };
    },
    methods: {
        errorMsg(msg) {
            this.responsemsg = msg;
            this.postLoad = false;
        },
        doneLayout() {
            setTimeout(() => {
                this.postLoad = false;
                TweenMax.staggerTo(
                    ".staggeredAnimIso",
                    1.2, {
                        scale: 1,
                        opacity: 1,
                        ease: Elastic.easeOut.config(1, 0.3),
                        onComplete: tween => {
                            tween.target.classList.remove("staggeredAnimIso");
                        },
                        onCompleteParams: ["{self}"]
                    },
                    0.1
                );
            }, 800);
        },
        getData() {
            this.postLoad = true;
            axios
                .get(
                    "/public/posts/feeds.php?c=staffMuda&t=staffM&p=" +
                    this.filterText
                )
                .then(response => {
                    this.blogData = response.data;
                    if (this.blogData === false && this.filterText != "") {
                        this.responsemsg = "Kamu kan gak daftar :p";
                    } else if (this.filterText == "") {
                        this.responsemsg = "Masukkan NIM";
                    } else {
                     this.responsemsg = ""; 
                    }
                })
                .catch(error => {
                    console.log(error);
                    this.responsemsg = "Kamu kan gak daftar :p.";
                })
                .finally(() => (this.postLoad = false));
        }
    },
    mounted() {
        this.getData();
        setTimeout(() => {
            TweenMax.staggerTo(
                ".staggeredAnim",
                0.8, {
                    x: 1,
                    opacity: 1,
                    ease: Power3.easeOut
                },
                0.1
            );
        }, 600);
    },
    head: {
        title: {
            inner: "Pengumuman Staff Muda"
        }
    }
};
</script>

<style scoped>
.content-caption {
    margin-bottom: 15px;
}

input {
    margin: 0 auto 15px;
    padding: 3px 0;
    background-color: transparent;
    border-bottom: 1px solid #353e68;
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
    border: 2px solid #12162a;
    display: block;
    border-radius: 5px;
    background-color: #12162a;
    -webkit-box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3);
    -moz-box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3);
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3);
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
