@extends('layouts.app')

@section('title')
Chatroom
@endsection

@section('content')
  <h1>Chat room</h1>
  <div id="app" class="container">
    <chat-log :messages="messages"></chat-log>
    <chat-composer v-on:messagesent="addMessage" ></chat-composer>
  </div>
@endsection