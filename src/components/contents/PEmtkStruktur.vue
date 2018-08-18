<template>
	<div class="m-fnt">
		<div class="hexa hexa-left staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
        <div class="hexa hexa-right staggeredAnim"><img src="/public/assets/hexa.svg" height="54px"></div>
		<h1 class="staggeredAnim content-title">Struktur</h1>
		<h6 class="staggeredAnim content-caption">Emtk</h6>
		<div class="main-article" v-dragscroll>
		<img class="staggeredAnim" src="/public/images/strukturemtk.svg">
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
	        inner : 'Struktur EMTK'
	      }
	    }
	}
</script>

<style scoped>
	img {
		display: block;margin: 0 auto;
		margin-bottom: 25px;
	}

	.main-article {
		cursor : -webkit-grab;
	    cursor : -moz-grab;
	    cursor : -o-grab;
	    cursor : grab;
	    overflow-x: auto;
	}
</style>