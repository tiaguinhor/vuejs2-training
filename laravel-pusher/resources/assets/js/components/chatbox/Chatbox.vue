<template>
	<div>
		<div class="row">
			<div class="col-xs-6 text-left">
				<router-link :to="{name: 'allRooms'}" class="btn btn-info">All Rooms</router-link>
			</div>
			<div class="col-xs-6 text-right">
				<router-link :to="{name: 'myRooms'}" class="btn btn-danger">My Rooms</router-link>
			</div>
		</div>
		
		<div class="chat_window">
			<div class="top_menu">
				<div class="title">Chat</div>
			</div>
			
			<cc-all-message></cc-all-message>
			<cc-add-message></cc-add-message>
		</div>
		
		<div class="message_template">
			<div class="message">
				<div class="avatar"></div>
				<div class="text_wrapper">
					<div class="text"></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import CcAddMessage from './AddMessage.vue'
	import CcAllMessage from './AllMessage.vue'
	
	export default{
		data(){
			return{
				
			}
		},
		components: {
			CcAddMessage,
			CcAllMessage
		}
	}
</script>