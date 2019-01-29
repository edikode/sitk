@extends('_layouts.login')

@section('main')
<div class="main-login col-sm-4 col-sm-offset-4">
        <div class="logo"><img src="{{asset('admins/images/sitk.png')}}">
        </div>

        <div class="box-login">
            <h3>Login Aplikasi</h3>  
            <p>Silahkan isi Username & Password anda.</p>
            <form class="form-login" action="{{ route('login.submit') }}" method="post">
                {{ csrf_field() }}

                @include('_errors/pesan_error') 
                
                <fieldset>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="text" class="form-control" name="nip" placeholder="NIP" value="{{ old('nip') }}" required autofocus>
                            <i class="icon-user"></i> 
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="password" class="form-control password" name="password" placeholder="Password">
                            <i class="icon-lock"></i>
                        </span>
                    </div>
                    <div class="form-actions"> 
                        <a href="{{url('daftar')}}" class="btn btn-warning pull-left">Registrasi <i class="icon-user"></i></a>
                        <button name="submit" type="submit" class="btn btn-bricky pull-right">
                            Login <i class="icon-circle-arrow-right"></i>
                        </button>
                    </div>                      
                </fieldset>
            </form>
        </div>
        
        <div class="copyright">
            &copy; Aplikasi Kepegawaian
        </div>

    </div>
@endsection

