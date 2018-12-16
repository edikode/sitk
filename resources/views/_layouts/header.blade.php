<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				<span class="clip-menu-3"></span>
			</button>
			<a class="navbar-brand" href="{{url('admin')}}">
				<img src="{{ asset('admins/images/sitk-small.png')}}">
			</a>
		</div>
		<div class="navbar-tools">
			<ul class="nav navbar-right">						

				@if (Auth::guest())
				{{-- <li class="dropdown" style="margin-top: 8px;">
					<a href="{{url('login')}}">
						<i class="clip-user"></i>
						&nbsp;Login
					</a>
				</li>	 --}}
				@else
				<li class="dropdown current-user">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<img src="{{asset('upload/foto/kecil/'.Auth::user()->gambar)}}" class="circle-img" alt="" width="30">
						<span class="username">{{ Auth::user()->name }}</span>
						<i class="clip-chevron-down"></i>
					</a>
					<ul class="dropdown-menu">
						
						<?php
						if (Auth::user()->level == "superuser") {
							$link = "superuser/logout";

						} else if (Auth::user()->level == "admin") {
							$link = "admin/logout";

						} else {
							$link = "logout";
						}
						?>
						<li>
							<a href="{{ url($link) }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="clip-exit"></i>
								&nbsp;Log Out
                            </a>

                            <form id="logout-form" action="{{ url($link) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
						</li>
					</ul>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>