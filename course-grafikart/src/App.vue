<template>
	<div id="app">
		<!--<cc-animation-transition></cc-animation-transition>-->
		<!--<cc-todos v-model="todos"></cc-todos>-->
		<cc-carousel v-model="slides" v-cloak></cc-carousel>
	</div>
</template>

<script>
	//	import CcAnimationTransition from './components/AnimationTransition.vue'
	//	import CcTodos from './components/Todos.vue'
	import CcCarousel from './components/Carousel.vue'
	
	export default {
		name: 'principal-application',
		data () {
			return {
				slides: [
					{
						title: 'Futurama',
						image: 'http://lorempicsum.com/futurama/630/300/1'
					},
					{
						title: 'Ainda Sobre Futurama',
						image: 'http://lorempicsum.com/futurama/630/300/2'
					},
					{
						title: 'Mais Sobre Futurama',
						image: 'http://lorempicsum.com/futurama/630/300/3'
					}
				],
				todos: [
					{
						name: 'Site CiaMuller',
						completed: true
					}
				]
			}
		},
		components: {
			//			CcAnimationTransition,
			//			CcTodos,
			CcCarousel
		}
	}
</script>

<style>
	body{
		font-family: Helvetica, sans-serif;
	}
</style>
