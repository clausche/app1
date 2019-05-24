@if(count($errors))
		<div id="ERROR_COPY" style="display:none;" class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				<span>&times;</span>
			</button>
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
@endif
