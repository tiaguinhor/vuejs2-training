<template>
	<div>
		<ul class="messages">
			<li class="message left appeared" v-for="message in messages">
				<div class="avatar">
					<span v-if="message.users.avatar != ''">
						<img v-bind:src="'/images/avatars/'+message.users.avatar" alt="" width="60" class="img-circle">
					</span>
					
					<span v-else>
						<img src="/images/avatars/profile-image.jpg" alt="" width="60" class="img-circle">
					</span>
				</div>
				
				<div class="text_wrapper">
					<div class="text">
						<span class="user">
							<i class="fa fa-user"></i> {{message.users.name}}
						</span>
						<div class="clearfix"></div>
						
						<p class="message pull-left">
							{{message.body}}
						</p>
						
						<span class="small pull-right">
							<i class="fa fa-clock-o"></i> {{message.created_at}}
						</span>
						<div class="clearfix"></div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</template>

<script>
	import 'vue-sticky-scroll'
	
	export default{
		name: 'AllMessages',
		props: {
			messages: {
				type: Array,
				default: () => []
			}
		},
		data(){
			return{
			}
		}
	}
</script>

<style>
	.small{
		font-size: 10px;
	}
	.user{
		font-size: 12px;
		font-weight: bolder;
	}
	.message{
		font-size: 13px;
	}
	.messages .message{
		opacity: 1;
	}
</style>