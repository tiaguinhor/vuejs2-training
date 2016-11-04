import Vue from 'vue'
import App from './App.vue'

new Vue({
  el: '#app',
  // render(createElement) {
  //   // return createElement(App)
  //   return createElement('div', {
  //     attrs: {
  //       id: "titi"
  //     },
  //     // domProps: {
  //     //   innerHTML: "Hello World"
  //     // }
  //   }, [
  //     createElement('h1', 'Hello from h1'),
  //     createElement('p', 'Hello from paragraph')
  //   ])
  // }
  render(h) {
    return(
      <div>
        <h1>Hello from JSX</h1>
      </div>
    )
  }
})
