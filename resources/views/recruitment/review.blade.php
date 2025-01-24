@extends('layouts.app')

@section('title', 'RDV recruteur - Etape 7')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('New to us? ') }}<br>{{ __('Sign up to continue') }}</h4>
                <div class='form-checkout'>
                    <form action='#'>
                        <div class='another-card-content'>
                            <div class='mb-3 d-flex justify-content-between card-year'>
                                <div class='input-img'>
                                    <label>{{ __('First name *') }}</label>
                                    <img src="{{ asset('img/icons/user-input.png') }}" class='icon-card-input-2'>
                                    <input type="text" name='' placeholder="{{ __('First name') }}" required>
                                </div>
                                <div>
                                    <label>{{ __('Name *') }}</label>
                                    <input type='text' name='' placeholder="{{ __('Name') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class='label-form mt-3 another-card-content'>
                            <div>
                                <label>{{ __('Mobile phone *') }}</label>
                                <input type='number' name='' placeholder="{{ __('Enter your number...') }}">
                            </div>
                        </div>
                        <div class='another-card-content'>
                            <div class='mb-3'>
                                <div class='input-img'>
                                    <label>{{ __('Email *') }}</label>
                                    <img src="{{ asset('img/icons/PaperPlane.png') }}" class='icon-card-input-2'>
                                    <input type="text" name='' placeholder="{{ __('Enter your email ...') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class='another-card-content'>
                            <div class='mb-3'>
                                <div class='input-img'>
                                    <label>{{ __('Password *') }}</label>
                                    <img src="{{ asset('img/icons/Password-icon.png') }}" class='icon-card-input-2'>
                                    <input type="password" name='' placeholder="{{ __('Enter your password ...') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class='btn-checkout line-bottom-2'>
                            <button class='btn-ndeye' type='submit'>{{ __('Sign up') }}</button>
                        </div>

                        <div class='btn-checkout mt-3'>
                            <a href="{{ route('login') }}" class='btn-ndeye pri bg-pri d-block text-center' type='submit'>{{ __('Sign in with my account') }}</a>
                        </div>
                    </form>
                    <div class='login-social'>
                        <p class='text-center'>{{ __('Connect with') }}</p>
                        <div class='d-flex justify-content-center line-bottom no-bottom'>
                            <div><a href='#' title='Se connecter avec Google'><img src="{{ asset('img/icons/Google-icon.png') }}"></a></div>
                            <div><a href='#' title='Se connecter avec Instagram'><img src="{{ asset('img/icons/Instagram-icon.png') }}"></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{ route('recruteur/checkout') }}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
            </div>
            <!-- END CONTENT CLASSIC -->
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center  mt-3'>{{ __('Summary') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('Helping with a wedding') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>83000 Toulon</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ScissorsColor.png') }}" class='icon-step'> <span>Coiffure événementielle, Lissage</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('Mercredi 19 décembre à 11h') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/UserColor.png') }}" class='icon-step'> <span>Jade Camara</span></p>
            </div>
            <div class='bg-shadow mt-3 profil-recruteur'>
                <div class='img-recrue'><img src="{{ asset('img/rdv/recrue-3.png') }}" alt="{{ __('Recrue') }}"></div>
                <div class='content-recrue'>
                    <h5 class='mt-4 text-bold'>Jade Camara</h5>
                    <div class='feat d-flex line-bottom-4'>
                        <div><img src="{{ asset('img/icons/Clock.png') }}" class='img-normal'> <span>4.8</span></div>
                        <div><img src="{{ asset('img/icons/MapPin.png') }}" class='img-normal'> <span>Toulon</span></div>
                        <div><img src="{{ asset('img/icons/Scissors.png') }}" class='img-normal'> <span>56 missions</span></div>
                    </div>
                    <h6 class='mt-3'>Bio</h6>
                    <p class='mt-3'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus lacus in quam laoreet, eget finibus orci pharetra. Sed molestie leo eget urna egestas
                         tristique. Pellentesque habitant morbi tristique senectus et netus 
                         et malesuada fames ac turpis egestas. Donec nec luctus tortor, at 
                         sagittis orci.
                    </p>
                    <h5 class='mt-3'>Compétences</h5>
                    <div class='compet mt-3'>
                        <span class='competence'>Coiffure événementielle</span>
                        <span class='competence'>Lissage</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection