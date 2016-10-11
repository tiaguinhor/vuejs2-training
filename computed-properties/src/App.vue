<template>
	<div id="app">
		<img src="./assets/logo.png">
		<h1>{{ name }}</h1>
		<h2>{{ time }}</h2>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				firstName: 'Tiago',
				lastName: 'Calógero'
			}
		},
		//executa apos vuejs carregar por completo
		mounted(){
			console.log(this.time)
			setTimeout(() => this.name = 'James Bond', 2000)
		},
		//cria escopos customizados
		computed: {
			time: {
				cache: false,
				get(){
					return Date.now()
				}
			},
			name: {
				get(){
					return `${this.firstName} ${this.lastName}`
				},
				set(v){
					const names = v.split(' ')
					this.firstName = names[1]
					this.lastName = names[0]
				}
			}
		}
	}
</script>

<style>
	body{
		font-family: Helvetica, sans-serif;
	}
</style>
