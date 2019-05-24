@extends('layouts.main')

@section('content')

<div class="col-xs-12 col-sm-8">
		<h2>
			<strong> {{ $post->name }} </strong>
			<a href="{{ route('posts_path') }}" class="btn btn-default pull-right">Regresar</a>
		</h2>
		<hr>
		<p>{{ $post->slug }}</p>
		<p>{{ $post->description }}</p>

		<a href="{{ route('edit_post_path', $post->id) }}" class="btn btn-primary">
			Editar
		</a>
	</div>
	@unless ($post->tags->isEmpty())

	<div class="form-group">
			<label class="cols-xm-2 ">Mis Tags</label>
			@foreach ($post->tags as $tag)

			<div class="cols-xm-2">
				<div class="">
					<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true">

						{{ $tag->name }}
					</i></span>

				</div>
			</div>
			@endforeach
	</div>
	@endunless

	</div>
	{{-- <div class="col-xs-12 col-sm-4">
		@include('partials.aside')
</div> --}}


@endsection