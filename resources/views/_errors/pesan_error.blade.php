@if(count($errors) > 0)
	<div class='successHandler alert alert-danger display'>
		<i class='glyphicon glyphicon-remove'></i> Terjadi Kesalahan pada inputan
	</div>
@elseif(Session::has('pesan_sukses'))
	<div class='successHandler alert alert-success display'>
		<i class='icon-ok'></i> {{ Session::get('pesan_sukses')}}
	</div>
@endif