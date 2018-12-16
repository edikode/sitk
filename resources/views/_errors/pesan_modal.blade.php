@if(count($errors) > 0)
	<div class='successHandler alert alert-danger display'>
		@foreach($errors->all() as $error)
		<i class='glyphicon glyphicon-remove'></i> {{ $error }} <br>
		@endforeach
	</div>
@endif