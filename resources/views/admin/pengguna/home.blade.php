@extends('_layouts.template')

@section('title', 'Data Pengguna')

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
							<h4>Data Pengguna</h4>
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
								<th>Nama Pegawai</th>
								<th>Username / NIP</th>
								<th>Level</th>
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
									<td>{{$d->nama_pegawai}}</td>
									<td>{{$d->username}}</td>
									<td>{{$d->level}}</td>

									<td>
										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href="#"  data-target="#edit{{$d->id}}" data-toggle="modal">
											<i class='clip-pencil'></i>
										</a>
										
										{{-- <form action="{{url('admin/pengguna', $d->id)}}" method="post" style="display: inline-block;">
											{{ csrf_field() }}	
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" data-original-title='Hapus' class="btn btn-red btn-sm tooltips" onclick='return konfirmasiHapus()'><i class="clip-remove"></i></button>
										</form> --}}
									</td>
								</tr>

								<div class="modal fade modal" id="edit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
									<form action="{{url('admin/pengguna/'.$d->id)}}" method="post" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="PUT">

										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Tambah Pengguna</h4>
										</div>		
										<div class="modal-body">
											<div class="row">
												<div class="col-md-12">
													<div class='form-group @if($errors->has('pegawai_id')) has-error @endif'>
														<label class='control-label'>Pegawai</label>
														<select name="pegawai_id" id="pegawai_id" class="form-control" required disabled>
															<option value="">-- Pilih --</option>
															@foreach ($pegawai as $p)
																<option value="{{$p->id}}" @if($d->pegawai_id == $p->id) selected @endif>{{$p->nama}}</option>
															@endforeach
														</select>

														@if ($errors->has('pegawai_id'))
															<span for="pegawai_id" class="help-block">{{ $errors->first('pegawai_id') }}</span>
														@endif
													</div>
													<div class='form-group @if($errors->has('level')) has-error @endif'>
														<label class='control-label'>Level</label>
														<select name="level" id="level" class="form-control" required>
															<option value="">-- Pilih --</option>
															<option value="admin" @if($d->level == "admin") selected @endif>Admin</option>
															<option value="pegawai" @if($d->level == "pegawai") selected @endif>Pegawai</option>
														</select>

														@if ($errors->has('level'))
															<span for="level" class="help-block">{{ $errors->first('level') }}</span>
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

							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>		
	</div>

	<div class="modal fade modal-crud" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="{{url('admin/pengguna')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Pengguna</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('pegawai_id')) has-error @endif'>
							<label class='control-label'>Pegawai</label>
							<select name="pegawai_id" id="pegawai_id" class="form-control" required>
								<option value="">-- Pilih --</option>
								@foreach ($pegawai as $p)
									@php if(CekData($p->id)){ continue; } @endphp

									<option value="{{$p->id}}" @if(old('pegawai_id') == $p->id) selected @endif>{{$p->nama}}</option>
								@endforeach
							</select>

							@if ($errors->has('pegawai_id'))
								<span for="pegawai_id" class="help-block">{{ $errors->first('pegawai_id') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('level')) has-error @endif'>
							<label class='control-label'>Level</label>
							<select name="level" id="level" class="form-control" required>
								<option value="">-- Pilih --</option>
								<option value="admin">Admin</option>
							</select>

							@if ($errors->has('level'))
								<span for="level" class="help-block">{{ $errors->first('level') }}</span>
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