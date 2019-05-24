@if(Session::has('message'))
	<div id="MESSAGE" style="display: none;" class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
		<strong>{{ Session::get('message') }}</strong>

	</div>
@endif
