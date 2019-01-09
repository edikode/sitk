@extends('_layouts.template')

@section('title', 'Edit Data Jabatan')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('button')
	<a class="btn btn-large btn-red item" href="{{ url('admin/jabatan') }}">Kembali</a>
@endsection

@section('main')
			
	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('admin/jabatan/'.$data->id) }}" method="post" enctype="multipart/form-data">			
						<div class="row">
							<div class="col-md-12">
								@include('_errors/pesan_error')	
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Nama</label>
									<input type='text' placeholder='Nama' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@else{{$data->nama}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('unit_kerja')) has-error @endif'>
									<label class='control-label'>Unit Kerja</label>
									<input type='text' placeholder='Unit Kerja' class='form-control limited' id='unit_kerja' name='unit_kerja' maxlength='100' value='@if(count($errors) > 0){{old('unit_kerja')}}@else{{$data->unit_kerja}}@endif'
									required>

									@if ($errors->has('unit_kerja'))
										<span for="unit_kerja" class="help-block">{{ $errors->first('unit_kerja') }}</span>
									@endif
								</div>	
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PUT">
								<input name="simpan" value="Simpan" type="submit" class="btn btn-green fright">
							</div>
						</div>							
					</form>
				</div>
			</div>				
		</div>		
	</div>

@endsection