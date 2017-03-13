import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

/*
 Avoid lazy loading while in dev mode
 to benefit from HMR
 */
function load(name){
	if(process.env.NODE_ENV === 'development'){
		return require('components/' + name + '.vue')
	}
	else{
		return (resolve) =>{
			require('bundle?lazy!components/' + name + '.vue')(resolve)
		}
	}
}

export default new VueRouter({
	routes: [
		{
			name: 'app',
			path: '/',
			component: load('views/template'),
			children: [
				{
					name: 'app.home',
					path: '/',
					component: load('views/home')
				},
				{
					name: 'app.budget',
					path: '/budget',
					component: load('views/budget')
				},
				{
					name: 'app.about',
					path: '/about',
					component: load('views/about')
				},
				{
					name: 'app.news',
					path: '/news/:id',
					component: load('views/news-detail')
				}
			]
		},
		{
			path: '*',
			component: load('views/error404')
		}
	]
})
