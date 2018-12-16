@extends('_layouts.template')

@section('title', 'Masukkan Pendidikan Terakhir')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('button')
	<a class="btn btn-large btn-red item" href="{{ url('tunjangan') }}">Kembali</a>
@endsection

@section('main')
			
	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('tunjangan/'.$data->id) }}" method="post" enctype="multipart/form-data">			<div class="row">
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
								<div class='form-group @if($errors->has('status')) has-error @endif'>
									<label class='control-label'>Status Hubungan dlm Keluarga</label>
									<select name="status" id="status" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="Istri" @if($data->status == "Istri") selected @endif> Istri</option>
										<option value="Anak ke 1" @if($data->status == "Anak ke 1") selected @endif> Anak ke 1</option>
										<option value="Anak ke 2" @if($data->status == "Anak ke 2") selected @endif> Anak ke 2</option>
										<option value="Anak ke 3" @if($data->status == "Anak ke 3") selected @endif> Anak ke 3</option>
									</select>

									@if ($errors->has('status'))
										<span for="status" class="help-block">{{ $errors->first('status') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('tanggal_lahir')) has-error @endif'>
									<label class='control-label'>Tanggal Lahir</label>
									<div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_lahir" value="@if(count($errors) > 0){{old('tanggal_lahir')}}@else{{tgl_id($data->tanggal_lahir)}}@endif" required>
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div>
								</div>
								<div class='form-group'>
									<label class='control-label'>Alamat</label>
									<textarea class='form-control limited' id='alamat' cols='10' rows='4' name='alamat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat')}}@else{{$data->alamat}}@endif</textarea>
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