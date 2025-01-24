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
                <a href="{{ route('dashboard') }}" class="navbar-text"><span class="navbar-text">Welcome back, {{ Auth::user()->name }}👋</span></a>
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
                        <a href="{{ route('recruitment.partials.place') }}" class='btn-ndeye sec'>{{ __('Recruter une coiffeuse') }}</a>  
                    </div>
                    <div class='svt'>
                        <a href='#' class='btn-none'>{{ __('Next') }}</a>
                    </div>
                </div>
            </div>
        </div>