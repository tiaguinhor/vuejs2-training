<template>
  <main class="phone-viewport">
    <cc-header></cc-header>
    
    <md-layout md-gutter>
      <router-view></router-view>
    </md-layout>
  </main>
</template>

<script>
  import CcHeader from './components/menu/Header'
  
	export default {
		name: 'Main',
		components: {
			CcHeader
    },
		data (){
			return {
			}
		}
	}
</script>

<style src="assets/sass/style.scss" lang="scss"></style>
