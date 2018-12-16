@extends('_layouts.template')

@section('title', 'Data Riwayat Jabatan')

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
							<h4>Data Riwayat Jabatan</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
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
							{{-- @foreach ($data as $d)
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
										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('riwayat/'. $d->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('riwayat', $d->id)}}" method="post" style="display: inline-block;">
											{{ csrf_field() }}	
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" data-original-title='Hapus' class="btn btn-red btn-sm tooltips" onclick='return konfirmasiHapus()'><i class="clip-remove"></i></button>
										</form>
									</td>
								</tr>
							@endforeach --}}

						</tbody>
					</table>
				</div>
				
			</div>
		</div>		
	</div>

	<div class="modal fade modal-crud" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="{{url('riwayat')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Riwayat Jabatan</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('nama')) has-error @endif'>
							<label class='control-label'>Nama</label>
							<input type='text' placeholder='Nama' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@endif'
							required>

							@if ($errors->has('nama'))
								<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('status')) has-error @endif'>
							<label class='control-label'>Status Hubungan dlm Keluarga</label>
							<select name="status" id="status" class="form-control" required>
								<option value="">--- Pilih ---</option>
								<option value="Istri" @if(count($errors) > 0) @if($errors->first('status') == "Istri") selected @endif @endif>Istri</option>
								<option value="Anak ke 1" @if(count($errors) > 0) @if($errors->first('status') == "Anak ke 1") selected @endif @endif>Anak ke 1</option>
								<option value="Anak ke 2" @if(count($errors) > 0) @if($errors->first('status') == "Anak ke 2") selected @endif @endif>Anak ke 2</option>
								<option value="Anak ke 3" @if(count($errors) > 0) @if($errors->first('status') == "Anak ke 3") selected @endif @endif>Anak ke 3</option>
							</select>

							@if ($errors->has('status'))
								<span for="status" class="help-block">{{ $errors->first('status') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('tanggal_lahir')) has-error @endif'>
							<label class='control-label'>Tanggal Lahir</label>
							<div class="input-group">
								<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_lahir" value="@if(count($errors) > 0){{old('tanggal_lahir')}}@endif" required>
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div>
						</div>
						<div class='form-group'>
							<label class='control-label'>Alamat</label>
							<textarea class='form-control limited' id='alamat' cols='10' rows='4' name='alamat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat')}}@endif</textarea>
						</div>				
					</div>
				</div>
			</div>
			<div class="modal-footer">				
				<input name="simpan" value="Simpan" type="submit" class="btn btn-green">
			</div>
		</form>
	</div>

@endsection