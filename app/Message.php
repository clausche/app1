<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model {
	use Notifiable;
	protected $fillable = [
		'sender_id', 'recipient_id', 'body'
	];

	protected $guarded = ['id'];

	public function user() {
		$this->belongsTo(User::class );
	}
}
