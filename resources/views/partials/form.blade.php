<div class="form-group">
	{!! Form::label('name', 'Nombre del post') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Description del post') !!}
	{!! Form::textarea('description', null, ['rows=3','class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('tag_list', 'Los tags') !!}
	{!! Form::select('tag_list[]',$tags, null, ['id'=>'tag_list','class' => 'form-control','multiple']) !!}
</div>
<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>

@section('footer')
	<script>
		$('#tag_list').select2({
			placeholder:'Choose a tag'
		});
	</script>

@endsection
