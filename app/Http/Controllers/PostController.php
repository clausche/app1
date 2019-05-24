<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Tag;
use App\User;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Post $post) {
		$posts    = $post->orderBy('id', 'desc')->paginate(3);
		$muestras = \Auth::user()->unreadNotifications()->count();
		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$tags     = Tag::pluck('name', 'id');
		$muestras = \Auth::user()->unreadNotifications()->count();
		return view('posts.create', compact('tags'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreatePostRequest $request) {

		// $post = \Auth::user()->posts()->create($request->all());

		$post              = new Post;
		$post->name        = $request->name;
		$post->description = $request->description;
		$post->user_id     = $request->user()->id;
		$post->save();
		// $tagId = $request->input('tag_list');
		$this->syncTags($post, $request->input('tag_list'));
		// $post->tags()->attach($request->input('tag_list'));
		session()->flash('message', 'Post creado');
		return redirect()->route('posts_path');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$post     = Post::find($id);
		$muestras = \Auth::user()->unreadNotifications()->count();
		return view('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$tags     = Tag::pluck('name', 'id');//cest la list, cest claire quoi!
		$post     = Post::find($id);
		$muestras = \Auth::user()->unreadNotifications()->count();
		//accion negada si no es el usuario
		if ($post->user_id != \Auth::user()->id) {
			session()->flash('message', 'accion negada');
			return redirect()->route('posts_path');
		}
		return view('posts.edit', compact('post', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Post $post, UpdatePostRequest $request) {
		// $post = Post::find($post);
		// dd($post);
		$post->name        = $request->name;
		$post->description = $request->description;
		// $post->user_id     = $request->user()->id;
		$post->save();
		// $tagId = $request->input('tag_list');
		$this->syncTags($post, $request->input('tag_list'));
		session()->flash('message', 'Post actualizado');
		return redirect()->route('posts_path');

	}

	/*sync up the list of tags in the database*/
	private function syncTags(Post $post, array $tags) {
		$post->tags()->sync($tags);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$post = Post::find($id);

		if ($post->user_id != Auth()->user()->id) {
			session()->flash('message', 'accion negada');
			return redirect()->route('posts_path');

		};

		$post->delete();
		session()->flash('message', 'Post eliminado');
		return redirect()->route('posts_path');
	}
}
