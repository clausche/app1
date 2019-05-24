@extends('layouts.main')

@section('content')

		<div class="col-xs-12 col-sm-8">
				<h2>
					Editar producto
					<a href="{{ route('posts_path') }}" class="btn btn-default pull-right">Regresar</a>
				</h2>
				<hr>
				@include('partials.errors')
				{!! Form::model($post, ['route' => ['update_post_path', $post->id], 'method' => 'PUT']) !!}

					@include('partials.form')

				{!! Form::close() !!}
			</div>
			<div class="col-xs-12 col-sm-4">
				@include('partials.aside')
		</div>




@endsection