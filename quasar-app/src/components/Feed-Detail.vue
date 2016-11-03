<template>
	<div class="card" v-if="post">
		<div class="card-title">
			{{post.title.rendered}}
			
			<p>
				<small>{{post.date_gmt | date}}</small>
			</p>
		</div>
		
		<img :src="post.featured_image" alt="">
		
		<div class="card-content">
			<p v-html="post.content.rendered"></p>
		</div>
	</div>
</template>

<script>
	import {Loading} from 'quasar'
	import moment from 'moment'
	require('moment/locale/pt-br')
	
	export default{
		data(){
			return {
				post: null
			}
		},
		mounted(){
			const params = this.$root.$route.params
			
			this.$actResource = this.$resource('posts{/id}', {}, {}, {
				before: ()=> Loading.show(),
				after: ()=> Loading.hide()
			})
			
			//http://www.altacomunicazione.com.br/wp-json/wp/v2/posts
			//http://www.altacomunicazione.com.br/wp-json/wp/v2/pages/1432
			this.$actResource.get({id: params.id}).then((response) =>{
				this.post = response.data
			}, err => console.log(err))
		},
		filters: {
			date: function(date){
				return moment(date).format('Do [de] MMMM YYYY, H:mm');
			}
		}
	}
</script>

<style lang="scss">
	h2{
		font-size: 2rem !important;
	}
</style>