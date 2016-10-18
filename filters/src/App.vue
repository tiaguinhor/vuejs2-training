<template>
	<div id="app">
		<img src="./assets/logo.png">
		<input type="text" v-model="msg">
		<h1>{{ msg | reverse('Tiago', 'Calógero') | capitalize('-=', '=-') }}</h1>
	</div>
</template>

<script>
	let reverse = (value, param1, param2) =>{
		console.log(value, param1, param2)
		return value.split('').reverse().join('')
	}
	let capitalize = (value, prefix, suffix) =>{
		return `${prefix} ${value.toUpperCase()} ${suffix}`
	}
	
	export default {
		data () {
			return {
				msg: ''
			}
		},
		filters: {
			reverse,
			capitalize
		}
	}
</script>

<style>
	body{
		font-family: Helvetica, sans-serif;
	}
</style>
