<template>
  <div class="chat-log">
    <chat-message v-for="message in messages" v-bind:message="message"></chat-message>
    <div class="empty" v-show="messages.length === 0">
      Nothing here yet
    </div>
  </div>
</template>

<script>
export default {

  name: 'ChatLog',
  props: ['messages']
}
</script>

<style lang="css" scoped>
.chat-log .chat-message:nth-child(even) {
  background: #ccc;
}

.empty {
  padding: 1rem;
  text-align: center;
}
</style>