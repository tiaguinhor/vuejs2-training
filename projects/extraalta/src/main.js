import Vue from 'vue'
import App from './App'
import router from './router'
import _ from 'lodash'

//use bus in all components that use call between the children
import bus from './utils/events/bus'

//it's call in all routes
router.afterEach((to, from) => {
	bus.$emit('closeLeftSidenav')
	bus.$emit('closeLeftSidenav')
  console.log('closed sidebars')
})

// material design
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css'
Vue.use(VueMaterial)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
