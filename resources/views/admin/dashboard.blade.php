@extends('_layouts.template')

@section('title', 'Haii... Admin')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('main')
    <div class="row">
		<div class="col-sm-12">	
			@include('_errors/pesan_error')				
			<div class="clear panel panel-default">						
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8">
							<h4>Pegawai baru mendaftar ke sistem</h4>
						</div>
						<div class="col-md-4">
							{{-- <a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a> --}}
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width">
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
							@foreach ($pegawai as $d)
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
										<a class="btn btn-sm btn-info" href="{{url('admin/home/konfirmasi/'.$d->id)}}"><i class="clip-plus-circle"></i> Konfirmasi</a>
										
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
@endsection