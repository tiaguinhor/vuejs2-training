<template>
	<div>
		<h1>All Rooms ({{rooms.length}})</h1>
		
		<table class="table">
			<tr>
				<th>Room Name</th>
				<th>Add Date</th>
				<th>User</th>
			</tr>
			
			<tr v-for="room in rooms">
				<td>
					<router-link :to="{name: 'chat', params: {roomId: room.id, roomName: room.name}}">{{room.name}}</router-link>
				</td>
				<td>{{room.created_at | dateNow}}</td>
				<td>{{room.users.name}}</td>
			</tr>
		</table>
	</div>
</template>

<script>
	import moment from 'moment'
	import 'moment/locale/pt-br'
	
	export default{
		data(){
			return {
				rooms: []
			}
		},
		mounted(){
			this.$http.get('/all-rooms').then(response =>{
				this.rooms = response.data
			}, err => console.log(err))
		},
		filters: {
			dateNow: function(date){
				return moment(date).fromNow()
			}
		}
	}
</script>