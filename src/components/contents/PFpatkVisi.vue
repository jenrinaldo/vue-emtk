<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Visi &amp; Misi</h1>
		<h6 class="staggeredAnim content-caption">FPATK</h6>
		<div class="main-article">
			<p class="staggeredAnim"><b>Visi :</b></p>
			<p class="staggeredAnim">"Terwujudnya Forum Perwakilan Angkatan Teknik Komputer (FPATK) sebagai lembaga legislatif yang PROAKTIF (Profesional,Adil , Aktif , dan Aspiratif)"</p>
			<p class="staggeredAnim"><b>Misi :</b></p>
		      <ol type="1" class="staggeredAnim">
		        <li>Mewujudkan Penanaman rasa persaudaraan dan kekeluargaan di dalam FPATK.</li>
		        <li>Mewujudkan Penyelenggaraan fungsi legislasi yang efisien dan efektif.</li>
		        <li>Mewujudkan Penyelenggaran Fungsi Pengawasan yang Efektif dan Transparan.</li>
		        <li>Meningkatkan komunikasi terhadap lembaga di Fakultas Ilmu Komputer.</li>
		        <li>Menampung dan Melayani segala Aspirasi mahasiswa Teknik Komputer.</li>
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