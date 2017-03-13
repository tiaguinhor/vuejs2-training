<template>
	<div class="card" v-if="page">
		<div class="card-title">
			{{page.title.rendered}}
		</div>
		
		<div class="card-content">
			<p v-html="page.content.rendered"></p>
		</div>
	</div>
</template>

<script>
	import {Loading} from 'quasar'
	
	export default{
		data(){
			return {
				page: null
			}
		},
		mounted(){
			this.$actResource = this.$resource('pages{/id}', {}, {}, {
				before: ()=> Loading.show(),
				after: ()=> Loading.hide()
			})
			
			//http://www.altacomunicazione.com.br/wp-json/wp/v2/posts
			//http://www.altacomunicazione.com.br/wp-json/wp/v2/pages/1432
			this.$actResource.get({id: 1432}).then(response =>{
				this.page = response.data
			}, err => console.log(err))
		}
	}
</script>

<style lang="scss">
	h3{
		font-size: 2rem !important;
	}
	
	.alignleft, img.alignleft{
		float: left;
		margin: 20px 20px 20px 0;
	}
</style>