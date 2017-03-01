<template>
	<header class="phone-viewport">
		<md-toolbar>
			<md-button class="md-icon button" @click.native="toggleLeftSidenav">
				<md-icon>menu</md-icon>
			</md-button>
			
			<h1 class="md-title">{{title}}</h1>
		</md-toolbar>
		
		<md-sidenav class="md-left" ref="leftSidenav">
			<md-toolbar class="md-medium">
				<div class="md-toolbar-container">
					<h2 class="md-title">Sidenav</h2>
				</div>
			</md-toolbar>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, ullam voluptate! Ab accusamus aperiam blanditiis consequuntur, dicta facere fugiat, maiores, necessitatibus nostrum nulla odit quos sint tempore vero voluptatum! Eum!</p>
		</md-sidenav>
	</header>
</template>

<script>
	export default {
		name: 'TestComponent',
		data (){
			return {
				title: "Test title"
			}
		},
		methods: {
			toggleLeftSidenav(){
				this.$refs.leftSidenav.toggle()
			}
		}
	}
</script>

<style>
</style>
