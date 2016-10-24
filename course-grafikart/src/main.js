// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueRource from 'vue-resource'
import VueRouter from 'vue-router'
import Vuex from 'vuex'

Vue.use(Vuex)

Vue.use(VueRource)
Vue.http.options.root = 'http://jsonplaceholder.typicode.com'
Vue.http.headers.common['Authorization'] = 'Basic YXBpOnBhc3N3b3Jk';
Vue.http.interceptors.push((request, next)  => {
	next((response) => {
		if(request.after)
			request.after.call(this, response)
	})
})

Vue.use(VueRouter)
const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			name: 'root',
			path: '/',
			component: require('./components/vue-router/PageB.vue')
		},
		{
			name: 'transition',
			path: '/transition',
			component: require('./components/AnimationTransition.vue')
		},
		{
			name: 'users',
			path: '/users',
			component: require('./components/VueResource.vue')
		},
		{
			//only number
			name: 'pages',
			path: '/user/:id(\\d+)',
			components: {
				default: require('./components/vue-router/PageA.vue'),
				sidebar: require('./components/vue-router/PageB.vue')
			}
		},
		{
			name: 'a',
			path: '/page',
			component: resolve => require(['./components/vue-router/PageA.vue'], resolve),
			// beforeEnter(route, redirect, next){
			// 	let confirm = window.confirm('Test confirm window')
			//
			// 	if(confirm)
			// 		next()
			// 	else
			// 		redirect('/')
			// },
			children: [
				{
					name: 'a.b',
					path: '/b',
					component: require('./components/vue-router/PageB.vue')
				},
				{
					name: 'a.c',
					path: '/c',
					component: require('./components/vue-router/PageC.vue')
				}
			]
		},
		{
			path: '*',
			redirect: '/'
		}
	]
})

/* eslint-disable no-new */
new Vue({
	el: '#app',
	router,
	render: h => h(require('./App.vue'))
})
