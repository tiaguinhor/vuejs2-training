<template>
  <div id="app">
    <cc-header></cc-header>
    <img src="./assets/logo.png">
  </div>
</template>

<script>
import CcHeader from './components/root/header.vue'

export default {
  name: 'app',
  components: {
    CcHeader
  }
}
</script>

<style src="assets/sass/style.scss" lang="sass"></style>
