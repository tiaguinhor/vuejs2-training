import Vuex from 'vuex'

const state = {
	todos: [{
		name: 'CiaMuller',
		completed: true
	}]
}

const getters = {
	todos: state => state.todos,
	completedTodos: state => state.todos.filter(todo => todo.completed),
	remainingTodos: state => state.todos.filter(todo => !todo.completed),
	completedTodosCount: state => getters.completedTodos(state).length,
	remainingTodosCount: state => getters.remainingTodos(state).length
}

const mutations = {
	ADD_TODO: (state, name) =>{
		state.todos.push({
			name,
			completed: false
		})
	},
	EDIT_TODO: (state, todo) =>{
		let index = state.todos.indexOf(todo)
		state.todos[index] = todo
	},
	DELETE_TODO: (state, todo) =>{
		state.todos = state.todos.filter(i => i !== todo)
	},
	DELETE_TODO_COMPLETED: (state) =>{
		state.todos.map(todo =>{
			if(todo.completed){
				let index = state.todos.indexOf(todo)
				state.todos.splice(index, 1)
			}
		})
	},
	TOGGLE_COMPLETED: (state, todo) =>{
		let index = state.todos.indexOf(todo)
		state.todos[index].completed = !todo.completed
	},
	ALL_DONE: (state, value) =>{
		state.todos.map(todo => todo.completed = value)
	}
}

const actions = {
	addTodo: (store, name) =>{
		store.commit('ADD_TODO', name)
	},
	editTodo: (store, todo) =>{
		store.commit('EDIT_TODO', todo)
	},
	deleteTodo: (store, todo) =>{
		store.commit('DELETE_TODO', todo)
	},
	deleteTodoCompleted: (store) =>{
		store.commit('DELETE_TODO_COMPLETED')
	},
	toggleCompleted: (store, todo) =>{
		store.commit('TOGGLE_COMPLETED', todo)
	},
	allDone: (store, value) =>{
		store.commit('ALL_DONE', value)
	}
}

let store = new Vuex.Store({
	state,
	mutations,
	getters,
	actions,
	strict: true
})

global.store = store
export default store