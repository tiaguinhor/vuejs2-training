<template>
	<div>
		<button :disabled="!hasUser" @click="mudarDados">Mudar dados do usuário - {{message}}</button>
	</div>
</template>

<script>
	import {mapActions} from 'vuex'
	
	export default{
		props: {
			message: {
				type: [String, Number],
				default: 'Teste'
			}
		},
		methods: {
			mudarDados(){
				const data = {
					name: "Titi",
					email: "titi@titi.com",
					level: "user",
					city: "Sanca",
					state: "SP"
				}
				
				this.changeUser(data)
			},
			...mapActions(['changeUser'])
		},
		computed: {
			hasUser(){
				return this.$store.state.user.name !== ''
			}
		}
	}
</script>