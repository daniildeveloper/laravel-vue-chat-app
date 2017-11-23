# Laravel chat application

## Eloquent

1. Models binding

Binded messages to User

messages model
```php
class Message extends Model
{
    protected $fillable = ['message'];
    public function user() {
      return $this->belongsTo(User::class);
    }
}
```

user model
```php
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
```

get all messages with user info:
```php
Route::get('messages', function () {
    return App\Message::with('user')->get();
});
```

store message with user info
```php
$user = Auth::user();

$message = request()->get('message');

$user->messages()->create([
  'message' => $message
]);
```
