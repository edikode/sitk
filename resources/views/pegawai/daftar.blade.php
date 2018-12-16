@extends('_layouts.template')

@section('title', 'Pendaftaran Data Pegawai Baru')

@section('bread')
<li class="active"><i class="icon-laptop"></i> Home</li>
@endsection

@section('main')
            
<div class="row">
	<div class="col-sm-12">				
		<div class="panel panel-default">
			<div class="panel-body">	
				<form action="{{ url('daftar') }}" method="post" enctype="multipart/form-data">				
					<div class="row">
						<div class="col-md-12">
							@include('_errors/pesan_error')								
						</div>
						<div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class='form-group @if($errors->has('nip')) has-error @endif'>
                                        <label class='control-label'>NIP</label>
                                        <input type='text' placeholder='NIP' class='form-control limited' id='nip' name='nip' maxlength='16' value='@if(count($errors) > 0){{old('nip')}}@endif' required>

                                        @if ($errors->has('nip'))
                                            <span for="nip" class="help-block">{{ $errors->first('nip') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class='form-group @if($errors->has('nama')) has-error @endif'>
                                        <label class='control-label'>Nama</label>
                                        <input type='text' placeholder='Nama' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@endif'
                                        required>

                                        @if ($errors->has('nama'))
                                            <span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class='form-group @if($errors->has('tempat_lahir')) has-error @endif'>
                                        <label class='control-label'>Tempat Lahir</label>
                                        <input type='text' placeholder='Tempat Lahir' class='form-control limited' id='tempat_lahir' name='tempat_lahir' maxlength='100' value='@if(count($errors) > 0){{old('tempat_lahir')}}@endif'
                                        required>

                                        @if ($errors->has('tempat_lahir'))
                                            <span for="tempat_lahir" class="help-block">{{ $errors->first('tempat_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class='form-group @if($errors->has('tanggal_lahir')) has-error @endif'>
                                        <label class='control-label'>Tanggal Lahir</label>
                                        <input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" name="tanggal_lahir" value='@if(count($errors) > 0){{old('tanggal_lahir')}}@endif'
                                        required autocomplete="off">

                                        @if ($errors->has('tanggal_lahir'))
                                            <span for="tanggal_lahir" class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class='form-group @if($errors->has('jenis_kelamin')) has-error @endif'>
                                        <label class='control-label'>Jenis Kelamin</label> <br>
                                        <label class='radio-inline'>
                                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" class="square-green" @if(count($errors) > 0 && old('jenis_kelamin') == "L") checked @endif> Laki-Laki
                                        </label>
                                        <label class='radio-inline'>
                                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" class="square-green" @if(count($errors) > 0 && old('jenis_kelamin') == "P") checked @endif> Perempuan
                                        </label>

                                        @if ($errors->has('jenis_kelamin'))
                                            <span for="jenis_kelamin" class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class='form-group @if($errors->has('tempat_lahir')) has-error @endif'>
                                        <label class='control-label'>Agama</label>
                                        <select name="agama" id="agama" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Islam" @if(count($errors) > 0 && old('agama') == "Islam") selected @endif>Islam</option>
                                            <option value="Non Islam" @if(count($errors) > 0 && old('agama') == "Non Islam") selected @endif>Non Islam</option>
                                        </select>

                                        @if ($errors->has('tempat_lahir'))
                                            <span for="tempat_lahir" class="help-block">{{ $errors->first('tempat_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class='form-group @if($errors->has('gol_darah')) has-error @endif'>
                                        <label class='control-label'>Gol Darah</label>
                                        <select name="gol_darah" id="gol_darah" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="A" @if(count($errors) > 0 && old('gol_darah') == "A") selected @endif>A</option>
                                            <option value="B" @if(count($errors) > 0 && old('gol_darah') == "B") selected @endif>B</option>
                                            <option value="B" @if(count($errors) > 0 && old('gol_darah') == "AB") selected @endif>AB</option>
                                            <option value="O" @if(count($errors) > 0 && old('gol_darah') == "O") selected @endif>O</option>
                                            <option value="Lainnya" @if(count($errors) > 0 && old('gol_darah') == "Lainnya") selected @endif>Lainnya</option>
                                        </select>

                                        @if ($errors->has('gol_darah'))
                                            <span for="gol_darah" class="help-block">{{ $errors->first('gol_darah') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   
                                </div>
                            </div>
                            <div class='form-group @if($errors->has('alamat')) has-error @endif'>
                                <label class='control-label'>Alamat</label>
                               <textarea name="alamat" id="alamat" class="form-control">@if(count($errors) > 0){{old('alamat')}}@endif</textarea>

                                @if ($errors->has('alamat'))
                                    <span for="alamat" class="help-block">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class='form-group @if($errors->has('email')) has-error @endif'>
                                        <label class='control-label'>Email</label>
                                        <input type='text' placeholder='Email' class='form-control limited' id='email' name='email' maxlength='45' value='@if(count($errors) > 0){{old('email')}}@endif'
                                        required>

                                        @if ($errors->has('email'))
                                            <span for="email" class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class='form-group @if($errors->has('telepon')) has-error @endif'>
                                        <label class='control-label'>Telepon</label>
                                        <input type='text' placeholder='Telepon' class='form-control limited' id='telepon' name='telepon' maxlength='15' value='@if(count($errors) > 0){{old('telepon')}}@endif'
                                        required>

                                        @if ($errors->has('telepon'))
                                            <span for="telepon" class="help-block">{{ $errors->first('telepon') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
							<div class='form-group @if($errors->has('password')) has-error @endif'>
								<label class='control-label'>Password</label>
								<input type='password' placeholder='Password' class='form-control' id='password' name='password' value='@if(count($errors) > 0){{old('password')}}@endif'
								required>

								@if ($errors->has('password'))
									<span for="password" class="help-block">{{ $errors->first('password') }}</span>
								@endif
                            </div>
                            <div class='form-group @if($errors->has('konfirmasipassword')) has-error @endif'>
								<label class='control-label'>Ulangi Password</label>
								<input type='password' placeholder='Ulangi Password' class='form-control' id='konfirmasipassword' name='konfirmasipassword' value='@if(count($errors) > 0){{old('konfirmasipassword')}}@endif'
								required>

								@if ($errors->has('konfirmasipassword'))
									<span for="konfirmasipassword" class="help-block">{{ $errors->first('konfirmasipassword') }}</span>
								@endif
							</div>
						</div>
						<div class="col-md-4">
							
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							{{ csrf_field() }}
							<input name="simpan" value="Simpan" type="submit" class="btn btn-green fright">
						</div>
					</div>							
				</form>
			</div>
		</div>				
	</div>		
</div>

@endsection