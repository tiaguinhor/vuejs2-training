<template>
	<div>
		<h1>Add New Room</h1>
		
		<div class="form-group">
			<label for="name">Room Name</label>
			<input type="text" name="name" id="name" class="form-control" v-model="roomName">
		</div>
		
		<div class="form-group">
			<button class="btn btn-default" @click.prevent="addNewRoom()" v-bind:disabled="roomName == ''">Add Room</button>
		</div>
	</div>
</template>

<script>
	import MessageBox from 'vue-msgbox'
	
	export default{
		data(){
			return {
				roomName: '',
				isLoading: false
			}
		},
		methods: {
			addNewRoom(){
				this.$http.post('/add-room', {name: this.roomName}).then(response =>{
//					console.log(response)
					this.roomName = ''
					
					if(response.data == 'done'){
						MessageBox({
							title: 'Room Added',
							message: 'Room added with success',
							type: 'success',
							confirmButtonText: 'OK',
							showCancelButton: false
						}).then((action) =>{
							console.log('callback:', action);
						})
					}else{
						MessageBox("Error", "Your room not can't be created", {type: 'warning', confirmButtonText: 'OK'})
					}
				}, err => console.log(err))
			}
		}
	}
</script>