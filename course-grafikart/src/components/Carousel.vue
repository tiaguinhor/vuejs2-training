<template>
	<div class="carousel">
		<transition-group :name="transition" tag="div" v-for="(slide, index) in slides" v-show="selected(index)">
			<div :key="index">
				<div class="carousel-caption">
					{{slide.title}}
				</div>
				
				<img :src="slide.image" alt="" width="100%">
			</div>
		</transition-group>
		
		<button class="carousel-nav carousel-prev" @click="prev()">Anterior</button>
		<button class="carousel-nav carousel-next" @click="next()">Proximo</button>
		
		<div class="carousel-pagination">
			<button v-for="(n, index) in slidesCount" @click="goTo(index)" :class="{active: selected(index)}"></button>
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
			}
		},
		methods: {
			next(){
				this.selectedIndex++
				this.direction = 'right'
				
				if(this.selectedIndex >= this.slidesCount)
					this.selectedIndex = 0
			},
			prev(){
				this.selectedIndex--
				this.direction = 'left'
				
				if(this.selectedIndex < 0)
					this.selectedIndex = this.slidesCount - 1
			},
			goTo(index){
				this.direction = (index > this.selectedIndex) ? 'right' : 'left'
				this.selectedIndex = index
			},
			selected(index){
				return this.selectedIndex === index
			}
		}
	}
</script>

<style>
	.carousel{
		position: relative;
		overflow: hidden;
	}
	.carousel button{
		border: none;
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
	
	.carousel-caption{
		position: absolute;
		left: 0;
		right: 0;
		top: 50%;
		text-align: center;
		color: white;
		font-size: 16px;
		font-weight: bolder;
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