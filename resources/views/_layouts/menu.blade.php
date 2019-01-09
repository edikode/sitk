
<div class="navbar-content">
	<div class="main-navigation navbar-collapse collapse">
		<div class="navigation-toggler">
			<i class="clip-chevron-left"></i>
			<i class="clip-chevron-right"></i>
		</div>
		<ul class="main-navigation-menu">
			@if (Auth::guest())

			<li class="{{ set_active('daftar') }}">
				<a href="{{ url('daftar') }}"><i class="icon-user"></i>
					<span class="title">Daftar</span>
					<span class="selected"></span>					
				</a>
			</li>
			<li class="{{ set_active('login') }}">
				<a href="{{ url('login') }}"><i class="icon-circle-arrow-right"></i>
					<span class="title">Login</span>
					<span class="selected"></span>					
				</a>
			</li>

			@else

			@if (Auth::user()->level == "pegawai") 

				<li class="{{ set_active('home') }}">
					<a href="{{ url('home') }}"><i class="icon-laptop"></i>
						<span class="title">Home</span>
						<span class="selected"></span>					
					</a>
				</li>
				<li class="{{ set_active(['riwayat-kerja', Request::is('riwayat-kerja/*')]) }}">
					<a href="{{ url('riwayat-kerja') }}"><i class="icon-laptop"></i>
						<span class="title">Riwayat Kerja</span>
						<span class="selected"></span>					
					</a>
				</li>
				<li class="{{ set_active(['pendidikan-terakhir', Request::is('pendidikan-terakhir/*')]) }}">
					<a href="{{ url('pendidikan-terakhir') }}"><i class="icon-laptop"></i>
						<span class="title">Pendidikan Terakhir</span>
						<span class="selected"></span>					
					</a>
				</li>
				
			@endif

			@if (Auth::user()->level == "admin") 

				<li class="{{ set_active('admin/home') }}">
					<a href="{{ url('admin/home') }}"><i class="icon-laptop"></i>
						<span class="title">Home</span>
						<span class="selected"></span>					
					</a>
				</li>
				<li class="{{ set_active(['admin/riwayat-kerja', Request::is('admin/riwayat-kerja/*')]) }}">
					<a href="{{ url('admin/riwayat-kerja') }}"><i class="icon-laptop"></i>
						<span class="title">Riwayat Kerja</span>
						<span class="selected"></span>					
					</a>
				</li>
				<li class="{{ set_active(['admin/pegawai', Request::is('admin/pegawai/*')]) }}">
					<a href="{{ url('admin/pegawai') }}"><i class="icon-laptop"></i>
						<span class="title">Data Pegawai</span>
						<span class="selected"></span>					
					</a>
				</li>
				<li class="{{ set_active(['admin/lokasi', Request::is('admin/lokasi/*')]) }}">
					<a href="{{ url('admin/lokasi') }}"><i class="icon-laptop"></i>
						<span class="title">Lokasi Kerja</span>
						<span class="selected"></span>					
					</a>
				</li>
				<li class="{{ set_active(['admin/jabatan', Request::is('admin/jabatan/*')]) }}">
					<a href="{{ url('admin/jabatan') }}"><i class="icon-laptop"></i>
						<span class="title">Jabatan</span>
						<span class="selected"></span>					
					</a>
				</li>
				

			@endif

			@if (Auth::user()->level == "superuser") 

				<li class="{{ set_active('superuser/home') }}">
					<a href="{{ url('superuser/home') }}"><i class="icon-laptop"></i>
						<span class="title">Home</span>
						<span class="selected"></span>					
					</a>
				</li>			
				
			@endif

			<li>
				<a href="{{ url('logout') }}">
					<i class="clip-exit"></i>
					<span class="title">Keluar</span>
					<span class="selected"></span>
				</a>
				{{-- <a href="{{ url('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					<i class="clip-exit"></i>
					<span class="title">Keluar</span>
					<span class="selected"></span>
				</a>

				<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form> --}}
			</li>
			
			@endif
		</ul>
	</div>
</div>
