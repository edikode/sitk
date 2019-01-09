@extends('_layouts.template')

@section('title', 'Detail Riwayat Kerja')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('button')
	
@endsection

@section('main')
			
	<div class="row">
		<div class="col-sm-12">	
			@include('_errors/pesan_error')				
			<div class="clear panel panel-default">						
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8">
							<h4>Detail Riwayat Kerja : {{$pegawai->nama}}, NIP : {{$pegawai->nip}}</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-red item" href="{{ url('admin/pegawai') }}">Kembali</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no">No</th>
								<th>Nomor SK</th>
								<th>Tanggal SK</th>
								<th>Jabatan</th>
								<th>Mulai</th>
								<th>Selesai</th>
								<th>Satuan Kerja</th>			
								<th>Lokasi</th>			
								<th>Status</th>			
								<th class="pilihan">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($data as $d)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$d->nomor_sk}}</td>
									<td>{{tgl_id($d->tanggal_sk)}}</td>
									<td>{{$d->jabatan}}</td>
									<td>{{tgl_id($d->tanggal_mulai)}}</td>
									<td>{{tgl_id($d->tanggal_selesai)}}</td>
									<td>{{$d->satuan_kerja}}</td>
									<td>{{$d->lokasi}}</td>
									<td>{{$d->status}}</td>

									<td>
										
										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('admin/riwayat-kerja/pegawai/'. $d->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('admin/riwayat-kerja/pegawai', $d->id)}}" method="post" style="display: inline-block;">
											{{ csrf_field() }}	
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" data-original-title='Hapus' class="btn btn-red btn-sm tooltips" onclick='return konfirmasiHapus()'><i class="clip-remove"></i></button>
										</form>
									</td>
								</tr>
							@endforeach

						</tbody>
					</table>
				</div>
				
			</div>
		</div>		
	</div>

	{{-- <div class="modal fade modal-crud" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="{{url('admin/riwayat-kerja')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Riwayat Jabatan</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('nomor_sk')) has-error @endif'>
							<label class='control-label'>Nomor SK</label>
							<input type='text' placeholder='Nomor SK' class='form-control limited' id='nomor_sk' name='nomor_sk' maxlength='100' value='@if(count($errors) > 0){{old('nomor_sk')}}@endif'
							required>

							@if ($errors->has('nomor_sk'))
								<span for="nomor_sk" class="help-block">{{ $errors->first('nomor_sk') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('tanggal_sk')) has-error @endif'>
							<label class='control-label'>Tanggal SK</label>
							<div class="input-group">
								<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_sk" value="@if(count($errors) > 0){{old('tanggal_sk')}}@endif" required>
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div>
						</div>	
						<div class='form-group @if($errors->has('tanggal_mulai')) has-error @endif'>
							<label class='control-label'>Tanggal Mulai</label>
							<div class="input-group">
								<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_mulai" value="@if(count($errors) > 0){{old('tanggal_mulai')}}@endif" required>
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div>
						</div>	
						<div class='form-group @if($errors->has('tanggal_selesai')) has-error @endif'>
							<label class='control-label'>Tanggal Selesai</label>
							<div class="input-group">
								<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_selesai" value="@if(count($errors) > 0){{old('tanggal_selesai')}}@endif" required>
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div>
						</div>	
						<div class='form-group @if($errors->has('satuan_kerja')) has-error @endif'>
							<label class='control-label'>Satuan Kerja</label>
							<input type='text' placeholder='Satuan Kerja' class='form-control limited' id='satuan_kerja' name='satuan_kerja' maxlength='100' value='@if(count($errors) > 0){{old('satuan_kerja')}}@endif'
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
									<option value="{{$j->id}}" @if(count($errors) > 0) @if($errors->first('jabatan') == $j->id) selected @endif @endif>{{$j->nama}}</option>
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
									<option value="{{$l->id}}" @if(count($errors) > 0) @if($errors->first('lokasi') == $l->id) selected @endif @endif>{{$l->nama}}</option>
								@endforeach
							</select>

							@if ($errors->has('lokasi'))
								<span for="lokasi" class="help-block">{{ $errors->first('lokasi') }}</span>
							@endif
						</div>				
					</div>
				</div>
			</div>
			<div class="modal-footer">				
				<input name="simpan" value="Simpan" type="submit" class="btn btn-green">
			</div>
		</form>
	</div> --}}

@endsection