<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Visi &amp; Misi</h1>
		<h6 class="staggeredAnim content-caption">EMTK</h6>
		<div class="main-article">
	      <p class="staggeredAnim"><b>Visi :</b></p>
		      <p class="staggeredAnim">
		        "Harmonis dalam ikatan keduluran."
		      </p>
		      <p class="staggeredAnim"><b>Misi :</b></p>
		      <ol type="1" class="staggeredAnim">
		        <li>Mempererat ikatan kekeluargaan dulur HIMATEKKOM</li>
		        <li>Advokasi cepat tanggap demi kesejahteraan HIMATEKKOM</li>
		        <li>Mengasah kreasi dan inovasi demi meningkatnya prestasi dulur HIMATEKKOM</li>
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