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
			<span class="todo-count"><strong>{{remainingTodosCount}}</strong> tarefa pendente</span>
			
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
			
			<button class="clear-completed" v-if="completedTodosCount" @click="removeCompleted()">Limpar concluidas</button>
		</footer>
	</div>
</template>

<script>
	import Vue from 'vue'
	import store from './Store'
	import {mapActions, mapGetters} from 'vuex'
	
	export default{
		store,
		name: 'ToDo-list',
		data(){
			return {
				title: 'ToDo List',
				newTodo: '',
				oldTodo: '',
				filter: 'all',
				editing: null
			}
		},
		methods: {
			...mapActions({
				addTodoStore: 'addTodo',
				editTodoStore: 'editTodo',
				deleteTodoStore: 'deleteTodo',
				deleteTodoCompletedStore: 'deleteTodoCompleted',
				toggleCompletedStore: 'toggleCompleted',
				allDoneStore: 'allDone'
			}),
			addTodo(){
				this.addTodoStore(this.newTodo)
				this.newTodo = ''
			},
			removeTodo(todo){
				this.deleteTodoStore(todo)
				this.$emit('input', this.todos)
			},
			removeCompleted(){
				this.deleteTodoCompletedStore()
				this.$emit('input', this.todos)
			},
			editTodo(todo){
				this.editing = todo
				this.oldTodo = todo.name
			},
			editTodoDone(todo){
				this.editTodoStore(todo)
				this.editing = null
			},
			editCancel(){
				this.editing.name = this.oldTodo
				this.editTodoDone()
			},
			toggleCompleted(todo){
				this.toggleCompletedStore(todo)
			}
		},
		computed: {
			...mapGetters([
				'todos',
				'completedTodos',
				'remainingTodos',
				'completedTodosCount',
				'remainingTodosCount'
			]),
			allDone: {
				get(){
					return this.remaining === 0
				},
				set(value){
					this.allDoneStore(value)
				}
			},
			hasTodo(){
				return this.todos.length
			},
			filteredTodos(){
				if(this.filter === 'todo')
					return this.remainingTodos
				else if(this.filter === 'done')
					return this.completedTodos
				
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