<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">LAMBANG &amp; JARGON</h1>
		<h6 class="staggeredAnim content-caption">HIMATEKKOM</h6>
		<div class="main-article">
			<p class="staggeredAnim">Lambang HIMATEKKOM sebagai berikut :</p>
			<img class="staggeredAnim" src="/public/images/himatekkom.png">
			<p class="staggeredAnim"><b>Esensi lambang :</b></p>
	      <ol type="1" class="staggeredAnim">
	        <li>Lambang Teknik Komputer: Disertakannya lambang Teknik Komputer melambangkan bahwa Himatekkom membawa nama besar Program Studi Teknik Komputer FILKOM UB.</li>
	        <li>Sirkuit Rangkaian pada PCB Board: Melambangkan bahwa masing-masing anggota Himatekkom saling terhubung khususnya dalam ranah Himatekkom, seperti komponen satu dengan yang lain yang saling terintegrasi oleh sirkuit elektronika pada PCB Board.</li>
<li>Warna hitam: Warna hitam melambangkan keberanian, kekuatan, dan ketenangan.</li>
<li>Warna Biru: Melambangkan kejujuran, kestabilan, dan kesejukan.</li>
<li>Warna Oranye: Melambangkan kehangatan, persahabatan, dan antusiasme.</li>
<li>Model IC: IC Merupakan salah satu komponen yang vital dalam suatu Teknik Komputer.</li>
<li>Kaki-kaki IC yang mengelilingi Lambang Teknik Komputer melambangkan anggota Himatekkom yang saling kompak untuk menjunjung tinggi nama besar Teknik Komputer FILKOM UB.</li>
<li>Jumlah kaki IC 14: Melambangkan angka 14 yang merupakan tahun disahkannya Himatekkom.</li>

	      </ol>
	      <p class="staggeredAnim">Jargon HIMATEKKOM Adalah <b>“SISKOM! SISKOM! satu dulur SISKOM!!!”</b>. Dengan ketentuan :</p>
	      <ol type="1" class="staggeredAnim">
	        <li>Pembacaan sebanyak 3x</li>
<li>Harus di bacakan sambil berdiri</li>

	      </ol>
		</div>
  		<div class="back-header"></div>
	</div>
</template>

<script>

	export default {
		data () {
			return {

			}
		},
		mounted () {
			setTimeout(function(){
				TweenMax.staggerTo('.staggeredAnim', .8, {
					x : 0,
					opacity: 1,
					ease: Power2.easeOut
				}, .1);
			},600)
		},
	    head: {
	      title: {
	        inner : 'Lambang & Jargon'
	      }
	    }
	}
</script>

<style scoped>
	img {
		display: block;
		margin: 0 auto;
	}
</style>