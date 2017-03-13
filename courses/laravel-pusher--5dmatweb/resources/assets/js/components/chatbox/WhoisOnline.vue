<template>
	<div class="row well" style="max-height: 150px;">
		<table class="table table-striped">
			<tr v-for="online in whoisOnline">
				<td width="50px">
					<span v-if="online.users.avatar != ''">
						<img v-bind:src="'/images/avatars/'+online.users.avatar" alt="" width="30" class="img-circle">
					</span>
					
					<span v-else>
						<img src="/images/avatars/profile-image.jpg" alt="" width="30" class="img-circle">
					</span>
				</td>
				
				<td>{{online.users.name}}</td>
				
				<td width="20px">
					<i class="fa fa-circle" style="color: green;"></i>
				</td>
			</tr>
		</table>
	</div>
</template>

<script>
	export default{
		name: 'Whois',
		props: ['whoisOnline'],
		data(){
			return {}
		}
	}
</script>