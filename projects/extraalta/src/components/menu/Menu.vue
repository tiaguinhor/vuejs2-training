<template>
	<md-toolbar>
		<md-button class="md-icon-button" @click.native="toggleLeftSidenav">
			<md-icon>menu</md-icon>
		</md-button>
		
		<h1 class="md-title" style="flex: 1">
			<router-link :to="{name: 'hello'}" class="md-button" exact>{{title}}</router-link>
		</h1>
		
		<div style="flex: 1" class="md-hide-xsmall md-hide-small md-hide-medium">
			<router-link :to="{name: 'hello'}" class="md-button" exact>Empresas</router-link>
			<router-link :to="{name: 'hello'}" class="md-button" exact>Usuários</router-link>
			<router-link :to="{name: 'hello'}" class="md-button" exact>Tarefas</router-link>
			<router-link :to="{name: 'hello'}" class="md-button" exact>Produção</router-link>
			<router-link :to="{name: 'hello'}" class="md-button" exact>Mídia</router-link>
			<router-link :to="{name: 'hello'}" class="md-button" exact>Relatórios</router-link>
			<router-link :to="{name: 'hello'}" class="md-button" exact>Financeiro</router-link>
		</div>
		
		<md-button class="md-icon-button" @click.native="toggleRightSidenav">
			<md-icon>settings</md-icon>
		</md-button>
	</md-toolbar>
</template>

<script>
	//use bus in all components that use call between the children
	import bus from '../../utils/events/bus'

	export default{
		name: 'Menu',
		data (){
			return {
				title: "Extra Alta"
			}
		},
		methods: {
			toggleLeftSidenav(){
				bus.$emit('toggleLeftSidenav')
			},
			toggleRightSidenav(){
				bus.$emit('toggleRightSidenav')
			}
		}
	}
</script>

<style></style>