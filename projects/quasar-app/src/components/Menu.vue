<template>
	<div>
		<!-- Header -->
		<div slot="header" class="toolbar">
			<!-- opens left-side drawer using its ref -->
			<!--<button @click="$refs.leftDrawer.open()">-->
				<!--<i>menu</i>-->
			<!--</button>-->
			
			<quasar-toolbar-title :padding="1">
				Alta Comunicazione
			</quasar-toolbar-title>
			
			<!-- opens right-side drawer using its ref -->
			<!--<button @click="$refs.rightDrawer.open()">-->
				<!--<i>assignment</i>-->
			<!--</button>-->
		</div>
		
		<!-- Left-side Drawer -->
		<!--<quasar-drawer ref="leftDrawer">-->
			<!--<cc-menu-left-side></cc-menu-left-side>-->
		<!--</quasar-drawer>-->
		
		<!-- Right-side Drawer -->
		<!--<quasar-drawer right-side ref="rightDrawer">-->
			<!--<cc-menu-right-side></cc-menu-right-side>-->
		<!--</quasar-drawer>-->
		
		<!-- Navigation Tabs -->
		<quasar-tabs slot="navigation">
			<quasar-tab icon="home" route="/" exact replace>Home</quasar-tab>
			<quasar-tab icon="contact_mail" route="/budget" exact replace>Orçamento</quasar-tab>
			<quasar-tab icon="info" route="/about" exact replace>Sobre</quasar-tab>
		</quasar-tabs>
	</div>
</template>

<script>
	import CcMenuLeftSide from './MenuLeftSide.vue'
	import CcMenuRightSide from './MenuRightSide.vue'
	
	export default{
		data(){
			return {}
		},
		components: {
			CcMenuLeftSide,
			CcMenuRightSide
		}
	}
</script>

<style lang="scss">
	.item > .item-content{
		color: #757575;
	}
</style>