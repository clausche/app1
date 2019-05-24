<?php

namespace App\Notifications;
use App\Message;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;

use Illuminate\Notifications\Notification;

class PruebaNotification extends Notification {
	use Queueable;
	protected $message;
	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct($message) {
		$this->message = $message;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable) {
		return ['database'];
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable) {
		return [
			'Suscription_ended' => Carbon::now(),
			'content'           => $this->message['body'],
			'destinatario'      => User::where('id', '=', $this->message['recipient_id'])->value('name')
		];
	}
}
