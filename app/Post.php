<?php

namespace App;

use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model {
	use Notifiable;

	protected $fillable = [
		'name', 'description'
	];

	public function user() {
		return $this->belongsTo(User::class );
	}

	public function tags() {
		return $this->belongsToMany(Tag::class );
	}

	// 	****************************************************************************
	// *          // get a list of tag ids associated to the current post         *
	// *                             	//return a array                            *
	// ****************************************************************************

	public function getTagListAttribute() {
		return $this->tags->pluck('id')->all();
	}
}
