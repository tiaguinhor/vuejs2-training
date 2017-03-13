<template>
	<main class="phone-viewport">
		<md-toolbar>
			<md-button class="md-icon button" @click.native="toggleLeftSidenav">
				<md-icon>menu</md-icon>
			</md-button>
			
			<h1 class="md-title">{{title}}</h1>
		</md-toolbar>
		
		<md-sidenav class="md-left" ref="leftSidenav">
			<md-toolbar>
				<div class="md-toolbar-container">
					<h2 class="md-title">Sidenav</h2>
				</div>
			</md-toolbar>
			
			<md-list @click.native="closeLeftSidenav">
				<md-list-item>
					<router-link :to="{name: 'profile', params: {profileId: 1}}" exact>Perfil</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'categories'}" exact>Categorias</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'products'}" exact>Produtos</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'logout'}" exact>Sair</router-link>
				</md-list-item>
			</md-list>
		</md-sidenav>
		
		<md-layout md-row>
			<router-view></router-view>
		</md-layout>
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

<style src="assets/sass/style.scss" lang="sass"></style>
