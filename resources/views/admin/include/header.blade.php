      <!-- Header -->
      <div class="header">
        <!-- Logo -->
        <div class="header-left">
          <a href="{{url('/')}}" class="logo">
            <img src="{{asset('assets/img/loo.png')}}" width="40%"  alt="Logo">
          </a>
          <a href="{{url('/')}}" class="logo2">
            <img src="{{asset('assets/img/loo.png')}}" width="40%"  alt="Logo">
          </a>
        </div>
        <!-- /Logo -->
        <a id="toggle_btn" href="javascript:void(0);">
          <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </a>
        <!-- Header Title -->
        <div class="page-title-box">
           <h3> Overseas Education Lane</h3>
          <!-- <img src="assets/img/Untitled-3.png"/> -->
        </div>
        <!-- /Header Title -->
        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
          <i class="fa-solid fa-bars"></i>
        </a>
        <!-- Header Menu -->
        <ul class="nav user-menu">
          <!-- Search -->
          <li class="nav-item">
            <div class="top-nav-search">
              <a href="javascript:void(0);" class="responsive-search">
                <i class="fa-solid fa-magnifying-glass"></i>
              </a>
            <!--   <form action="#">
                <input class="form-control" type="text" placeholder="Search here">
                <button class="btn" type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form> -->
            </div>
          </li>
          <!-- /Search -->
          <!-- Flag -->
          <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
              <img src="{{asset('assets/img/flags/us.png')}}" alt="Flag" height="20">
              <span>English</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="javascript:void(0);" class="dropdown-item">
                <img src="{{asset('assets/img/flags/us.png')}}" alt="Flag" height="16"> English </a>
              <a href="javascript:void(0);" class="dropdown-item">
                <img src="{{asset('assets/img/flags/fr.png')}}" alt="Flag" height="16"> French </a>
              <a href="javascript:void(0);" class="dropdown-item">
                <img src="{{asset('assets/img/flags/es.png')}}" alt="Flag" height="16"> Spanish </a>
              <a href="javascript:void(0);" class="dropdown-item">
                <img src="{{asset('assets/img/flags/de.png')}}" alt="Flag" height="16"> German </a>
            </div>
          </li>
          <!-- /Flag -->
          <!-- Notifications -->
          <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
              <i class="fa-regular fa-bell"></i>
              <span class="badge rounded-pill">3</span>
            </a>
            <div class="dropdown-menu notifications">
              <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications</span>
                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
              </div>

              <div class="topnav-dropdown-footer">
                <a href="#">View all Notifications</a>
              </div>
            </div>
          </li>
          <!-- /Notifications -->
          <!-- Message Notifications -->

          <!-- /Message Notifications -->
         
        </ul>
        <!-- /Header Menu -->
        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-ellipsis-vertical"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            {{-- <form method="POST" class="dropdown-item" action="{{ route('logout') }}">
              @csrf
                  {{ __('Log Out') }}
          </form> --}}
          </div>
        </div>
        <!-- /Mobile Menu -->
      </div>
      <!-- /Header -->
