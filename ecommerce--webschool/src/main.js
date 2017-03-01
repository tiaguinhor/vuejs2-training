import Vue from 'vue'
import App from './App'

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css'
Vue.use(VueMaterial)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  render: h => h(App)
})
