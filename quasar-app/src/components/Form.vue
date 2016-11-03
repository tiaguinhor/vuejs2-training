<template>
	<div>
		<div class="row big-gutter wrap">
			<div class="auto">
				<input name="name" type="text" class="full-width" v-model="form.name" placeholder="Seu Nome" required>
			</div>
		</div>
		
		<div class="row big-gutter wrap">
			<div class="auto">
				<input name="email" type="email" class="full-width" v-model="form.email" placeholder="Seu Email" required>
			</div>
			
			<div class="auto">
				<input name="phone" type="text" class="full-width" v-model="form.phone" placeholder="Seu Telefone" required>
			</div>
		</div>
		
		<div class="row big-gutter wrap">
			<div class="auto">
				<input name="business" type="text" class="full-width" v-model="form.business" placeholder="Empresa" required>
			</div>
			
			<div class="auto">
				<input name="city" type="text" class="full-width" v-model="form.city" placeholder="Cidade" required>
			</div>
			
			<div class="auto">
				<quasar-select name="estate" class="full-width" type="radio" required
				               v-model="form.estate"
				               :options="estates">
				</quasar-select>
			</div>
		</div>
		
		<p>Como deseja conduzir esse contato?</p>
		<div class="row big-gutter wrap">
			<div class="auto">
				<label>
					<quasar-radio name="type" v-model="form.type" val="proposal" required></quasar-radio>
					Desejo uma proposta
				</label>
			</div>
			
			<div class="auto">
				<label>
					<quasar-radio name="type" v-model="form.type" val="meet"></quasar-radio>
					Desejo agendar uma reunião
				</label>
			</div>
		</div>
		
		<div v-show="form.type == 'proposal'">
			<div class="row big-gutter wrap">
				<div class="auto">
					<div class="stacked-label">
						<textarea name="about" class="full-width" v-model="form.proposal_about"></textarea>
						<label>Descreva um pouco sobre o seu negócio, público – alvo e qual o motivo da contratação de uma
							agência:</label>
					</div>
				</div>
			</div>
			
			<div class="row big-gutter wrap">
				<div class="auto">
					<div class="stacked-label">
						<textarea name="competitor" class="full-width" v-model="form.proposal_competitor"></textarea>
						<label>Quais os principais concorrentes?</label>
					</div>
				</div>
			</div>
			
			<p>Mercado em que atua:</p>
			<div class="row big-gutter wrap">
				<div class="auto">
					<label>
						<quasar-checkbox name="national" v-model="form.proposal_national"></quasar-checkbox>
						Nacional
					</label>
				</div>
				
				<div class="auto">
					<label>
						<quasar-checkbox name="regional" v-model="form.proposal_regional"></quasar-checkbox>
						Regional
					</label>
				</div>
				
				<div class="auto">
					<label>
						<quasar-checkbox name="global" v-model="form.proposal_global"></quasar-checkbox>
						Mundial
					</label>
				</div>
			</div>
			
			<p>Qual a necessidade do orçamento?</p>
			<div class="row big-gutter wrap">
				<div class="auto">
					<label>
						<quasar-radio name="job" v-model="form.proposal_need" val="new"></quasar-radio>
						Novo Trabalho
					</label>
				</div>
				
				<div class="auto">
					<label>
						<quasar-radio name="rival" v-model="form.proposal_need" val="rival"></quasar-radio>
						Concorrência
					</label>
				</div>
			</div>
			
			<div v-show="form.proposal_need == 'new'">
				<p>Qual a sua necessidade?</p>
				<div class="row big-gutter wrap">
					<div class="auto">
						<label>
							<quasar-checkbox name="outdoor" v-model="form.proposal_new_outdoor"></quasar-checkbox>
							Outdoor
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="website" v-model="form.proposal_new_website"></quasar-checkbox>
							Website
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="brand" v-model="form.proposal_new_brand"></quasar-checkbox>
							Criação de marca
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="magazine" v-model="form.proposal_new_magazine"></quasar-checkbox>
							Revista
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="events" v-model="form.proposal_new_events"></quasar-checkbox>
							Promoçao de vendas / Eventos
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="paper" v-model="form.proposal_new_paper"></quasar-checkbox>
							Papelaria (Cartão e Timbrado)
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="radio" v-model="form.proposal_new_radio"></quasar-checkbox>
							Rádio
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="seo" v-model="form.proposal_new_seo"></quasar-checkbox>
							SEO
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="media" v-model="form.proposal_new_media"></quasar-checkbox>
							Mídia Online
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="social" v-model="form.proposal_new_social"></quasar-checkbox>
							Redes Sociais
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="folder" v-model="form.proposal_new_folder"></quasar-checkbox>
							Folder/Folheto
						</label>
					</div>
					
					<div class="auto">
						<label>
							<quasar-checkbox name="other" v-model="form.proposal_new_other"></quasar-checkbox>
							Outros
						</label>
					</div>
				</div>
				
				<div class="row big-gutter wrap">
					<div class="auto">
						<div class="stacked-label">
							<textarea name="newPs" class="full-width" v-model="form.proposal_new_ps"></textarea>
							<label>Observações:</label>
						</div>
					</div>
				</div>
			</div>
			
			<div v-show="form.proposal_need == 'rival'">
				<div class="row big-gutter wrap">
					<div class="auto">
						<p>Para esta opção, quantas e quais agências estão participando?</p>
						<input name="participating" type="text" class="full-width" v-model="form.proposal_rival_participating">
					</div>
				</div>
			</div>
		</div>
		
		<div v-show="form.type == 'meet'">
			<p>Disponibilidade de turno:</p>
			<div class="row big-gutter wrap">
				<div class="auto">
					<label>
						<quasar-checkbox name="morning" v-model="form.meet_morning"></quasar-checkbox>
						Manhã
					</label>
				</div>
				
				<div class="auto">
					<label>
						<quasar-checkbox name="afternoon" v-model="form.meet_afternoon"></quasar-checkbox>
						Tarde
					</label>
				</div>
			</div>
			
			<div class="row big-gutter wrap">
				<div class="auto">
					<quasar-datetime name="date" type="date" v-model="form.meet_date" format="DD/MM/YYYY" okLabel="Agendar" cancelLabel="Cancelar"></quasar-datetime>
				</div>
			</div>
			
			<div class="row big-gutter wrap">
				<div class="auto">
					<div class="stacked-label">
						<textarea name="ps" class="full-width" v-model="form.meet_ps"></textarea>
						<label>Observações:</label>
					</div>
				</div>
			</div>
		</div>
		
		<button class="primary" @click.prevent="sendEmail()">Enviar</button>
	</div>
</template>

<script>
	import {Toast} from 'quasar'
	import moment from 'moment'
	require('moment/locale/pt-br')
	
	export default{
		data(){
			return {
				form: {
					name: '',
					email: '',
					phone: '',
					business: '',
					city: '',
					estate: 'SP',
					type: '',
					meet_morning: false,
					meet_afternoon: false,
					meet_date: '',
					meet_ps: '',
					proposal_about: '',
					proposal_competitor: '',
					proposal_national: false,
					proposal_regional: false,
					proposal_global: false,
					proposal_need: '',
					proposal_new_outdoor: false,
					proposal_new_website: false,
					proposal_new_brand: false,
					proposal_new_magazine: false,
					proposal_new_events: false,
					proposal_new_paper: false,
					proposal_new_radio: false,
					proposal_new_seo: false,
					proposal_new_media: false,
					proposal_new_social: false,
					proposal_new_folder: false,
					proposal_new_other: false,
					proposal_new_ps: '',
					proposal_rival_participating: ''
				},
				estates: [
					{
						"value": "AC",
						"label": "Acre"
					},
					{
						"value": "AL",
						"label": "Alagoas"
					},
					{
						"value": "AM",
						"label": "Amazonas"
					},
					{
						"value": "AP",
						"label": "Amapá"
					},
					{
						"value": "BA",
						"label": "Bahia"
					},
					{
						"value": "CE",
						"label": "Ceará"
					},
					{
						"value": "DF",
						"label": "Distrito Federal"
					},
					{
						"value": "ES",
						"label": "Espírito Santo"
					},
					{
						"value": "GO",
						"label": "Goiás"
					},
					{
						"value": "MA",
						"label": "Maranhão"
					},
					{
						"value": "MG",
						"label": "Minas Gerais"
					},
					{
						"value": "MS",
						"label": "Mato Grosso do Sul"
					},
					{
						"value": "MT",
						"label": "Mato Grosso"
					},
					{
						"value": "PA",
						"label": "Pará"
					},
					{
						"value": "PB",
						"label": "Paraíba"
					},
					{
						"value": "PE",
						"label": "Pernambuco"
					},
					{
						"value": "PI",
						"label": "Piauí"
					},
					{
						"value": "PR",
						"label": "Paraná"
					},
					{
						"value": "RJ",
						"label": "Rio de Janeiro"
					},
					{
						"value": "RN",
						"label": "Rio Grande do Norte"
					},
					{
						"value": "RO",
						"label": "Rondônia"
					},
					{
						"value": "RR",
						"label": "Roraima"
					},
					{
						"value": "RS",
						"label": "Rio Grande do Sul"
					},
					{
						"value": "SC",
						"label": "Santa Catarina"
					},
					{
						"value": "SE",
						"label": "Sergipe"
					},
					{
						"value": "SP",
						"label": "São Paulo"
					},
					{
						"value": "TO",
						"label": "Tocantins"
					}
				]
			}
		},
		computed: {
			strDate(){
				return moment().format('YYYY/MM/DD')
			}
		},
		methods: {
			sendEmail(){
				this.$http.post('../../../alta-app/send-email.php', this.form).then(response =>{
					let data = response.data.split('|')
					
					//if success
					if(data[0] == 1){
						Toast.create.positive({
							html: data[1],
							timeout: 5000
						})
						
						return
					}
					
					console.log(response.data)
				}, err => console.log(err))
			}
		},
		mounted(){
			this.form.meet_date = this.strDate
		}
	}
</script>

<style lang="scss">
	.quasar-toast-container{
		bottom: 70px;
	
	.quasar-toast{
		max-width: 94%;
		box-shadow: none;
	}
		
	}
	
	.flex.big-gutter > div, .row.big-gutter > div, .column.big-gutter > div{
		padding: 2rem 0 0 2.5rem !important;
	}
	
	textarea{
		border: 2px solid #eee !important;
		margin-top: 2.5rem !important;
	}
</style>