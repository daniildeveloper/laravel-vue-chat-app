<?php
use App\Events\PostedMessage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/chat', function () {
        return view('chat');
    })->name('chat');

    Route::get('messages', function () {
        return App\Message::with('user')->get();
    });

    Route::post('messages', function () {
        // store new message
        $user = Auth::user();

        $message = $user->messages()->create([
          'message' => request()->get('message')
        ]);

        // anounce new message posted
        broadcast(new PostedMessage($message, $user))->toOthers();

        return ['status' => 200];
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Broadcast::channel('chatroom', function($user) {
  return $user;
});