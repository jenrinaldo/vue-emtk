<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Tugas &amp; Wewenang</h1>
		<h6 class="staggeredAnim content-caption">EMTK</h6>
		<div class="main-article">
			<p class="staggeredAnim"><b>Tugas EMTK :</b></p>
	      <ol type="1" class="staggeredAnim">
	        <li>Melaksanakan ketetapan MKBMTK.</li>
	        <li>Melaksanakan kegiatan berdasarkan GBHK HIMATEKKOM.</li>
	        <li>Menampung dan merumuskan aspirasi anggota HIMATEKKOM.</li>
	        <li>Bekerja sama dengan FPATK dalam pembuatan GBHK.</li>
	      </ol>
	      <p class="staggeredAnim"><b>Wewenang EMTK :</b></p>
	      <ol type="1" class="staggeredAnim">
	        <li>Membuat keputusan-keputusan yang dianggap perlu dalam pemenuhan GBHK HIMATEKKOM dengan memperhatikan pertimbangan yang diberikan oleh FPATK.</li>
	        <li>Mewakili mahasiswa HIMATEKKOM baik ke dalam maupun keluar HIMATEKKOM.</li>
	        <li>Mengajukan rapat koordinasi dengan FPATK.</li>
	        <li>Penyusunan dan pelaksanaan program kerja EMTK sebagai penjabaran GBHK HIMATEKKOM merupakan hak prerogatif EMTK dengan memperhatikan pertimbangan yang diberikan oleh FPATK.</li>
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
	        inner : 'Tugas & Wewenang EMTK'
	      }
	    }
	}
</script>

<style scoped>

</style>