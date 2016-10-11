<template>
	<div id="app">
		<img src="./assets/logo.png">
		<h1>{{ msg }}</h1>
		
		<input type="text" v-model="input1">
		<input type="text" v-model.lazy="input2">
		<input type="text" v-model.number="input3">
		<h2>{{input1}}</h2>
		<h2>{{input2}}</h2>
		<h2>{{input3}}</h2>
		
		<h1 v-once>{{ msg }}</h1>
		<h1 v-text="msg"></h1>
		<div v-html="title"></div>
		
		<a v-bind:href="link">Site do Vue</a>
		<a :href="link">Site do Vue</a>
		
		<button v-on:click="hello">Clique</button>
		<button @click="hello">Clique</button>
		
		<button @submit.prevent="hello">Clique</button>
		<button @keyup.enter="hello">Clique</button>
		
		<h1 v-if="showTitle">{{msg}}</h1>
		<h1 v-show="showTitle">{{msg}}</h1>
		
		<h1 ref="title">{{msg}}</h1>
		
		<ul>
			<li v-for="item in list">{{item.name}}</li>
		</ul>
	</div>
</template>

<script>
	import {orderBy} from 'lodash'
	
	export default {
		data () {
			return {
				msg: 'Hello Vue!',
				input1: '',
				input2: '',
				input3: '',
				title: '<h1>Tiago</h1>',
				link: 'http://vuejs.org/',
				showTitle: true,
				items: [
					{
						name: 'maça'
					},
					{
						name: 'abacaxi'
					},
					{
						name: 'banana'
					},
					{
						name: 'laranja'
					}
				]
			}
		},
		mounted(){
			console.log(this.$refs, this.$refs.title)
		},
		computed: {
			list(){
				return orderBy(this.items, 'name', 'desc')
			}
		},
		methods: {
			hello(){
				alert('Hello!');
			}
		}
	}
</script>

<style>
	body{
		font-family: Helvetica, sans-serif;
	}
</style>
