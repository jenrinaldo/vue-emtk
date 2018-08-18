<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">EMTK</h1>
		<h6 class="staggeredAnim content-caption">Apa itu?</h6>
		<div class="main-article">
			<p class="staggeredAnim">Eksekutif Mahasiswa Teknik Komputer yang disingkat EMTK adalah lembaga eksekutif dalam kehidupan kemahasiswaan Teknik Komputer yang bertanggung jawab kepada seluruh anggota HIMATEKKOM.</p>
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
	        inner : 'Sekilas EMTK'
	      }
	    }
	}
</script>

<style scoped>

</style>