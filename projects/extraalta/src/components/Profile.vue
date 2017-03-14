<template>
  <div>
    <h2>Profile {{$route.params.profileId}}</h2>
    <h3>Profile {{params.profileId}}</h3>
  </div>
</template>

<script>
export default {
  name: 'Profile',
  data () {
    return {
			params: {}
    }
  },
	mounted(){
		this.params = this.$root.$route.params
	}
}
</script>

<style></style>
