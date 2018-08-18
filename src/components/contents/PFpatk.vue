<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">FPATK</h1>
		<h6 class="staggeredAnim content-caption">Apa itu?</h6>
		<div class="main-article">
			<p class="staggeredAnim">Forum Perwakilan Angkatan Teknik Komputer ( FPATK ) merupakan sebuah lembaga legislatif di bawah naungan HIMATEKKOM (Himpunan Mahasiswa Teknik Komputer) yang bertugas melakukan pengawasan , perancangan Undang – Undang  terhadap lembaga Eksekutif Mahasiswa Teknik Komputer , serta menampung segala bentuk aspirasi dari Keluarga Besar Mahasiswa Teknik Komputer. Anggota FPATK merupakan perwakilan dari tiap – tiap angkatan yang di pilih secara musyawarah oleh angkatan tersebut. Masa jabatan FPATK adalah satu periode dalam masa kurang lebih satu tahun.</p>
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
	        inner : 'Sekilas FPATK'
	      }
	    }
	}
</script>

<style scoped>

</style>