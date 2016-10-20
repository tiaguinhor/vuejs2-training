<template>
	<div class="carousel">
		<transition :name="transition" v-for="(slide, index) in slides">
			<div v-show="visible">
				<div style="position: absolute; left: 0; right: 0; top: 50%; text-align: center; color: white; font-size: 16px; font-weight: bolder;">
					{{slide.title}}
				</div>
				
				<img :src="slide.image" alt="" width="100%">
			</div>
		</transition>
		
		<button class="carousel-nav carousel-prev" @click="prev()">Anterior</button>
		<button class="carousel-nav carousel-next" @click="next()">Proximo</button>
		
		<div class="carousel-pagination">
			<button v-for="n in slidesCount" @click="goTo(n-1)" :class="{active: n-1 == index}"></button>
		</div>
	</div>
</template>

<script>
	export default{
		name: 'carousel',
		props: {
			value: {type: Array, default: []}
		},
		data(){
			return {
				index: 0,
				selectedIndex: 0,
				slides: [],
				direction: null
			}
		},
		mounted(){
			this.slides = this.value
			this.slides.forEach((slide, key) =>{
				slide.index = key
			})
		},
		computed: {
			slidesCount(){
				return this.slides.length
			},
			transition(){
				if(this.direction)
					return `slide-${this.direction}`
			},
			visible(){
				return this.index === this.selectedIndex
			}
		},
		methods: {
			next(){
				this.index++
				this.direction = 'right'
				
				if(this.index >= this.slidesCount)
					this.index = 0
			},
			prev(){
				this.index--
				this.direction = 'left'
				
				if(this.index < 0)
					this.index = this.slidesCount - 1
			},
			goTo(index){
				this.direction = (index > this.index) ? 'right' : 'left'
				this.index = index
			}
		}
	}
</script>

<style>
	.carousel{
		position: relative;
		overflow: hidden;
	}
	
	.carousel-nav{
		background-color: white;
		color: black;
		font-weight: bolder;
		padding: 10px;
		position: absolute;
		top: 50%;
		left: 10px;
	}
	
	.carousel-next{
		right: 10px;
		left: auto;
	}
	
	.carousel-pagination{
		position: absolute;
		bottom: 10px;
		left: 0;
		right: 0;
		text-align: center;
	}
	
	.carousel-pagination button{
		display: inline-block;
		background-color: black;
		opacity: .8;
		margin: 0 5px;
		border: 0;
		border-radius: 50%;
		width: 15px;
		height: 15px;
		cursor: pointer;
	}
	
	.carousel-pagination button:hover, .carousel-pagination button.active{
		background-color: white;
	}
	
	.slide-right-enter-active{
		animation: slideRightIn .6s ease;
	}
	
	.slide-right-leave-active{
		animation: slideRightOut .6s ease;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		width: 100%;
	}
	
	@keyframes slideRightIn{
		from{ transform: translateX(100%) }
		to{ transform: translateX(0) }
	}
	
	@keyframes slideRightOut{
		from{ transform: translateX(0) }
		to{ transform: translateX(-100%) }
	}
	
	.slide-left-enter-active{
		animation: slideLeftIn .6s ease;
	}
	
	.slide-left-leave-active{
		animation: slideLeftOut .6s ease;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		width: 100%;
	}
	
	@keyframes slideLeftIn{
		from{ transform: translateX(-100%) }
		to{ transform: translateX(0) }
	}
	
	@keyframes slideLeftOut{
		from{ transform: translateX(0) }
		to{ transform: translateX(100%) }
	}
</style>