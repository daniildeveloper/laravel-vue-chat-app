<template>
  <div class="chat-log">
    <chat-message v-for="message in messages" v-bind:message="message"></chat-message>
  </div>
</template>

<script>
export default {

  name: 'ChatLog',
  props: ['messages']
}
</script>

<style lang="css" scoped>
</style>