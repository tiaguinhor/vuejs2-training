<template>
	<div class="row well" style="max-height: 150px; overflow: auto;">
		<table class="table table-striped">
			<tr v-for="action in userAction">
				<td>{{action}}</td>
			</tr>
		</table>
	</div>
</template>

<script>
	import 'vue-sticky-scroll'
	
	export default{
		name: 'UserAction',
		props: ['userAction'],
		data(){
			return {}
		}
	}
</script>