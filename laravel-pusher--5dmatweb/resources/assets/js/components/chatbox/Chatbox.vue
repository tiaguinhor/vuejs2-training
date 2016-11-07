<template>
	<div class="row">
		<div class="col-lg-9">
			<div class="chat_window">
				<div class="top_menu">
					<div class="title">{{roomName}} / Online users ({{onlineUsers}})</div>
				</div>
				
				<cc-all-messages :messages="messages"></cc-all-messages>
				<cc-add-message></cc-add-message>
			</div>
		</div>
		
		<div class="col-lg-3">
			<cc-user-action :userAction="userAction"></cc-user-action>
			<cc-whois-online :whoisOnline="whoisOnline"></cc-whois-online>
		</div>
	</div>
</template>

<script>
	import bus from '../../utils/bus'
	import CcAddMessage from './AddMessage.vue'
	import CcAllMessages from './AllMessage.vue'
	import CcUserAction from './UserAction.vue'
	import CcWhoisOnline from './WhoisOnline.vue'
	
	export default{
		name: 'Chat',
		data(){
			return {
				messages: [],
				onlineUsers: 0,
				channel: '',
				roomName: this.$route.params.roomName,
				userAction: [],
				whoisOnline: []
			}
		},
		components: {
			CcAddMessage,
			CcAllMessages,
			CcUserAction,
			CcWhoisOnline
		},
		ready(){
			window.beforeunload =	this.leaving()
		},
		mounted(){
			this.bindEvents(this.$route.params.roomId + '-room', 'newMessages', this.messages)
			this.onlineUpdate()
			this.getMeOnline()
		},
		methods: {
			leaving(){
				this.$http.get('/leaving/' + this.$route.params.roomId).then(response =>{
					//
				}, err => console.log(err))
			},
			bindEvents(name, action, object){
				this.channel = this.$pusher.subscribe(name)
				this.channel.bind(action, data =>{
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
				this.channel.bind('onlineUser', data =>{
					this.onlineUsers = data.count
					this.whoisOnline = data.user
					this.userAction.push(data.action)
				})
				
				this.channel = this.$pusher.subscribe(this.$route.params.roomId + '-offline')
				this.channel.bind('offlineUser', data =>{
					this.onlineUsers = data.count
					this.whoisOnline = data.user
					this.userAction.push(data.action)
				})
			}
		}
	}
</script>