@extends('_layouts.template')

@section('title', 'Status Kerja Saat Ini')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('main')
			
<div class="row">
	<div class="col-sm-12 col-md-12">
		<br><br>
		<table class="table table-condensed table-hover">
			<tbody>
				<tr>
					<td width="20%">Nomor SK</td>
					<td>{{$data->nomor_sk}}</td>
				</tr>
				<tr>
					<td>Tanggal SK</td>
					<td>{{tgl_id($data->tanggal_sk)}}</td>
				</tr>
				<tr>
					<td>Jabatan</td>
					<td>{{$data->jabatan}}</td>
				</tr>
				<tr>
					<td>Mulai</td>
					<td>{{tgl_id($data->tanggal_mulai)}}</td>
				</tr>
				<tr>
					<td>Selesai</td>
					<td>{{tgl_id($data->tanggal_selesai)}}</td>
				</tr>
				<tr>
					<td>Satuan Kerja</td>
					<td>{{$data->satuan_kerja}}</td>
				</tr>
				<tr>
					<td>Lokasi</td>
					<td>{{$data->lokasi}}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>{{$data->status}}</td>
				</tr>
				<tr>
					<td>File</td>
					<td>@if($data->file == "") Tidak Ada @else<a href="{{asset('upload/riwayat/'.$data->file)}}" target="_blank">Lihat</a>@endif</td>
				</tr>
			</tbody>
		</table>
	</div>		
</div>

@endsection