<template>
  <div>
    <h1>Ola Amiguinhos</h1>
    <cc-intro></cc-intro>
  </div>
</template>

<script>
import CcIntro from './Intro'

export default {
  components: {
    CcIntro
  }
}
</script>

<style scoped>
  h1{
    font-size: 50px;
    font-weight: bolder;
    color: red;
  }
</style>
