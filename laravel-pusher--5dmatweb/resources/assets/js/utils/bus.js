import Vue from 'vue'
const bus = new Vue()
export default bus

// usage
// bus.$emit('newMessage', response.data)
// bus.$on('newMessage', data => this.messages.push(data))