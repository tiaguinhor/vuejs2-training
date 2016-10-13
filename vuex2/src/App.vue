<template>
	<div>
		<h1>Teste Vuex2</h1>
		<h4>{{user}}</h4>
		<hr>
		<cc-users></cc-users>
	</div>
</template>

<script>
	import CcUsers from './components/users/main.vue'
	import {mapState, mapActions} from 'vuex'
	
	export default {
		name: 'Vuex-Training',
		mounted() {
			const data = {
				name: "Tiago",
				email: "ti@ti.com",
				level: "admin",
				city: "Sanca",
				state: "SP"
			}
			
			setTimeout(() => {
				this.changeUser(data)
			}, 3000)
		},
		components: {
			CcUsers
		},
		methods: {
			...mapActions(['changeUser'])
		},
		computed: {
			...mapState({
				user: state => {
					const {name, email} = state.user
					
					return `O usuario logado é ${name} e o email é ${email}.`
				}
			})
		}
	}
</script>