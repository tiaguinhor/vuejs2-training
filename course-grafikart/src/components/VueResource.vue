<template>
	<div>
		<div class="ui active dimmer" v-if="loading">
			<div class="ui loader"></div>
		</div>
		
		<div class="ui four column grid">
			<div class="column" v-for="user in users">
				<div class="ui card">
					<div class="content">
						<div class="header">
							<input type="text" v-model="user.name" style="width: 100%;">
						</div>
						
						<div class="meta">
							<a href="">Friends</a>
						</div>
						
						<div class="description">
							{{user.address.street}} <br>
							{{user.address.zipcode}} {{user.address.city}}
						</div>
					</div>
					
					<div class="extra content">
						<div class="ui two buttons">
							<div class="ui basic green button" @click="update(user)">Editar</div>
							<div class="ui basic red button" @click="remove(user)">Remover</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default{
		data(){
			return {
				users: [],
				loading: false
			}
		},
		mounted(){
			this.$user = this.$resource('users{/id}', {}, {}, {
				before: ()=> this.loading = true,
				after: ()=> this.loading = false
			})
			
			//			this.$http.get('http://jsonplaceholder.typicode.com/users')
			this.$user.query().then((response) =>{
				this.users = response.data
			}, (error) =>{
				console.log('error', error)
			})
		},
		methods: {
			update(user){
				//				this.$http.put('http://jsonplaceholder.typicode.com/users/' + user.id, {name: user.name})
				this.$user.save({id: user.id}, {name: user.name}).then((response) =>{
					this.users = response.data
				}, (error) =>{
					console.log('error', error)
				})
			},
			remove(user){
				//				this.$http.delete('http://jsonplaceholder.typicode.com/users/' + user.id)
				this.$user.remove({id: user.id}).then((response) =>{
					this.users.filter(u => u !== user)
				}, (error) =>{
					console.log('error', error)
				})
				
			}
		}
	}
</script>