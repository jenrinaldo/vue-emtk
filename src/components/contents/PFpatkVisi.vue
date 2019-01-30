<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Visi &amp; Misi</h1>
		<h6 class="staggeredAnim content-caption">FPATK</h6>
		<div class="main-article">
		      <ol type="1" class="staggeredAnim">
		        <li>Membuat undang-undang tentang pengawasan serta penilaian terhadap EMTK.</li>
		        <li>Mengawasi kinerja emtk baik intern mauapun ekstern dalam lingkup Universitas Brawijaya.</li>
		        <li>Mewujudkan Penyelenggaran Fungsi Pengawasan yang Efektif dan Transparan.</li>
		        <li>Sebagai penampung aspiasi mahasiswa teknik komputer.</li>
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
					x: 0,
					opacity: 1,
					ease: Power2.easeOut
				}, .1);
			},600)
		},
	    head: {
	      title: {
	        inner : 'Visi & Misi FPATK'
	      }
	    }
	}
</script>

<style scoped>

</style>