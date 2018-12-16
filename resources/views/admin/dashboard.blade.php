@extends('_layouts.template')

@section('title', 'Haii... Admin')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('main')
			
	<style>
		.icon {
		    display: inherit;
		    font-size: 30px;
		    padding: 5px;
		    color: #024e3f;
		}
	</style>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-external-link-square"></i>
					Info Hari Ini
					<div class="panel-tools">
						<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
						</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<a href="#" class="btn btn-icon btn-block" style="padding: 20px;">
								<i class="clip-calendar icon"></i>
								Konfirmasi Hari Ini <span class="badge badge-warning"> Tidak Ada </span>
							</a>
						</div>
						<div class="col-sm-6">
							<a href="#" class="btn btn-icon btn-block" style="padding: 20px;">
								<i class="clip-busy icon"></i>
								Pelanggan <br/>Belum Konfirmasi <span class="badge badge-warning"> Tidak Ada </span>
							</a>
						</div>
						<div class="col-sm-6">
							<a href="#" class="btn btn-icon btn-block" style="padding: 20px;">
								<i class="clip-banknote icon"></i>
								Pendaftaran Pelapak <span class="badge badge-warning"> Tidak Ada </span>
							</a>
						</div>
						<div class="col-sm-6">
							<a href="{{url('admin/referral')}}" class="btn btn-icon btn-block" style="padding: 20px;">
								<i class="clip-refresh icon"></i>
								Review Pelanggan <span class="badge badge-warning"> Tidak Ada </span>
							</a>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>

@endsection