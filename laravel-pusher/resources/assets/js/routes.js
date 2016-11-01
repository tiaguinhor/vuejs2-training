import CcChatbox from './components/Chatbox.vue'
import CcAddRoom from './components/rooms/AddRoom.vue'
import CcAllRooms from './components/rooms/AllRooms.vue'
import CcMyRooms from './components/rooms/MyRooms.vue'

module.exports = {
	// mode: 'history',
	base: __dirname,
	routes: [
		{
			path: '/chat',
			name: 'chat',
			component: CcChatbox
		},
		{
			path: '/addRoom',
			name: 'addRoom',
			component: CcAddRoom
		},
		{
			path: '/allRooms',
			name: 'allRooms',
			component: CcAllRooms
		},
		{
			path: '/myRooms',
			name: 'myRooms',
			component: CcMyRooms
		}
	]
}