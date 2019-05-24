<?php

namespace App\Http\Requests;

class UpdatePostRequest extends CreatePostRequest {

	public function authorize() {
		return $this->user()->id == $this->post->user_id;
	}

}
