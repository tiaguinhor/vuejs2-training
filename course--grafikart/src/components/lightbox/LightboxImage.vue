<template>
	<div @click.stop>
		<div v-if="loading" class="lightbox-loading"></div>
		
		<transition name="lightbox-fade">
			<img :src="src" alt="" class="lightbox-image" :style="style" :key="src">
		</transition>
	</div>
</template>

<script>
	export default{
		name: 'lightbox-image',
		props: {
			image: String
		},
		data(){
			return {
				loading: true,
				src: false,
				style: {}
			}
		},
		methods: {
			resizeImage(image){
				let width = image.width
				let height = image.height
				
				if(width > window.innerWidth || height > window.innerHeight){
					let ratio = width / height
					let windowRatio = window.innerWidth / window.innerHeight
					
					if(ratio > windowRatio){
						width = window.innerWidth
						height = width / ratio
					}else{
						height = window.innerHeight
						width = height * ratio
					}
				}
				
				this.style = {
					width: `${width}px`,
					height: `${height}px`,
					top: `${((window.innerHeight - height) * 0.5)}px`,
					left: `${((window.innerWidth - width) * 0.5)}px`
				}
			}
		},
		mounted(){
			let image = new window.Image()
			
			image.onload = () =>{
				this.loading = false
				this.src = this.image
				
				this.resizeImage(image)
			}
			
			image.src = this.image
			this.resizeEvent = () => this.resizeImage(image)
			window.addEventListener('resize', this.resizeEvent)
		},
		destroyed(){
			window.removeEventListener('resize', this.resizeEvent)
		}
	}
</script>