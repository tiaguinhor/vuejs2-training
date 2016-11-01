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
				<td>{{room.name}}</td>
				<td>{{room.created_at}}</td>
				<td>{{room.users.name | moment("from", "now")}}</td>
			</tr>
		</table>
	</div>
</template>

<script>
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
		}
	}
</script>