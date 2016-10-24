<template>
	<div>
		<h2>{{title}}</h2>
	</div>
</template>

<script>
	export default{
		data(){
			return {
				title: 'Page C'
			}
		},
		beforeRouteEnter(route, redirect, next){
			window.setTimeout(() =>{
				next(vm =>{
					vm.title = 'Before enter page c'
				})
			}, 2000)
		},
		beforeRouteLeave(route, redirect, next){
			if(window.confirm('Are you sure you want to leave the page?'))
				next()
		}
	}
</script>