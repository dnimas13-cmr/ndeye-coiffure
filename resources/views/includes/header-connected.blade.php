<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="{{ asset('img/favicons/icon-favicon.ico') }}" rel="icon">
  <title>Dashboard - Ndeye Coiffure</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/ruang-admin.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('assets/css/main-style.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
         <img src="{{ asset('img/logo/logo.png') }}" alt="Ndeye Coiffure logo">
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active-ndeye">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <img src="{{ asset('img/icons/home.png') }}">
          <span>{{ __('Home') }}</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard/mes-cours') }}">
            <img src="{{ asset('img/icons/Course.png') }}">
            <span>{{ __('My course') }}</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
            <img src="{{ asset('img/icons/Chats.png') }}">
            <span>{{ __('My message') }}</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
            <img src="{{ asset('img/icons/Calendar.png') }}">
            <span>{{ __('My appointments') }}</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
            <img src="{{ asset('img/icons/Heart.png') }}">
            <span>{{ __('My favourites') }}</span></a>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="#">
            <img src="{{ asset('img/icons/Dashboard.png') }}">
            <span>{{ __('Dashboard') }}</span></a>
        </a>
      </li> 
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class='settings-db'>
              <a href='#'><img src="{{ asset('img/icons/settings.png') }}"> <span>{{ __('Settings') }}</span></a>
            </div>
            <div class="copyright d-flex justify-content-between align-items-center">
                <div><img src="{{ asset('img/Avatar.png') }}"></div>
                <div>
                  <h4>{{ Auth::user()->name }}</h4>
                  <p>{{ Auth::user()->email }}</p>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                           <img src="{{ asset('img/icons/logout.png') }}" alt="{{ __('Logout') }}">
                        </x-responsive-nav-link> 
                    </form>

                </div>
            </div>
          </div>
        </footer>    
    </ul>
    
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <!-- <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button> -->
            <!-- Area Chart -->
            <div class="col-xl-9 col-lg-7 pt-4">
              <div class="mb-4">
                    @yield('content-principal')
              </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-3 col-lg-5 border-left pt-6">
              <div class="mb-4">  
                    @yield('content-navbar')
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>
</body>

</html>