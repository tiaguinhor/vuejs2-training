<template>
	<quasar-layout>
		<!-- Menu -->
		<cc-menu slot="header"></cc-menu>
		
		<!-- Content -->
		<quasar-transition name="slide">
			<router-view class="layout-view"></router-view>
		</quasar-transition>
		
		<!-- Footer -->
		<!--<cc-footer slot="footer" class="toolbar"></cc-footer>-->
	</quasar-layout>
</template>

<script>
	import CcMenu from '../Menu.vue'
	import CcFooter from '../Footer.vue'
	
	export default{
		data(){
			return {}
		},
		components: {
			CcMenu,
			CcFooter
		}
	}
</script>

<style lang="scss">
	.layout-content > div{
		width: 100%;
	}
	
	.layout-padding{
		max-width: inherit !important;
	}
</style>
