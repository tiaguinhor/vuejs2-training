<template>
	<div>
		<p>
			Email: {{email}}
		</p>
		
		<p>
			Localidade: {{localidade}}
		</p>
		
		<cc-button :message="Testando"></cc-button>
	</div>
</template>

<script>
	import CcButton from './button.vue'
	
	export default{
		components: {
			CcButton
		},
		computed: {
			email(){
				return this.$store.state.user.email
			},
			localidade(){
				return this.$store.getters.localidade
			}
		}
	}
</script>