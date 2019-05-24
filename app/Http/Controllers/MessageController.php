<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateMessageRequest;
use App\Message;
use App\Notifications\PruebaNotification;
use App\User;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;

class MessageController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$muestras = '';
		$users    = User::where('id', '!=', Auth()->user()->id)->get();//es distinto a mi

		$muestras = Auth::user()->unreadNotifications()->count();
		$sinleers = Auth::user()->unreadNotifications->where('type', '==', 'App\Notifications\PruebaNotification');

		//return $sinleers->markAsRead();
		$notis = auth()->user()->notifications;
		$pns   = $notis->where('type', '==', 'App\Notifications\PruebaNotification');

		// dd($notis);

		return view('notifications.message', compact('users', 'notis', 'pns', 'sinleers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateMessageRequest $request) {
		// return $request->all();

		Message::create([
				'sender_id'    => auth()->id(),
				'recipient_id' => $request->recipient_id,
				'body'         => $request->body

			]);
		// Auth::user()->notify(new PruebaNotification);
		$message = Message::orderBy('id', 'desc')->first();
		Auth::user()->notify(new PruebaNotification($message));
		// dd(User::where('id', '=', $message['recipient_id'])->value('name'));
		flashy()->success('Tu mensaje fue enviado.');
		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
	public function readAll(User $user) {
		// $user->unreadNotifications->map(function ($n) {
		// 		$n->markAsRead();
		// 	});
		// return back();
		$sinleers = Auth::user()->unreadNotifications->where('type', '==', 'App\Notifications\PruebaNotification');
		$sinleers->markAsRead();
		flashy()->info('Mensajes leidos.');
		return back();
	}
}
