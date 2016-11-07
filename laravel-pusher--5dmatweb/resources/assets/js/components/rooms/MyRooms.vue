<template>
	<div>
		<h1>My Rooms ({{rooms.length}})</h1>
		
		<table class="table">
			<tr>
				<th>Room Name</th>
				<th>Add Date</th>
				<th></th>
			</tr>
			
			<tr v-for="(room, index) in rooms">
				<td>
					<router-link :to="{name: 'chat', params: {roomId: room.id, roomName: room.name}}">{{room.name}}</router-link>
				</td>
				<td>{{room.created_at | dateNow}}</td>
				<td>
					<button class="btn btn-danger" @click="deleteRoom(room.id, index)">
						<i class="fa fa-trash"></i>
					</button>
				</td>
			</tr>
		</table>
	</div>
</template>

<script>
	import MessageBox from 'vue-msgbox'
	import moment from 'moment'
	import 'moment/locale/pt-br'
	
	export default{
		data(){
			return {
				rooms: []
			}
		},
		mounted(){
			this.$http.get('/my-rooms').then(response =>{
				this.rooms = response.data
			}, err => console.log(err))
		},
		methods: {
			deleteRoom(roomId, index){
				this.$http.get('/delete-room/' + roomId).then(response =>{
					if(response.data == 'done'){
						this.rooms.splice(index, 1)
						MessageBox("Success", "Your room not can't be created", 'success')
					}else
						MessageBox("Error", "Your room not can't be created", 'warning')
				}, err => console.log(err))
			}
		},
		filters: {
			dateNow: function(date){
				return moment(date).fromNow()
			}
		}
	}
</script>