@extends('_layouts.template')

@section('title', 'Ubah Riwayat Kerja')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('button')
	<a class="btn btn-large btn-red item" href="{{ url('admin/riwayat-kerja/pegawai/'.$data->pegawai_id) }}">Kembali</a>
@endsection

@section('main')
			
	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('admin/riwayat-kerja/pegawai/'.$data->id) }}" method="post" enctype="multipart/form-data">			
						<div class="row">
							<div class="col-md-12">
								@include('_errors/pesan_error')	
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nomor_sk')) has-error @endif'>
									<label class='control-label'>Nomor SK</label>
									<input type='text' placeholder='Nomor SK' class='form-control limited' id='nomor_sk' name='nomor_sk' maxlength='100' value='@if(count($errors) > 0){{old('nomor_sk')}}@else{{$data->nomor_sk}}@endif'
									required>

									@if ($errors->has('nomor_sk'))
										<span for="nomor_sk" class="help-block">{{ $errors->first('nomor_sk') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('tanggal_sk')) has-error @endif'>
									<label class='control-label'>Tanggal SK</label>
									<div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_sk" value="@if(count($errors) > 0){{old('tanggal_sk')}}@else{{tgl_id($data->tanggal_sk)}}@endif" required>
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div>
								</div>	
								<div class='form-group @if($errors->has('tanggal_mulai')) has-error @endif'>
									<label class='control-label'>Tanggal Mulai</label>
									<div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_mulai" value="@if(count($errors) > 0){{old('tanggal_mulai')}}@else{{tgl_id($data->tanggal_mulai)}}@endif" required>
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div>
								</div>	
								<div class='form-group @if($errors->has('tanggal_selesai')) has-error @endif'>
									<label class='control-label'>Tanggal Selesai</label>
									<div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_selesai" value="@if(count($errors) > 0){{old('tanggal_selesai')}}@else{{tgl_id($data->tanggal_selesai)}}@endif" required>
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div>
								</div>	
								<div class='form-group @if($errors->has('satuan_kerja')) has-error @endif'>
									<label class='control-label'>Satuan Kerja</label>
									<input type='text' placeholder='Satuan Kerja' class='form-control limited' id='satuan_kerja' name='satuan_kerja' maxlength='100' value='@if(count($errors) > 0){{old('satuan_kerja')}}@else{{$data->satuan_kerja}}@endif'
									required>

									@if ($errors->has('satuan_kerja'))
										<span for="satuan_kerja" class="help-block">{{ $errors->first('satuan_kerja') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('jabatan')) has-error @endif'>
									<label class='control-label'>Jabatan</label>
									<select name="jabatan" id="jabatan" class="form-control" required>
										<option value="">--- Pilih ---</option>
										@foreach ($jabatan as $j)
											<option value="{{$j->id}}" @if($data->jabatan_id == $j->id) selected @endif>{{$j->nama}}</option>
										@endforeach
									</select>

									@if ($errors->has('jabatan'))
										<span for="jabatan" class="help-block">{{ $errors->first('jabatan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('lokasi')) has-error @endif'>
									<label class='control-label'>Lokasi</label>
									<select name="lokasi" id="lokasi" class="form-control" required>
										<option value="">--- Pilih ---</option>
										@foreach ($lokasi as $l)
											<option value="{{$l->id}}" @if($data->lokasi_kerja_id == $l->id) selected @endif>{{$l->nama}}</option>
										@endforeach
									</select>

									@if ($errors->has('lokasi'))
										<span for="lokasi" class="help-block">{{ $errors->first('lokasi') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('status')) has-error @endif'>
									<label class='control-label'>Status</label>
									<select name="status" id="status" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="aktif" @if($data->status == "aktif") selected @endif>Aktif</option>
										<option value="pindah" @if($data->status == "pindah") selected @endif>Pindah</option>
									</select>

									@if ($errors->has('status'))
										<span for="status" class="help-block">{{ $errors->first('status') }}</span>
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