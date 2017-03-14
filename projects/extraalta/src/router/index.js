import Vue from 'vue'
import Router from 'vue-router'
import Hello from '../components/Hello'
import Profile from '../components/Profile'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'hello',
      component: Hello
    },
		{
			path: '/profile/:profileId',
			name: 'profile',
			component: Profile
		},
    {
      path: '*',
      redirect: '/'
    }
  ]
})
