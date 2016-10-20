<template>
	<div id="app">
		<!--<cc-animation-transition></cc-animation-transition>-->
		<cc-todos v-model="todos"></cc-todos>
	</div>
</template>

<script>
	import CcAnimationTransition from './components/AnimationTransition.vue'
	import CcTodos from './components/Todos.vue'
	
	export default {
		name: 'principal-application',
		data () {
			return {
				todos: [
					{
						name: 'Site CiaMuller',
						completed: true
					}
				]
			}
		},
		components: {
			CcAnimationTransition,
			CcTodos
		}
	}
</script>

<style>
	body{
		font-family: Helvetica, sans-serif;
	}
</style>
