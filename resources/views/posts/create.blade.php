@extends('layouts.main')

@section('content')
		<div class="col-xs-12 col-sm-8">
				<h2>
					Nuevo Post
					<a href="{{ route('posts_path') }}" class="btn btn-default pull-right">Regresar</a>
				</h2>
				<hr>
				@include('partials.errors')
				{!! Form::open(['route' => 'store_post_path']) !!}

					@include('partials.form')

				{!! Form::close() !!}
			</div>
			<div class="col-xs-12 col-sm-4">
				@include('partials.aside')
		</div>
@endsection