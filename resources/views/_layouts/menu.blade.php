
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
				<li class="{{ set_active('riwayat-kerja') }}">
					<a href="{{ url('riwayat-kerja') }}"><i class="icon-laptop"></i>
						<span class="title">Riwayat Kerja</span>
						<span class="selected"></span>					
					</a>
				</li>
				<li class="{{ set_active('pendidikan-terakhir') }}">
					<a href="{{ url('pendidikan-terakhir') }}"><i class="icon-laptop"></i>
						<span class="title">Pendidikan Terakhir</span>
						<span class="selected"></span>					
					</a>
				</li>
				<li class="{{ set_active('tunjangan') }}">
					<a href="{{ url('tunjangan') }}"><i class="icon-laptop"></i>
						<span class="title">Tunjangan</span>
						<span class="selected"></span>					
					</a>
				</li>

				<li>
					<a href="{{ url('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="clip-exit"></i>
						<span class="title">Keluar</span>
						<span class="selected"></span>
					</a>

					<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>

			@endif

			@if (Auth::user()->level == "admin") 

			@endif

			@if (Auth::user()->level == "superuser") 

				<li class="{{ set_active('admin/home') }}">
					<a href="{{ url('admin/home') }}"><i class="icon-laptop"></i>
						<span class="title">Home</span>
						<span class="selected"></span>					
					</a>
				</li>			
				<li class="{{ set_active(['admin/setting', Request::is('admin/setting/*'),'admin/profil', Request::is('admin/profil/*')]) }}">
					<a href="javascript:void(0)"><i class="clip-settings"></i>
						<span class="title">Tampilan</span><i class="icon-arrow"></i>
						<span class="selected"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ set_active(['admin/profil', Request::is('admin/profil/*')]) }}">
							<a href="{{ url('admin/profil') }}"><span class='title'>Profil</span></a>
						</li>
						<li class="{{ set_active(['admin/setting', Request::is('admin/setting/*')]) }}">
							<a href="{{ url('admin/setting') }}"><span class='title'>Setting Aplikasi</span></a>
						</li>
					</ul>
				</li>
				<li class="{{ set_active(['admin/kategori', Request::is('admin/kategori/*'),'admin/paket', Request::is('admin/paket/*')]) }}">
					<a href="javascript:void(0)"><i class="clip-stack"></i>
						<span class="title">Paket</span><i class="icon-arrow"></i>
						<span class="selected"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ set_active(['admin/paket', Request::is('admin/paket/*')]) }}">
							<a href="{{ url('admin/paket') }}"><span class='title'>Paket</span></a>
						</li>
						<li class="{{ set_active(['admin/kategori', Request::is('admin/kategori/*')]) }}">
							<a href="{{ url('admin/kategori') }}"><span class='title'>Kategori Paket</span></a>
						</li>
					</ul>
				</li>
				<li class="{{ set_active(['admin/pemesanan', Request::is('admin/pemesanan/*')]) }}">
					<a href="{{ url('/admin/pemesanan') }}"><i class="clip-stack"></i>
						<span class="title">Data Pemesanan</span>
						<span class="selected"></span>
					</a>
				</li>
				<li class="{{ set_active(['admin/konfirmasi', Request::is('admin/konfirmasi/*')]) }}">
					<a href="{{ url('/admin/konfirmasi') }}"><i class="clip-stack-2"></i>
						<span class="title">Konfirmasi</span>
						<span class="selected"></span>
					</a>
				</li>
				<li class="{{ set_active(['admin/laporan-pemesanan', Request::is('admin/laporan-pemesanan/*')]) }}">
					<a href="javascript:void(0)"><i class="clip-book"></i>
						<span class="title">Laporan</span><i class="icon-arrow"></i>
						<span class="selected"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ set_active(['admin/laporan-pemesanan', Request::is('admin/laporan-pemesanan/*')]) }}">
							<a href="{{ url('admin/laporan-pemesanan') }}"><span class='title'>Laporan Pemesanan</span></a>
						</li>
					</ul>
				</li>
				<li class="{{ set_active(['admin/review', Request::is('admin/review/*')]) }}">
					<a href="{{ url('admin/review') }}"><i class="clip-stack"></i>
						<span class="title">Review</span>
						<span class="selected"></span>
					</a>
				</li>
				<li class="{{ set_active(['admin/pelapak', Request::is('admin/pelapak/*')]) }}">
					<a href="{{ url('/admin/pelapak') }}"><i class="clip-users"></i>
						<span class="title">Pelapak</span>
						<span class="selected"></span>
					</a>				
				</li>
				<li class="{{ set_active(['admin/pelanggan', Request::is('admin/pelanggan/*')]) }}">
					<a href="{{ url('/admin/pelanggan') }}"><i class="clip-users"></i>
						<span class="title">Pelanggan</span>
						<span class="selected"></span>
					</a>				
				</li>
				<li class="{{ set_active(['admin/data-admin', Request::is('admin/data-admin/*')]) }}">
					<a href="{{ url('/admin/data-admin') }}"><i class="clip-users"></i>
						<span class="title">Admin Aplikasi</span>
						<span class="selected"></span>
					</a>				
				</li>
				
			@endif
			
			@endif
		</ul>
	</div>
</div>
