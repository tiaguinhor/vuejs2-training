<template>
	<div>
		<div class="bottom_wrapper clearfix">
			<div class="message_input_wrapper">
				<input class="message_input" placeholder="Type your message here..." v-model="message" @keyup.enter="addMessage()"/>
			</div>
			
			<div class="send_message">
				<div class="icon"></div>
				<div class="text">Send</div>
			</div>
		</div>
	</div>
</template>

<script>
	import MessageBox from 'vue-msgbox'
	
	export default{
		data(){
			return{
				message: ''
			}
		},
		methods: {
			addMessage(){
				this.$http.post('/add-message', {message: this.message, room_id: this.$route.params.room_id}).then(response =>{
					//					console.log(response)
					this.message = ''
					
					if(response.data == 'done')
						MessageBox("Error", "Your room not can't be created", "error")
					else
						MessageBox("Error", "Your room not can't be created", "error")
				}, err => console.log(err))
			}
		}
	}
</script>