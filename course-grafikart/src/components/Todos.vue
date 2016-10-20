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
						<input v-bind="{id: todo.name}" type="checkbox" v-model="todo.completed" class="toggle">
						<label v-bind="{for: todo.name}" @dblclick="editTodo(todo)">{{todo.name}}</label>
						<button class="destroy" @click.prevent="removeTodo(todo)"></button>
					</div>
					
					<input type="text" class="edit"
					       v-model="todo.name"
					       v-focus="todo === editing"
					       @keyup.enter="editTodoDone()"
					       @keyup.esc="editCancel()"
					       @blur="editTodoDone()">
				</li>
			</ul>
		</div>
		
		<footer class="footer" v-if="hasTodo">
			<span class="todo-count"><strong>{{remaining}}</strong> tarefa pendente</span>
			
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
			
			<button class="clear-completed" v-if="hasDoneTodo" @click="removeCompleted()">Limpar concluidas</button>
		</footer>
	</div>
</template>

<script>
	import Vue from 'vue'
	
	export default{
		name: 'ToDo-list',
		props: {
			value: {type: Array, default: []}
		},
		data(){
			return {
				title: 'ToDo List',
				todos: this.value,
				newTodo: '',
				oldTodo: '',
				filter: 'all',
				editing: null
			}
		},
		methods: {
			addTodo(){
				this.todos.push({name: this.newTodo, completed: false})
				this.newTodo = ''
			},
			removeTodo(todo){
				this.todos = this.todos.filter(el => el !== todo)
				this.$emit('input', this.todos)
			},
			removeCompleted(){
				this.todos = this.todos.filter(todo => !todo.completed)
				this.$emit('input', this.todos)
			},
			editTodo(todo){
				this.editing = todo
				this.oldTodo = todo.name
			},
			editTodoDone(){
				this.editing = null
			},
			editCancel(){
				this.editing.name = this.oldTodo
				this.editTodoDone()
			}
		},
		computed: {
			allDone: {
				get(){
					return this.remaining === 0
				},
				set(value){
					this.todos.forEach(todo => todo.completed = value)
				}
			},
			hasTodo(){
				return this.todos.length
			},
			hasDoneTodo(){
				return this.todos.filter(todo => todo.completed).length
			},
			remaining(){
				return this.todos.filter(todo => !todo.completed).length
			},
			filteredTodos(){
				if(this.filter === 'todo')
					return this.todos.filter(todo => !todo.completed)
				else if(this.filter === 'done')
					return this.todos.filter(todo => todo.completed)
				
				return this.todos
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

<style src="../assets/css/todos.css"></style>
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