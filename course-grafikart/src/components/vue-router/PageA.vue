<template>
	<div>
		<h2>Page A</h2>
		<ul>
			<router-link :to="{name: 'a.b'}">Go to page b</router-link>
			<router-link :to="{name: 'a.c'}">Go to page c</router-link>
		</ul>
		
		<transition name="bounce" mode="out-in">
			<router-view></router-view>
		</transition>
	</div>
</template>

<script>
	export default{
		data(){
			return {}
		}
	}
</script>