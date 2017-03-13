<template>
	<div>
		<h2>Perfil {{$route.params.profileId}}</h2>
		<h3>Perfil {{params.profileId}}</h3>
	</div>
</template>

<script>
	export default {
		data(){
			return{
				params: {}
			}
		},
		mounted(){
			this.params = this.$root.$route.params
		}
	}
</script>

<style>
</style>
