import Vue from 'vue'

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css'
Vue.use(VueMaterial)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import App from './App'
import Categories from './components/Categories.vue'
import Products from './components/Products.vue'

const routes = [
  {path: '/categories', component: Categories},
  {path: '/products', component: Products}
]

const router = new VueRouter({
  routes
})

/* eslint-disable no-new */
new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
