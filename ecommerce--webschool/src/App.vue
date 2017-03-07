<template>
	<main class="phone-viewport">
		<md-toolbar>
			<md-button class="md-icon button" @click.native="toggleLeftSidenav">
				<md-icon>menu</md-icon>
			</md-button>
			
			<h1 class="md-title">{{title}}</h1>
		</md-toolbar>
		
		<md-sidenav class="md-left" ref="leftSidenav" md-swipeable="true">
			<md-toolbar class="md-medium">
				<div class="md-toolbar-container">
					<h2 class="md-title">Sidenav</h2>
				</div>
			</md-toolbar>
			
			<md-list @click.native="closeLeftSidenav">
				<md-list-item>
					<router-link to="">Perfil</router-link>
				</md-list-item>
				<md-list-item>
					<router-link to="/categories">Categorias</router-link>
				</md-list-item>
				<md-list-item>
					<router-link to="/products">Produtos</router-link>
				</md-list-item>
				<md-list-item>
					<router-link to="">Sair</router-link>
				</md-list-item>
			</md-list>
		</md-sidenav>
		
		<md-row>
			<router-view></router-view>
		</md-row>
	</main>
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
			},
			closeLeftSidenav(){
				this.$refs.leftSidenav.close();
			}
		}
	}
</script>

<style>
</style>
