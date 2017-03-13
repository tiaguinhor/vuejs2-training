<template>
	<form @submit.prevent="uploadAvatar()" enctype="multipart/form-data">
		<img v-bind:src="avatar" alt="" v-if="avatar != ''" class="img-circle">
		
		<div class="form-group">
			<label for="file">Upload your avatar</label>
			<input type="file" name="file" id="file" ref="avatar" class="form-control">
		</div>
		
		<div class="form-group">
			<button type="submit" class="btn btn-info">Upload</button>
		</div>
	</form>
</template>

<script>
	export default{
		name: 'Profile',
		data(){
			return{
				avatar: ''
			}
		},
		mounted(){
			this.getAuthUserAvatar()
		},
		methods: {
			getAuthUserAvatar(){
				this.$http.get('/auth-user-avatar').then(response =>{
					console.log(response.data)
					this.avatar = response.data
				}, err => console.log(err))
			},
			uploadAvatar(){
				let formData = new FormData()
				formData.append('avatar', this.$refs.avatar.files[0])
				
				this.$http.post('/upload-avatar', formData).then(response =>{
					this.avatar = response.data
				}, err => console.log(err))
			}
		}
	}
</script>