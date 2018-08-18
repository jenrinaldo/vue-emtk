<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Visi &amp; MISI</h1>
		<h6 class="staggeredAnim content-caption">Apa saja ya?</h6>
		<div class="main-article">
			<p class="staggeredAnim"><b>Visi :</b></p>
		      <ol type="1" class="staggeredAnim">
		        <li>Mewujudkan mahasiswa Teknik Komputer yang beriman, bertakwa, berwawasan luas, berintegritas serta berkepedulian sosial.</li>
		      </ol>
		      <p class="staggeredAnim"><b>Misi :</b></p>
		      <ol type="1" class="staggeredAnim">
		        <li>Sebagai wadah aspirasi dan pengembang minat bakat mahasiswa Teknik Komputer FILKOM UB.</li>
		        <li>Membangun kerja sama, komunikasi, kekeluargaan dan menguatkan budaya organisasi mahasiswa Teknik Komputer FILKOM UB.</li>
		        <li>Mengupayakan kesejahteraan mahasiswa Teknik Komputer FILKOM UB.</li>
		        <li>Sebagai wadah untuk bertukar wawasan dan ilmu pengetahuan yang menunjang kecerdasan intelektual mahasiswa Teknik Komputer FILKOM UB.</li>
		        <li>Menumbuhkan jiwa yang mandiri, kreatif dan inovatif.</li>
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
		}
	}
</script>

<style scoped>

</style>