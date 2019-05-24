@extends('layouts.main')

@section('content')

<div class="col-xs-12 col-sm-12">
		<h2>
			Lista de posts
			<a href="{{ route('create_post_path') }}" class="btn btn-primary pull-right">Nuevo</a>
		</h2>
		<hr>
@include('partials.info')
	<table class="table table-striped table-hover">

		<thead>
					<tr>
					<th width="10">ID</th>
					<th>Post</th>
					<th>Description</th>
					<th>user</th>

					<th>Action</th>
					</tr>

		</thead>
		<tbody>
		@foreach ($posts as $post)

			<tr>
				<td>{!!$post->id!!}</td>
				<td>{{ $post->name }}</td>
				<td>{{ $post->description }}</td>
				<td>{{ $post->user->name }}</td>
				<td>
					{!! link_to_route('post_path', $name = 'Ver', $parameters = $post->id, $attributes = ['class'=>'btn btn-primary']) !!}</td>

				<td>
					{!! link_to_route('edit_post_path', $name = 'Editar', $parameters = $post->id, $attributes = ['class'=>'btn btn-info']) !!}</td>
				<td>
					{!!Form::open(['route'=>['delete_post_path', $post->id], 'method' => 'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
					{!!Form::close()!!}


				</td>

			</tr>
		@endforeach
		</tbody>
	</table>


{{ $posts->render() }}
</div>

{{-- <div class="col-xs-8 col-sm-4">
		@include('partials.aside')
</div> --}}


@endsection