<template>
	<div id="app">
		<!--<cc-animation-transition></cc-animation-transition>-->
		<!--<cc-todos v-model="todos" v-cloak></cc-todos>-->
		<!--<cc-carousel v-model="slides" v-cloak></cc-carousel>-->
		
		<!--lightbox-->
		<a :href="'http://lorempicsum.com/futurama/800/600/' + n" v-lightbox v-for="n in 9">
			<img :src="'http://lorempicsum.com/futurama/150/150/' + n" alt="">
		</a>
		<cc-lightbox></cc-lightbox>
	</div>
</template>

<script>
	//	import CcAnimationTransition from './components/AnimationTransition.vue'
	//	import CcTodos from './components/Todos.vue'
	//	import CcCarousel from './components/Carousel.vue'
	import CcLightbox from './components/lightbox/Lightbox.vue'
	
	export default {
		name: 'principal-application',
		data () {
			return {
				title: 'futurama'
				//				slides: [
				//					{
				//						title: 'Futurama',
				//						image: 'http://lorempicsum.com/futurama/630/300/1'
				//					},
				//					{
				//						title: 'Ainda Sobre Futurama',
				//						image: 'http://lorempicsum.com/futurama/630/300/2'
				//					}
				//				],
				//				todos: [
				//					{
				//						name: 'Site CiaMuller',
				//						completed: true
				//					}
				//				]
			}
		},
		components: {
			//			CcAnimationTransition,
			//			CcTodos,
			//			CcCarousel
			CcLightbox
		}
	}
</script>

<style>
	body{
		font-family: Helvetica, sans-serif;
	}
</style>
