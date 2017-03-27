<template>
	<header>
		<cc-menu></cc-menu>
		
		<cc-left-side></cc-left-side>
		
		<cc-right-side>
			<template slot="title">Direito</template>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut dignissimos exercitationem iste itaque, magni nisi perspiciatis placeat provident repellendus veniam vero voluptatum. Blanditiis illo magni modi, qui quis tempora velit!</p>
		</cc-right-side>
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