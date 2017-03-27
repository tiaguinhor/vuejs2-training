<template>
	<md-sidenav class="md-right" ref="rightSidenav">
		<md-toolbar>
			<div class="md-toolbar-container">
				<h2 class="md-title"><slot name="title"></slot></h2>
			</div>
		</md-toolbar>
		
		<slot>Default description here</slot>
		
		<md-list>
			<md-list-item>
				<router-link :to="{name: 'hello'}" exact>Sair</router-link>
			</md-list-item>
		</md-list>
	</md-sidenav>
</template>

<script>
	//use bus in all components that use call between the children
	import bus from '../../utils/events/bus'

	export default {
		name: 'MenuRight',
		data(){
			return {}
		},
		mounted(){
			bus.$on('toggleRightSidenav', () => this.$refs.rightSidenav.toggle())
			bus.$on('closeRightSidenav', () => this.closeRightSidenav())
		},
		methods: {
			closeRightSidenav() {
				this.$refs.rightSidenav.close()
			}
		}
	}
</script>

<style></style>
