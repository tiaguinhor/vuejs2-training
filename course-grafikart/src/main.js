// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueRource from 'vue-resource'
import App from './App.vue'

Vue.use(VueRource)
Vue.http.options.root = 'http://jsonplaceholder.typicode.com'
Vue.http.headers.common['Authorization'] = 'Basic YXBpOnBhc3N3b3Jk';
Vue.http.interceptors.push((request, next)  => {
	next((response) => {
		if(request.after)
			request.after.call(this, response)
	})
})

/* eslint-disable no-new */
new Vue({
	el: '#app',
	render: h => h(App)
})
