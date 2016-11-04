<template>
	<div class="row">
		<div class="col-lg-9">
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
					<div class="title">{{roomName}} / Online users ({{onlineUsers}})</div>
				</div>
				
				<cc-all-messages :messages="messages"></cc-all-messages>
				<cc-add-message></cc-add-message>
			</div>
		</div>
		
		<div class="col-lg-3">
			<cc-ac></cc-ac>
			<cc-whois-online></cc-whois-online>
		</div>
	</div>
</template>

<script>
	import bus from '../../utils/bus'
	import CcAddMessage from './AddMessage.vue'
	import CcAllMessages from './AllMessage.vue'
	import CcAc from './Ac.vue'
	import CcWhoisOnline from './WhoisOnline.vue'
	
	export default{
		name: 'Chat',
		data(){
			return {
				messages: [],
				onlineUsers: 0,
				channel: '',
				roomName: this.$route.params.roomName
			}
		},
		components: {
			CcAddMessage,
			CcAllMessages,
			CcAc,
			CcWhoisOnline
		},
		created(){
			this.bindEvents(this.$route.params.roomId + '-room', 'newMessages', this.messages)
			this.onlineUpdate()
			this.getMeOnline()
		},
		methods: {
			bindEvents(name, action, object){
				this.channel = this.$pusher.subscribe(name)
				this.channel.bind(action, data =>{
					console.log(object);
					object.push(data)
				})
			},
			getMeOnline(){
				this.$http.get('/get-online/' + this.$route.params.roomId).then(response =>{
					//
				}, err => console.log(err))
			},
			onlineUpdate(){
				this.channel = this.$pusher.subscribe(this.$route.params.roomId + '-online')
				this.channel.bind('onlineUser', data => this.onlineUsers = data)
				
				this.channel = this.$pusher.subscribe(this.$route.params.roomId + '-offline')
				this.channel.bind('leaveUser', data => this.onlineUsers = data)
			}
		}
	}
</script>