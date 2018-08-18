<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Tugas &amp; Wewenang</h1>
		<h6 class="staggeredAnim content-caption">FPATK</h6>
		<div class="main-article">
	    <p class="staggeredAnim"><b>Tugas FPATK :</b></p>
	      <ol type="1" class="staggeredAnim">
	    <li>Melantik Ketua EMTK yang terpilih.</li>
<li>Bekerja sama dengan EMTK dalam pembuatan Garis-garis Besar Haluan Kerja yang selanjutnya disingkat GBHK.</li>
<li>Mengawasi EMTK dalam menjalankan AD dan ART, GBHK dan ketetapan-ketetapan MKBMTK.</li>
<li>Bertanggung jawab atas terselenggaranya MKBMTK.</li>
<li>Bertanggung jawab atas terselenggaranya Pemilwa Tekkom.</li>
<li>Mengajukan rancangan undang-undang Himatekkom kepada MKBMTK.</li>
<li>Menampung dan merumuskan aspirasi Himatekkom terkait pengawasan kepada EMTK.</li>

	      </ol>
	      <p class="staggeredAnim"><b>Wewenang FPATK :</b></p>
	      <ol type="1" class="staggeredAnim">
<li>Memberikan memorandum kepada EMTK.</li>
<li>Membebas tugaskan Ketua Umum EMTK atas dasar hasil yang ditetapkan oleh MKBMTK.</li>
<li>Mengajukan sanksi hasil sidang FPATK ke MKBMTK untuk anggota Himatekkom yang terbukti melanggar AD dan ART Himatekkom dan peraturan yang berlaku dalam lingkungan Himatekkom.</li>

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
	        inner : 'Tugas & Wewenang FPATK'
	      }
	    }
	}
</script>

<style scoped>

</style>