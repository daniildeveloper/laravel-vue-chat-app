<template>
  <div class="chat-composer">
    <input type="text" placeholder="Start typing your message ..." v-model="messageText" v-on:keyup.enter="sendMessage">
    <button class="btn btn-primary" @click="sendMessage">Send</button>
  </div>
</template>

<script>
export default {

  name: 'ChatComposer',

  data () {
    return {
      messageText: ''
    }
  },

  methods: {
    sendMessage() {
      console.log(this.messageText);

      // allow to listen for events
      this.$emit('messagesent', {
        message: this.messageText,
        user: 'John Doe'
      });

      this.messageText = '';
    }
  }
}
</script>

<style lang="css" scoped>
.chat-composer{
  display: flex;
}
.chat-composer input{
  flex: 1 auto;
}
.chat-composer button {
  border-radius: 0;
}
</style>