import Vue from 'vue'
import Router from 'vue-router'
import App from './App.vue'
import A from './components/ComponentA.vue'
import B from './components/ComponentB.vue'

Vue.use(Router)

const routes = [
  {
    path: '/a',
    component: A
  },
  {
    path: '/b',
    component: B
  }
]

const router = new Router({routes})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
