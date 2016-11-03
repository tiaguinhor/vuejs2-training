<template>
	<div>
		<div class="card" v-for="post in posts">
			<div class="card-title">
				{{post.title.rendered}}
				
				<p>
					<small>{{post.date_gmt | date}}</small>
				</p>
			</div>
			
			<img :src="post.featured_image" alt="">
			
			<div class="card-content">
				<p v-html="post.excerpt.rendered"></p>
				
				<router-link tag="button" :to="{name: 'app.news', params: {id: post.id}}" class="primary">
					LEIA MAIS
				</router-link>
			</div>
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
				posts: []
			}
		},
		mounted(){
			this.$actResource = this.$resource('posts{/id}', {}, {}, {
				before: ()=> Loading.show(),
				after: ()=> Loading.hide()
			})
			
			//http://www.altacomunicazione.com.br/wp-json/wp/v2/posts
			//http://www.altacomunicazione.com.br/wp-json/wp/v2/pages/1432
			this.$actResource.query('posts').then(response =>{
				this.posts = response.data
			}, err => console.log(err))
		},
		filters: {
			date: function(date){
				return moment(date).format('Do [de] MMMM YYYY, H:mm');
			}
		}
	}
</script>