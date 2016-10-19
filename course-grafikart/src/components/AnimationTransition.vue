<template>
	<div>
		<transition name="fade" mode="out-in" appear>
			<div v-if="visible" key="visible">
				{{message}}
			</div>
			<div v-else key="invisible">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, suscipit?
			</div>
		</transition>
		
		<button @click="toggle">Toggle message</button>
		
		<transition-group name="fade" tag="ul">
			<li v-for="item in items" :key="item">
				{{item}}
				<button @click="removeItem(item)">-</button>
			</li>
		</transition-group>
		
		<button @click="addItem()">Add Item</button>
		<button @click="shuffle()">Shuffle Items</button>
	</div>
</template>

<script>
	export default{
		data(){
			return {
				visible: true,
				message: 'Mensagem',
				items: [1, 2, 3, 4, 5]
			}
		},
		methods: {
			addItem(){
				//Return a random number between 1 and 100:
				this.items.push(Math.floor(Math.random() * 100) + 1)
			},
			removeItem(item){
				let actItem = this.items.indexOf(item)
				this.items.splice(actItem, 1)
			},
			shuffle(){
				this.items = [2, 1, 5, 4, 3]
			},
			toggle(){
				this.visible = !this.visible
			}
		}
	}
</script>

<style>
	.fade-enter-active, .fade-leave-active{
		transition: opacity .3s ease, transform .5s;
	}
	
	.bounce-move{
		transition: transform 1s;
	}
	
	.fade-enter, .fade-leave-active{
		opacity: 0;
		transform: translateX(20px);
	}
</style>