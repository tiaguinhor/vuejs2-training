<template>
	<md-sidenav class="md-left" ref="leftSidenav">
		<md-toolbar>
			<div class="md-toolbar-container md-align-center">
				<h2><img src="../../assets/logo.png"></h2>
			</div>
		</md-toolbar>
		
		<md-list>
			<md-list-item>
				<router-link :to="{name: 'profile', params: {profileId: 1}}" exact>
					<md-avatar>
						<img src="https://placeimg.com/40/40/people/5" alt="People">
					</md-avatar>
					
					<div class="md-list-text-container">
						<span>Biruleibe Souza</span>
						<span>Proprietário</span>
					</div>
				</router-link>
			</md-list-item>
			
			<md-divider class="md-inset"></md-divider>
			
			<md-list-item>
				<form novalidate>
					<md-input-container>
						<label>Buscar Clientes</label>
						<md-input type="text" placeholder="Clientes" v-model="search.customer"></md-input>
						<md-icon>search</md-icon>
					</md-input-container>
				</form>
			</md-list-item>
			
			<div class="customers">
				<md-list-item v-for="(customer, index) in filteredCustomers" :key="customer.name">
					<span>{{customer.name}}</span>
					
					<md-list-expand v-if="customer.brands.length > 0">
						<md-list>
							<md-list-item class="md-inset" v-for="(brand, index) in customer.brands" :key="brand.name">
								<span>{{brand.name}}</span>
								
								<md-list-expand v-if="brand.projects.length > 0">
									<md-list>
										<md-list-item class="md-inset-inset" v-for="(project, index) in brand.projects" :key="project">
											<router-link :to="{name: 'hello'}" exact>{{project}}</router-link>
										</md-list-item>
									</md-list>
								</md-list-expand>
							</md-list-item>
						</md-list>
					</md-list-expand>
					
					<md-divider></md-divider>
				</md-list-item>
			</div>
			
			<div class="md-hide-large-and-up">
				<md-list-item>
					<router-link :to="{name: 'hello'}" exact>Empresas</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'hello'}" exact>Usuários</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'hello'}" exact>Tarefas</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'hello'}" exact>Produção</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'hello'}" exact>Mídia</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'hello'}" exact>Relatórios</router-link>
				</md-list-item>
				<md-list-item>
					<router-link :to="{name: 'hello'}" exact>Financeiro</router-link>
				</md-list-item>
				
				<md-divider></md-divider>
			</div>
			
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
		name: 'MenuLeft',
		data(){
			return {
				customers: [
					{
						name: 'Santa Helena',
						brands: [
							{name: 'Paçoquita', projects: []},
							{name: 'Mendorato', projects: ['Jogo']},
							{name: 'Crokissimo', projects: []}
						]
					},
					{
						name: 'Cia Muller',
						brands: []
					},
					{
						name: 'Grupo Algar',
						brands: []
					}
				],
				search: {
					customer: '',
					employee: ''
				}
			}
		},
		mounted(){
			bus.$on('toggleLeftSidenav', () => this.$refs.leftSidenav.toggle())
			bus.$on('closeLeftSidenav', () => this.closeLeftSidenav())
		},
		computed: {
			filteredCustomers(){
				let customersOrdered = _.orderBy(this.customers, 'name')
				
				return customersOrdered.filter((customer) =>{
					return customer.name.toLowerCase().indexOf(this.search.customer.toLowerCase()) !== -1
				})
			}
		},
		methods: {
			closeLeftSidenav() {
				this.$refs.leftSidenav.close()
			}
		},
		watch: {
			//			'search.customers': (val, oldVal) =>{
			//				console.log(val, oldVal)
			//			}
			//			search: {
			//				handler: (val) =>{
			//					console.log(val.customer)
			//					console.log(val.employee)
			//				},
			//				deep: true
			//			}
		}
	}
</script>

<style></style>
