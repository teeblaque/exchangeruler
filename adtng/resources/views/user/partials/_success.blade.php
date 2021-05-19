@if(Session::has('success'))
	<div class="alert alert-success" style="text-align: center;">
		<strong>Success: </strong>{{ Session::get('success') }}
	</div>
@endif
