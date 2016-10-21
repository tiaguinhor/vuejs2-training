import Vue from 'vue'
import store from './LightboxStore'

Vue.directive('lightbox', {
	bind(el, binding){
		let group = (binding.value === undefined) ? 'default' : 'rio'
		let href = el.getAttribute('href')

		store.addImage(href, group)

		el.addEventListener('click', (e) =>{
			e.preventDefault()
			store.open(href, group)
		})
	},
	unbinding(el, binding){
		let group = (binding.value === undefined) ? 'default' : 'rio'

		store.remove(el.getAttribute('href'))
	}
})