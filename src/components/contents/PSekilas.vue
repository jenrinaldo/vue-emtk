<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Himatekkom</h1>
		<h6 class="staggeredAnim content-caption">Apa itu?</h6>
		<div class="main-article">
			<p class="staggeredAnim">HIMATEKKOM atau Himpunan Mahasiswa Teknik Komputer adalah Lembaga organisasi mahasiswa Teknik Komputer Fakultas Ilmu Komputer Universitas Brawijaya. Kedaulatan tertinggi HIMATEKKOM ada di tangan seluruh mahasiswa Teknik Komputer  Fakultas Ilmu Komputer Universitas Brawijaya Malang melalui Musyawarah Keluarga Besar Mahasiswa Teknik Komputer (MKBMTK). Prinsip Himatekkom adalah kekeluargaan, aktualisasi diri, dan pengembangan diri. HIMATEKKOM sendiri beranggotakan seluruh mahasiswa Teknik Komputer. Dalam kelembagaan HIMATEKKOM dibagi menjadi 2 yaitu EMTK dan FPATK.</p>
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
				inner : 'Sekilas'
			}
		}
	}
</script>

<style scoped>

</style>