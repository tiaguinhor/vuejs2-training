<template>
	<div>
		<div class="bottom_wrapper clearfix">
			<div class="message_input_wrapper">
				<input class="message_input" placeholder="Type your message here..." v-model="message" @keyup.enter="addMessage()"/>
			</div>
			
			<div class="send_message" @click="addMessage()" v-bind:disabled="message == ''">
				<div class="icon"></div>
				<div class="text">Send</div>
			</div>
		</div>
	</div>
</template>

<script>
	import MessageBox from 'vue-msgbox'
	import bus from '../../utils/bus'
	
	export default{
		name: 'AddMessages',
		data(){
			return{
				message: ''
			}
		},
		methods: {
			addMessage(){
				if(this.message == '')
					return
				
				this.$http.post('/add-message', {message: this.message, roomId: this.$route.params.roomId}).then(response =>{
					this.message = ''
					
					if(response.data == 'error')
						MessageBox("Error", "Your room not can't be created", "error")
				}, err => console.log(err))
			}
		}
	}
</script>