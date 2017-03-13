import Vue from 'vue'
import VueResource from 'vue-resource'
import Quasar from 'quasar'
import router from './router'

Quasar.theme.set(__THEME)
Vue.use(Quasar) // Install Quasar Framework

Vue.use(VueResource)

Vue.http.options.root = 'http://www.altacomunicazione.com.br/wp-json/wp/v2'
Vue.http.headers.common['Authorization'] = 'Basic YXBpOnBhc3N3b3Jk'
//interpreta json como post no backend(php)
Vue.http.options.emulateJSON = true
// Vue.http.options.emulateHTTP = true
// Vue.http.options.credentials = true
// Vue.http.headers.common['Access-Control-Allow-Origin'] = '*'
// Vue.http.headers.common['Access-Control-Request-Method'] = '*'
// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value')

Vue.http.interceptors.push((request, next) =>{
	next((response) =>{
		if(request.after)
			request.after.call(this, response)
	})
})

Quasar.start(() =>{
	/* eslint-disable no-new */
	new Vue({
		el: '#quasar-app',
		router,
		render: h => h(require('./App.vue'))
	})
})
