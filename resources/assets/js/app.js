
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#app',
    data: {
      messages: [
      ],
      usersInRoom: [],
    },
    methods: {
      addMessage(message) {
        // add to existing messages and store in database
        this.messages.push(message);
        axios.post('/messages', message).then(response => {});

      }
    },
    created() {
      axios.get('/messages').then(response => {
        this.messages = response.data;
      });

      Echo.join('chatroom')
        .here(users => {
          this.usersInRoom = users;
        })
        .joining(user => {
          this.usersInRoom.push(user);
        })
        .leaving(user => {
          // remove leaved user from array
          this.usersInRoom = this.usersInRoom.filter(u => u != user)
        })
        .listen('PostedMessage', (event) => {
          // handle event
          this.messages.push({
            message: e.message.message,
            user: e.user
          })
        });

      Echo.private('chatroom')
      .listen('PostedMessage', e => {
        console.log(e)
      })
    }
});
