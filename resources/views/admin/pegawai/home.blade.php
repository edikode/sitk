@extends('_layouts.template')

@section('title', 'Data Pegawai')

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
							<h4>Data Pegawai</h4>
						</div>
						<div class="col-md-4">
							{{-- <a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a> --}}
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no">No</th>
								<th>NIP</th>
								<th>Nama</th>
								<th>TTL</th>
								<th>JK</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Tanggal Masuk</th>
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
									<td>{{$d->nip}}</td>
									<td>{{$d->nama}}</td>
									<td>{{$d->tempat_lahir}}, {{tgl_id($d->tanggal_lahir)}}</td>
									<td>{{$d->jenis_kelamin}}</td>
									<td>{{$d->alamat}}</td>
									<td>{{$d->telepon}}</td>
									<td>{{tgl_id($d->created_at)}}</td>

									<td>
										<a data-original-title='Detail' class='btn btn-sm btn-info tooltips' href='{{ url('admin/riwayat-kerja/pegawai/'. $d->id )}}'>
											<i class='clip-eye'></i>
										</a>
										
										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('admin/pegawai/'. $d->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('admin/pegawai', $d->id)}}" method="post" style="display: inline-block;">
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

	<div class="modal fade modal-crud" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="{{url('admin/pegawai')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Pegawai</h4>
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
						<div class='form-group @if($errors->has('unit_kerja')) has-error @endif'>
							<label class='control-label'>Unit Kerja</label>
							<input type='text' placeholder='Unit Kerja' class='form-control limited' id='unit_kerja' name='unit_kerja' maxlength='100' value='@if(count($errors) > 0){{old('unit_kerja')}}@endif'
							required>

							@if ($errors->has('unit_kerja'))
								<span for="unit_kerja" class="help-block">{{ $errors->first('unit_kerja') }}</span>
							@endif
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