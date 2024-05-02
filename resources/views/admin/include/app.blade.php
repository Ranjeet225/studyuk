
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>  Admin Dashboard </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/material.css')}}">
    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    @yield('style')
  </head>
  <body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
      @include('admin.include.header')
      @include('admin.include.sidebar')
      <!-- Page Wrapper -->
      <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid" >
          {{-- @include('admin.include.pageheader') --}}
          @yield('main-content')
        </div>
        <!-- /Page Content -->
      </div>
    <div class="settings-icon">
      <span data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas"><i class="las la-cog"></i></span>
    </div>
      <!-- /Page Wrapper -->
      <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="sidebar-headerset">
          <div class="sidebar-headersets">
            <h2>Customizer</h2>
            <h3>Customize your overview Page layout</h3>
          </div>
          <div class="sidebar-headerclose">
            <a data-bs-dismiss="offcanvas" aria-label="Close"><img src="{{asset('assets/img/close.png')}}" alt="Close Icon"></a>
          </div>
        </div>
        <div class="offcanvas-body p-0">
          <div data-simplebar="" class="h-100">
            <div class="settings-mains">
              <div class="layout-head">
                <h5>Layout</h5>
                <h6>Choose your layout</h6>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-check card-radio p-0">
                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
                    <label class="form-check-label avatar-md w-100" for="customizer-layout01">
                      <img src="{{asset('assets/img/vertical.png')}}" alt="Layout Image">
                    </label>
                  </div>
                  <h5 class="fs-13 text-center mt-2">Vertical</h5>
                </div>
                <div class="col-6">
                  <div class="form-check card-radio p-0">
                  <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
                    <label class="form-check-label  avatar-md w-100" for="customizer-layout02">
                      <img src="{{asset('assets/img/horizontal.png')}}" alt="Layout Image">
                    </label>
                  </div>
                  <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                </div>

                </div>
            </div>
          </div>

        </div>
      </div>
    <!-- jQuery -->
    @yield('page-script')
    @yield('scripts')
    {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <!-- Chart JS -->
    {{-- <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script> --}}
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/chart.js')}}"></script> --}}
    <script src="{{asset('assets/js/greedynav.js')}}"></script>
    <!-- Theme Settings JS -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <script src="{{asset('assets/js/theme-settings.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script type="">
      $(document).ready(function(){
        $('#mobile_btn').click(function(){
          $('#sidebar').toggleClass('sidebarNew');
          // alert('lll')
        })
        $('.sidebar-overlay').click(function(){
          $('#sidebar').removeClass('sidebarNew');
        });

      })
    </script>

{{-- <script>
    $('select').selectpicker();
</script> --}}
  </body>
</html>
