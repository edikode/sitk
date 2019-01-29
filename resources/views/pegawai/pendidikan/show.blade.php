@extends('_layouts.template')

@section('title', 'Pendidikan Terakhir')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('button')
	<a class="btn btn-large btn-red item" href="{{ url('pendidikan-terakhir/'.$data->id.'/edit') }}">Ubah Data Pendidikan</a>
@endsection

@section('main')
			
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Pendidikan Terakhir</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="40%">Nama Kampus</td>
						<td>{{$data->nama}}</td>
					</tr>
					<tr>
						<td>Kota</td>
						<td>{{$data->kota}}</td>
					</tr>
					<tr>
						<td>Tahun Lulus</td>
						<td>{{tgl_id($data->tahun_lulus)}}</td>
					</tr>
					<tr>
						<td>File</td>
						<td><a href="{{asset('upload/pendidikan/'.$data->file)}}" target="_blank">Lihat</a></td>
					</tr>
				</tbody>
			</table>
		</div>		
	</div>

@endsection