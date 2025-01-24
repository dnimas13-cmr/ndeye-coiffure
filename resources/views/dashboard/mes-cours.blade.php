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
          <img src="{{ asset('img/logo/logo.png') }}" alt="Ndeye Coiffure logo"">
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <img src="{{ asset('img/icons/home.png') }}">
          <span>{{ __('Home') }}</span></a>
      </li>
      <li class="nav-item active-ndeye">
        <a class="nav-link" href="{{ route('dashboard/mes-cours') }}">
            <img src="{{ asset('img/icons/Course.png') }}">
            <span>{{ __('My course') }}</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard/mes-messages') }}">
            <img src="{{ asset('img/icons/Chats.png') }}">
            <span>{{ __('My message') }}</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('mes-reservations') }}">
            <img src="{{ asset('img/icons/Calendar.png') }}">
            <span>{{ __('My appointments') }}</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard/mes-favoris') }}">
            <img src="{{ asset('img/icons/Heart.png') }}">
            <span>{{ __('My favourites') }}</span></a>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard/tableau-de-bord') }}">
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
            <div class="col-xl-12 col-lg-6 pt-4">
                <div class='container-video'>
                    <div  class='main-video-container'>
                        <video src="{{ asset('videos-playlist/video-1.mp4') }}" loop controls class='main-video'></video>
                        <h3 class='main-vid-title'>Femme coiffant 1</h3>
                    </div>
                    <div class='widget-db contain-wid'>
                        <h4>{{ __('Course content') }}</h4>
                        <div class='video-list-container' id="videosList"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-4">
            <div class="col-xl-9 col-lg-6 pt-4 width-800">
                <div class='widget-db'>
                    <div class=''>
                        <h3>{{ __('Mastering the Art of Braiding') }}</h3>
                        <div class='d-flex gap-15 mt-4'>
                            <div class='d-flex gap-15'><img src="{{ asset('/img/icons/rates.png') }}"> <span>4.8</span></div>
                            <div class='d-flex gap-15'><img src="{{ asset('/img/icons/Clock.png') }}"> <span>75 {{ __('hours') }}</span></div>
                        </div>
                        <div class='link-course-nav d-flex mt-4'>
                            <div class='link-navigation'><span class='active-dia' id='presentation-course'>Présentation</span></div>
                            <div class='link-navigation'><span id='faq-course'>Q & R</span></div>
                            <div class='link-navigation'><span id='remarque-course'>Remarques</span></div>
                            <div class='link-navigation'><span id='avis-course'>Avis</span></div>
                            <div class='link-navigation'><span id='outil-course'>Outils d'apprentissage</span></div>
                        </div>

                        <div class='content-presentation-course mt-4'>
                            <div class='border-content'>
                                <h4>{{ __('Description') }}</h4>
                                <p>Discover the basics and tricks of braiding with this interactive online course. Learn how to do classic braids, African braids and creative styles for every occasion. Detailed demonstrations 
                                  and professional advice will guide you every step of the way to mastering this hair technique in 
                                  no time. Whether you're a beginner or want to perfect your skills, this course is for you!</p>
                            </div>
                            <div class='border-content mt-4'>
                                <h4>{{ __('Fichiers joints') }}</h4>
                                <div class="field">
                                    <div class="file d-flex justify-content-between">
                                      <div class="file__input d-flex justify-content-between" id="file__input">
                                        <input class="file__input--file" id="customFile" type="file" multiple="multiple" name="files[]"/>
                                        <label class="file__input--label" for="customFile" data-text-btn="Upload File"><img src="{{ asset('/img/icons/upload.png') }}"></label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='content-faq-course mt-4'>FAQ</div>
                        <div class='content-remarque-course mt-4'>remarque</div>
                        <div class='content-avis-course mt-4'>Avis</div>
                        <div class='content-outil-course mt-4'>Outil</div>
                    </div>
                </div>
            </div>
          </div>
        </div>
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
  <script src="{{ asset('assets/js/calendar.js') }}"></script>
  <script>
      const videosList = [
      {
          video: "{{ asset('videos-playlist/video-1.mp4') }}",
          title: 'Femme coiffant 1',
          time: '12s'
      },
      {
          video: "{{ asset('videos-playlist/video-2.mp4') }}",
          title: 'Femme coiffant 2',
          time: '09s'
      },
      {
          video: "{{ asset('videos-playlist/video-3.mp4') }}",
          title: 'Femme coiffant 3',
          time: '1min33s'
      },
      {
          video: "{{ asset('videos-playlist/video-4.mp4') }}",
          title: 'Femme coiffant 4',
          time: '07s'
      },
  ]


  const categories = [... new Set(videosList.map((item) => { return item}))]
  document.getElementById('videosList').innerHTML = categories.map((item) =>{
      var { video, title, time } = item;
      return (
          `<div class="list active">
              <video src=${video} class="list-video"></video>
              <h3 class="list-title">${title} <span><img src="{{ asset('img/icons/player.png') }}"> ${time}</span></h3>
          </div>`
      )
  }).join('')


  let videoList = document.querySelectorAll('.video-list-container .list');
  videoList.forEach(emove => { emove.classList.remove('active')});
  videoList.forEach(vid => {
     vid.onclick = () => {
        videoList.forEach(remove => { remove.classList.remove('active')});
        vid.classList.add('active');
        let src = vid.querySelector('.list-video').src;
        let title = vid.querySelector('.list-title').innerHTML;
        document.querySelector('.main-video-container .main-video').src = src;
        document.querySelector('.main-video-container .main-video').play();
        document.querySelector('.main-video-container .main-vid-title').innerHTML = title;
        document.querySelector('.main-video-container .main-vid-title span').innerHTML = time;
     }
  })






  $(document).ready(function() {
   $('.file__input--file').on('change',function(event){
     var files = event.target.files;
     for (var i = 0; i < files.length; i++) {
       var file = files[i];
       $("<div class='file__value'><div class='file__value--text'>" + file.name + "</div><div class='file__value--remove' data-id='" + file.name + "' ></div></div>").insertAfter('#file__input');
     }	
   });
   $('body').on('click', '.file__value', function() {
     $(this).remove();
   });
   
   
   
 });	
  </script>






<script>
    (function($) {
let btn_presentation =  $('#presentation-course');
let btn_faq =  $('#faq-course');
let btn_remarque =  $('#remarque-course');
let btn_avis =  $('#avis-course');
let btn_outil =  $('#outil-course');



let content_presentation = $('.content-presentation-course');
let content_faq = $('.content-faq-course');
let content_remarque = $('.content-remarque-course');
let content_avis = $('.content-avis-course');
let content_outil = $('.content-outil-course');

btn_presentation.on( "click", function() {
  content_presentation.css('display', 'block');
  content_faq.css('display', 'none');
  content_remarque.css('display', 'none');
  content_avis.css('display', 'none');
  content_outil.css('display', 'none');

  btn_presentation.addClass('active-dia');
  btn_faq.removeClass('active-dia');
  btn_remarque.removeClass('active-dia');
  btn_avis.removeClass('active-dia');
  btn_outil.removeClass('active-dia');
    
} );

btn_faq.on( "click", function() {
  content_presentation.css('display', 'none');
  content_faq.css('display', 'block');
  content_remarque.css('display', 'none');
  content_avis.css('display', 'none');
  content_outil.css('display', 'none');

  btn_presentation.removeClass('active-dia');
  btn_faq.addClass('active-dia');
  btn_remarque.removeClass('active-dia');
  btn_avis.removeClass('active-dia');
  btn_outil.removeClass('active-dia');
    
} );

btn_remarque.on( "click", function() {
  content_presentation.css('display', 'none');
  content_faq.css('display', 'none');
  content_remarque.css('display', 'block');
  content_avis.css('display', 'none');
  content_outil.css('display', 'none');

  btn_presentation.removeClass('active-dia');
  btn_faq.removeClass('active-dia');
  btn_remarque.addClass('active-dia');
  btn_avis.removeClass('active-dia');
  btn_outil.removeClass('active-dia');
    
} );

btn_avis.on( "click", function() {
  content_presentation.css('display', 'none');
  content_faq.css('display', 'none');
  content_remarque.css('display', 'none');
  content_avis.css('display', 'block');
  content_outil.css('display', 'none');

  btn_presentation.removeClass('active-dia');
  btn_faq.removeClass('active-dia');
  btn_remarque.removeClass('active-dia');
  btn_avis.addClass('active-dia');
  btn_outil.removeClass('active-dia');
    
} );

btn_outil.on( "click", function() {
  content_presentation.css('display', 'none');
  content_faq.css('display', 'none');
  content_remarque.css('display', 'none');
  content_avis.css('display', 'none');
  content_outil.css('display', 'block');

  btn_presentation.removeClass('active-dia');
  btn_faq.removeClass('active-dia');
  btn_remarque.removeClass('active-dia');
  btn_avis.removeClass('active-dia');
  btn_outil.addClass('active-dia');
    
} );



})(jQuery);
  </script>
</body>

</html>