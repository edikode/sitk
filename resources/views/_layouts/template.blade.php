<!DOCTYPE html>
<html lang="en" class="no-js">  
<head>
  <title>Aplikasi Pegawai - @yield('title')</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta content="CMS Admin" name="description" />
  <meta content="CMS Admin" name="author" />
  
  <link rel="shortcut icon" href="{{ asset('admins/images/admin.png') }}" />
  <link rel="stylesheet" href="{{ asset('admins/plugins/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admins/plugins/bootstrap/css/bootstrap.min.css') }}"  media="screen">
  <link rel="stylesheet" href="{{ asset('admins/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('admins/css/main-responsive.css') }}">
  <link rel="stylesheet" href="{{ asset('admins/plugins/iCheck/skins/all.css') }}">
  <link rel="stylesheet" href="{{ asset('admins/fonts/style.css') }}">
  <!-- UNTUK FORM -->
  <link rel="stylesheet" href="{{ asset('admins/plugins/jQuery-Tags-Input/jquery.tagsinput.css') }}">
  <link rel="stylesheet" href="{{ asset('admins/plugins/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('admins/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css') }}"> 
  <!-- UNTUK TABEL DATA -->   
  <link rel="stylesheet" href="{{ asset('admins/plugins/DataTables/media/css/DT_bootstrap.css') }}" />
  {{-- untuk upload gambar banyak --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('admins/css/dropzone.css') }}">
  {{-- social button untuk profil --}}
  <link rel="stylesheet" href="{{ asset('admins/plugins/bootstrap-social-buttons/social-buttons-3.css') }}">

  <link href="{{ asset('admins/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('admins/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

  <link rel="stylesheet" href="{{ asset('admins/css/skin.css') }}" id="skin_color">

  <style>
      .date-picker {
        z-index: 3000 !important; /* has to be larger than 1050 */
      }
  </style>

</head>

<body>
  @include('_layouts/header')
  <div class="main-container">
    @include('_layouts/menu')
    <div class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              @yield('bread')
            </ol>
            <div class="page-header clearfix">
              <div class="row">
                <div class="col-sm-6"><h1>@yield('title')</h1></div>            
                <div class="col-sm-6">
                  @yield('button') 
                </div>            
              </div>  
            </div>        
          </div>
        </div>
          @yield('main')     
      </div>
    </div>
  </div>
  @include('_layouts/footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  {{-- <script src="{{ asset('admins/js/jquery.min.js') }}"></script> --}}

  <script src="{{ asset('admins/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- UNTUK FORM -->
  <script src="{{ asset('admins/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js') }}"></script>
  <script src="{{ asset('admins/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
  {{-- input radio --}}
  <script src="{{ asset('admins/plugins/iCheck/jquery.icheck.min.js') }}"></script>
  <script src="{{ asset('admins/plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('admins/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('admins/plugins/jQuery-Tags-Input/jquery.tagsinput.js') }}"></script>
  {{-- untuk ckeditor textarea --}}
  {{-- <script src="{{ asset('admins/functions/ckeditor/ckeditor.js') }}"></script> --}}

  <script src="{{ asset('admins/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>

  <!-- untuk Modal --> 
  <script src="{{ asset('admins/plugins/bootstrap-modal/js/bootstrap-modal.js') }}"></script>
  <script src="{{ asset('admins/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}"></script>
  <script src="{{ asset('admins/js/ui-modals.js') }}"></script>

  <!-- untuk data table -->   
  <script type="text/javascript" src="{{ asset('admins/plugins/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admins/plugins/DataTables/media/js/DT_bootstrap.js') }}"></script>
  <script src="{{ asset('admins/js/table-data.js') }}"></script>

  <script src="{{ asset('admins/js/form-elements.js') }}"></script>
  <script src="{{ asset('admins/js/main.js') }}"></script>

  <script>
    jQuery(document).ready(function() {
      Main.init();
      // UIModals.init();
      TableData.init();
      FormElements.init();
    });
  </script>

  <script type="text/javascript">
    function konfirmasiHapus() {
			if(confirm("Apakah anda ingin menghapus data ini ?"))
				return true;
			else
				return false;
		}
  </script>
</body>
  
</html>
