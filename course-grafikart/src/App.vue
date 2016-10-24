<template>
	<div id="app">
		<!--animation-transition-->
		<!--<cc-animation-transition></cc-animation-transition>-->
		
		<!--todos-->
		<!--<cc-todos v-model="todos" v-cloak></cc-todos>-->
		
		<!--carousel-->
		<!--<cc-carousel v-model="slides" v-cloak></cc-carousel>-->
		
		<!--lightbox-->
		<!--<a :href="'http://lorempicsum.com/futurama/800/600/' + n" v-lightbox v-for="n in 9">-->
		<!--<img :src="'http://lorempicsum.com/futurama/150/150/' + n" alt="">-->
		<!--</a>-->
		<!--<cc-lightbox></cc-lightbox>-->
		
		<!--<cc-vue-resource></cc-vue-resource>-->
		
		<!--vue-router-->
		<div class="ui fixed iverted menu">
			<div class="ui container">
				<router-link :to="{name: 'transition'}" class="header item">Animation/Transition</router-link>
				<router-link :to="{name: 'users'}" class="item">Users</router-link>
				<router-link :to="{name: 'pages', params: {id: 1}} " class="item">Pages</router-link>
			</div>
		</div>
		<div class="sidebar">
			<router-view name="sidebar"></router-view>
		</div>
		<div class="main">
			<transition name="bounce" mode="out-in">
				<router-view></router-view>
			</transition>
		</div>
	</div>
</template>

<script>
	//	import CcAnimationTransition from './components/AnimationTransition.vue'
	//	import CcTodos from './components/Todos.vue'
	//	import CcCarousel from './components/Carousel.vue'
	//	import CcLightbox from './components/lightbox/Lightbox.vue'
	//	import CcVueResource from './components/VueResource.vue'
	
	export default {
		name: 'principal-application',
		data () {
			return {
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
			//			CcCarousel,
			//			CcLightbox,
			//			CcVueResource
		}
	}
</script>

<style>
	body{
		font-family: Helvetica, sans-serif;
	}
	
	.bounce-enter-active{
		animation: bounce-in .5s;
	}
	
	.bounce-leave-active{
		animation: bounce-out .5s;
	}
	
	@keyframes bounce-in{
		0%{
			transform: scale(0);
		}
		50%{
			transform: scale(1.5);
		}
		100%{
			transform: scale(1);
		}
	}
	
	@keyframes bounce-out{
		0%{
			transform: scale(1);
		}
		50%{
			transform: scale(1.5);
		}
		100%{
			transform: scale(0);
		}
	}
</style>
