<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Ndeye Coiffure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="icon" href="{{ asset('img/favicons/icon-favicon.ico') }}">
    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Ndeye Coiffure logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mg-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('formation-tresses') }}">Formation tresse</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('besoin-dune-pro') }}">Besoin d'un.e pro</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('mon-manga') }}">Mon manga</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('capillaire') }}">Capillaire</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <div class="d-flex justify-content-end align-items-center">
                    <p class="btn btn-sm" id='rdv'><img src="{{ asset('img/icons/CalendarPlus.png') }}"> <span>Prendre rendez-vous</span></p>
                    @if (Auth::check())
                        <a href="{{ route('dashboard') }}" class="navbar-text"><span class="navbar-text">Bienvenue, {{ Auth::user()->name }}!</span></a>
                    @else
                        <a class="btn btn-sm header-link primary" href="{{ route('login') }}"><img src="{{ asset('img/icons/UserCircle.png') }}"> <span>Se connecter / S'inscrire</span></a>
                    @endif
                    <div class="dropdown">
                        <button class="btn-no-border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{ asset('img/icons/french-language.png') }}">
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#"><img src="{{ asset('img/icons/french-language.png') }}"> Français</a></li>
                          <li><a class="dropdown-item" href="#"><img src="{{ asset('img/icons/french-language.png') }}"> Anglais</a></li>
                          <li><a class="dropdown-item" href="#"><img src="{{ asset('img/icons/french-language.png') }}"> Espagnol</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- POPup -->
        <div id='popup'>
            <div class='content-popup d-flex align-items-center justify-content-center'>
                <div class='pop'>
                    <div>
                        <span class='close-pop' title='Fermer'><img src="{{ asset('img/icons/Scissors.png') }}" alt='Fermer'></span>
                        <h3>{{ __('Vous souhaitez') }} :</h3>
                        <a href="{{ route('appointments.partials.step1') }}" class='btn-ndeye'>{{ __('Prendre rendez-vous') }}</a>
                        <a href="{{ route('recruitment.partials.reason') }}" class='btn-ndeye sec'>{{ __('Recruter une coiffeuse') }}</a>
                    </div>
                    <div class='svt'>
                        <a href='#' class='btn-none'>{{ __('Next') }}</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- END POPUP -->
    <!-- Main Content -->
    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-none">
                    <div class="col d-flex">
                        <div>
                            <h3>Formation Tresse</h3>
                            <p>Améliorez vos compétences, que vous soyez amateur ou professionnel.</p>
                            <a href="{{ route('formation-tresses') }}" class="icon-link gap-1 icon-link-hover stretched-link"><span>Démarrer la formation</span> <img src="{{ asset('img/icons/Btn 2.png') }}"></a>
                        </div>
                        <div>
                            <img src="{{ asset('img/formation-tresses.png') }}" alt="formation tresses" class="pos-img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-none">
                    <div class="col d-flex">
                        <div>
                            <h3>Besoin d'un.e Pro</h3>
                            <p>Trouvez la coiffeuse parfaite ou recrutez des talents.</p>
                            <a href="{{ route('besoin-dune-pro') }}" class="icon-link gap-1 icon-link-hover stretched-link"><span>Choisir un.e professionnelle</span> <img src="{{ asset('img/icons/Btn 2.png') }}"></a>
                        </div>
                        <div>
                            <img src="{{ asset('img/besoin-pro.png') }}" alt="Besoin d'une pro" class="pos-img-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-0">
            <!-- Mon Manga -->
            <div class="col-md-4">
                <div class="card p-4 border-none-2"  style="background: url('img/background/mon-manga.png'); background-size: cover;">
                    <h3 class="mb-0">Mon manga : Braiders</h3>
                    <a href="{{ route('mon-manga') }}" class="icon-link gap-1 icon-link-hover stretched-link mt-5 f-1"><span>Lire le manga<span> <img src="{{ asset('img/icons/Btn 2.png') }}"></a>
                </div>
            </div>

            <!-- Capillaire -->
            <div class="col-md-4">
                <div class="card p-4 border-none-2"  style="background: url('img/background/capillaire.png'); background-size: cover;">
                    <h3 class="mb-0">Capillaire</h3>
                    <p>Obtenez un diagnostic personnalisé grâce à notre IA.</p>
                    <a href="{{ route('capillaire') }}" class="icon-link gap-1 icon-link-hover stretched-link mt-5 f-2"><span>Commencer le diagnostic<span> <img src="{{ asset('img/icons/Btn 2.png') }}"></a>
                </div>
            </div>

            <!-- Blog -->
            <div class="col-md-4">
                <div class="card p-4 border-none-2"  style="background: url('img/background/Blog.png'); background-size: cover;">
                    <h3 class="mb-0">Blog</h3>
                    <p>Restez informé des dernières tendances et actualités.</p>
                    <a href="{{ route('blog') }}" class="icon-link gap-1 icon-link-hover stretched-link mt-5 f-3"><img src="{{ asset('img/icons/Btn 2.png') }}"></a>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5 text-body-secondary">
        <div class="container d-flex align-items-center">
            <p class="width-62">Réalisé dans le Var ©. Contact : <a href="mailto:ndeyecoiffeuseafro@gmail.com">ndeyecoiffeuseafro@gmail.com</a></p>
            <p class="mb-0 width-38">
                <div class="d-flex align-items-center foot">
                    <form action="#" method="POST" class="form-footer">
                        <span><img src="{{ asset('img/icons/WhatsappLogo.png') }}"></span>
                        <input type="text" placeholder="S'inscrire à notre newsletter avec WhatsApp" class="form-group"> 
                        <button type="submit" class="form-group"><img src="{{ asset('img/icons/Btn 2.png') }}"></button>
                    </form>
                    <a href="#" alt="Nous suivre sur Facebook"><img src="{{ asset('img/icons/Facebook.png') }}"></a>
                    <a href="#" alt="Nous suivre sur Instagram"><img src="{{ asset('img/icons/Instagram.png') }}"></a>
                    <a href="#" alt="Nous suivre sur Google Plus"><img src="{{ asset('img/icons/Google.png') }}"></a>
                </div>
            </p>
        </div>
    
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/main-js.js') }}"></script>
</body>
</html>