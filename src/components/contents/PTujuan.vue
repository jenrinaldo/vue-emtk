<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">TUJUAN &amp; FUNGSI</h1>
		<h6 class="staggeredAnim content-caption">HIMATEKKOM</h6>
		<div class="main-article">
			<p class="staggeredAnim"><b>Tujuan :</b></p>
	      <ol type="1" class="staggeredAnim">
	        <li>Mewujudkan kedaulatan Mahasiswa Teknik Komputer FILKOM UB.</li>
	        <li>Membentuk Mahasiswa Teknik Komputer FILKOM UB  yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa, berpikir ilmiah, memiliki wawasan yang luas, kecendekiawanan, integritas, serta kepedulian sosial.</li>
	        <li>Mengembangkan kemampuan akademik dan organisasi mahasiswa Teknik Komputer FILKOM UB tanpa melupakan hal-hal lain di luar masalah akademik dan organisasi.</li>
	        <li>Mewujudkan dan meningkatkan rasa kekeluargaan Mahasiswa Teknik Komputer FILKOM UB.</li>
	      </ol>
	      <p class="staggeredAnim"><b>Fungsi :</b></p>
	      <ol type="1" class="staggeredAnim">
	        <li>Wadah dan sarana pembinaan kepribadian dan potensi bagi anggota HIMATEKKOM.</li>
	        <li>Wadah dan sarana pengembangan keilmuan yang baik dan bermanfaat.</li>
	        <li>Wadah dan sarana pengabdian kepada masyarakat.</li>
	        <li>Wadah dan sarana penyaluran aspirasi, pemberdayaan, dan pemersatu anggota HIMATEKKOM.</li>
	        <li>Wadah dan sarana penghubung mahasiswa dengan seluruh elemen Teknik Komputer FILKOM UB.</li>
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
	        inner : 'Tujuan & Fungsi'
	      }
	    }
	}
</script>

<style scoped>

</style>