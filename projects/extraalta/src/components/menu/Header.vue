<template>
	<header>
		<cc-menu></cc-menu>
		<cc-left-side></cc-left-side>
		<cc-right-side></cc-right-side>
	</header>
</template>

<script>
	import CcMenu from './Menu'
	import CcLeftSide from './LeftSide'
	import CcRightSide from './RightSide'

	export default{
		name: 'Header',
		data (){
			return {}
		},
		components: {
			CcMenu,
			CcLeftSide,
			CcRightSide
		}
	}
</script>

<style></style>