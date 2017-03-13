<template>
	<div class="lightbox" v-if="image" @click="close()">
		<transition :name="transition">
			<cc-lightbox-image :image="image" :key="image"></cc-lightbox-image>
		</transition>
		
		<div class="lightbox-close" @click="close()">X</div>
		<div class="lightbox-btn lightbox-next" @click.stop.prevent="next()">Próximo</div>
		<div class="lightbox-btn lightbox-prev" @click.stop.prevent="prev()">Anterior</div>
	</div>
</template>

<script>
	import './LightboxDirective'
	import CcLightboxImage from './LightboxImage.vue'
	import store from './LightboxStore'
	
	export default{
		name: 'lightbox',
		data(){
			return {
				state: store.state,
				direction: 'next'
			}
		},
		components: {
			CcLightboxImage
		},
		methods: {
			close(){
				store.close()
			},
			next(){
				this.direction = 'next'
				store.next()
			},
			prev(){
				this.direction = 'prev'
				store.prev()
			}
		},
		computed: {
			image(){
				if(this.state.index !== false)
					return this.state.images[this.state.group][this.state.index]
			},
			transition(){
				return `lightbox-${this.direction}`
			}
		}
	}
</script>

<style src="./lightbox.scss" lang="sass"></style>