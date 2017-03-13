import Vue from 'vue'

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css'
Vue.use(VueMaterial)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import App from './App'
import Profile from './components/Profile.vue'
import Categories from './components/Categories.vue'
import Products from './components/Products.vue'

const routes = [
	{path: '/profile/:profileId', component: Profile, name: 'profile'},
	{path: '/logout', component: Categories, name: 'logout'},
	{path: '/categories', component: Categories, name: 'categories'},
	{path: '/products', component: Products, name: 'products'},
	{path: '*', redirect: '/categories'}
]

const router = new VueRouter({
	mode: 'history',
	routes
})

/* eslint-disable no-new */
new Vue({
	router,
	render: h => h(App)
}).$mount('#app')
