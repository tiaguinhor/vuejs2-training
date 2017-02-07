import Vue from 'vue'
import VueFire from 'vuefire'

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css'

import App from './App'

Vue.use(VueFire)
Vue.use(VueMaterial)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  render: h => h(App)
})
