<template>
	<div>
		<section class="todoapp">
			<header class="header">
				<h1>{{title}}</h1>
				
				<input type="text" class="new-todo" placeholder="Inserir novo ToDo" v-model="newTodo" @keyup.enter="addTodo()">
			</header>
		</section>
		
		<div class="main">
			<input type="checkbox" class="toggle-all" v-model="allDone">
			
			<ul class="todo-list">
				<li class="todo" v-for="todo in filteredTodos" :class="{completed: todo.completed, editing: todo === editing}">
					<div class="view">
						<input type="checkbox" v-model="todo.completed" @click="toggleCompleted(todo)" class="toggle">
						<label @dblclick="editTodo(todo)">{{todo.name}}</label>
						<button class="destroy" @click.prevent="removeTodo(todo)"></button>
					</div>
					
					<input type="text" class="edit"
					       v-model.lazy="todo.name"
					       v-focus="todo === editing"
					       @keyup.enter="editTodoDone(todo)"
					       @keyup.esc="editCancel()"
					       @blur="editTodoDone(todo)">
				</li>
			</ul>
		</div>
		
		<footer class="footer" v-if="hasTodo">
			<span class="todo-count"><strong>{{pendentsTodo}}</strong> tarefa pendente</span>
			
			<ul class="filters">
				<li>
					<a href="javascript:"
					   :class="{selected: filter === 'all'}"
					   @click.prevent="filter = 'all'">Todas</a>
				</li>
				<li>
					<a href="javascript:"
					   :class="{selected: filter === 'todo'}"
					   @click.prevent="filter = 'todo'">Pendentes</a>
				</li>
				<li>
					<a href="javascript:"
					   :class="{selected: filter === 'done'}"
					   @click.prevent="filter = 'done'">Concluidas</a>
				</li>
			</ul>
			
			<button class="clear-completed" @click="removeCompleted()">Limpar concluidas</button>
		</footer>
	</div>
</template>

<script>
	import Vue from 'vue'
	
	// Initialize Firebase
	let config = {
		apiKey: "AIzaSyDJ2OHlzIACPUeEwlKFLADL3lietjKCKjg",
		authDomain: "vuefire-54293.firebaseapp.com",
		databaseURL: "https://vuefire-54293.firebaseio.com",
		storageBucket: "vuefire-54293.appspot.com",
		messagingSenderId: "438822797624"
	};
	firebase.initializeApp(config)
	const db = firebase.database()
	
	export default{
		name: 'FireDo-list',
		data(){
			return {
				title: 'FireDo List',
				todos: [],
				newTodo: '',
				oldTodo: '',
				filter: 'all',
				editing: null,
				allDone: false
			}
		},
		created(){
			db.ref('todos').on('value', (snapshot) =>{
				this.todos = []
				let object = snapshot.val()
				let prop
				
				for(prop in object){
					this.todos.unshift({
						'.key': prop,
						name: object[prop].todo,
						completed: object[prop].completed
					})
				}
			})
		},
		methods: {
			addTodo(){
				//add firebase
				db.ref('todos').push({
					todo: this.newTodo,
					completed: false
				})
				
				this.newTodo = ''
			},
			removeTodo(todo){
				//remove firebase
				db.ref('todos/' + todo['.key']).remove()
			},
			removeCompleted(){
				//remove firebase
				this.todos.map(todo =>{
					if(todo.completed)
						db.ref('todos/' + todo['.key']).remove()
				})
			},
			editTodo(todo){
				this.editing = todo
				this.oldTodo = todo.name
			},
			editTodoDone(todo){
				//edit firebase
				db.ref('todos/' + todo['.key']).update({todo: todo.name})
				
				this.editing = null
			},
			editCancel(){
				this.editing.name = this.oldTodo
				this.editTodoDone()
			},
			toggleCompleted(todo){
				//edit firebase
				db.ref('todos/' + todo['.key']).update({completed: !todo.completed})
			}
		},
		computed: {
			hasTodo(){
				return this.todos.length
			},
			filteredTodos(){
				if(this.filter === 'todo')
					return this.todos.filter(todo => !todo.completed)
				else if(this.filter === 'done')
					return this.todos.filter(todo => todo.completed)
				
				return this.todos
			},
			pendentsTodo(){
				return this.todos.filter(todo => !todo.completed).length
			}
		},
		watch: {
			allDone(newVal, oldVal){
				this.todos.map(todo => db.ref('todos/' + todo['.key']).update({completed: newVal}))
			}
		},
		directives: {
			focus(el, val){
				if(val){
					Vue.nextTick(() =>{
						el.focus()
					})
				}
			}
		}
	}
</script>

<style src="./todos.scss" lang="sass"></style>
<style>
	footer::before{
		display: none;
	}
	
	button.destroy{
		cursor: pointer;
	}
	
	.toggle-all{
		top: -96px;
		cursor: pointer;
	}
</style>