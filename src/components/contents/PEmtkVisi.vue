<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Visi &amp; Misi</h1>
		<h6 class="staggeredAnim content-caption">EMTK</h6>
		<div class="main-article">
	      <p class="staggeredAnim"><b>Visi :</b></p>
		      <p class="staggeredAnim">
		        "Mewujudkan EMTK sebagai lembaga eksekutif kemahasiswaan yang bertanggung jawab, aktif dan koordinatif (BERANI) dengan berdasarkan asas kekeluargaan."
		      </p>
		      <p class="staggeredAnim"><b>Misi :</b></p>
		      <ol type="1" class="staggeredAnim">
		        <li>Membangun sistem kerja yang terstruktur, profesional, dan mandiri.</li>
		        <li>Pengolahan masalah terkait himatekkom dengan gerakan yang kreatif dan solutif.</li>
		        <li>Pembuatan program kerja dengan target yang specific, measurerable, achieveable, relevant, dan time bound (SMART).</li>
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
	        inner : 'Visi & Misi EMTK'
	      }
	    }
	}
</script>

<style scoped>

</style>