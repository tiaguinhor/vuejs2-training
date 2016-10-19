<template>
	<div id="app">
		<img src="./assets/logo.png">
		<h1>{{ msg }}</h1>
		
		<cc-animation-transition></cc-animation-transition>
	</div>
</template>

<script>
	import CcAnimationTransition from './components/AnimationTransition.vue'
	
	export default {
		data () {
			return {
				msg: 'Hello Vue!'
			}
		},
		components: {
			CcAnimationTransition
		}
	}
</script>

<style>
	body{
		font-family: Helvetica, sans-serif;
	}
</style>
