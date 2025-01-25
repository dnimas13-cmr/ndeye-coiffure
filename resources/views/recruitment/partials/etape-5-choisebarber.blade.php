@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 5')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow'>
                <h4>{{ __('Hairdressers to suit your needs') }}</h4>
                <div class='item-dia d-flex mt-3'>
                    <div class='img-dia left-c'>
                        <img src="{{ asset('img/rdv/recrue-1.png') }}" alt="{{ __('Title Diagnostic') }}">
                    </div>
                    <div class='content-dia right-c'>
                        <h3 class='mb-2'>Jade Camara</h3>
                        <div class='feat d-flex line-bottom-4'>
                            <div><img src="{{ asset('img/icons/Clock.png') }}"> <span>4.8</span></div>
                            <div><img src="{{ asset('img/icons/MapPin.png') }}"> <span>Toulon</span></div>
                            <div><img src="{{ asset('img/icons/Scissors.png') }}"> <span>56 missions</span></div>
                        </div>
                        <div class='description-dia mt-2'>
                            <h6>{{ __('Compétences') }}</h6>
                            <div class='compet'>
                                <span class='competence'>Coiffure événementielle</span>
                                <span class='competence'>Lissage</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='item-dia d-flex mt-3'>
                    <div class='img-dia left-c'>
                        <img src="{{ asset('img/rdv/recrue-2.png') }}" alt="{{ __('Title Diagnostic') }}">
                    </div>
                    <div class='content-dia right-c'>
                        <h3 class='mb-2'>Jade Camara</h3>
                        <div class='feat d-flex line-bottom-4'>
                            <div><img src="{{ asset('img/icons/Clock.png') }}"> <span>4.8</span></div>
                            <div><img src="{{ asset('img/icons/MapPin.png') }}"> <span>Toulon</span></div>
                            <div><img src="{{ asset('img/icons/Scissors.png') }}"> <span>56 missions</span></div>
                        </div>
                        <div class='description-dia mt-2'>
                            <h6>{{ __('Compétences') }}</h6>
                            <div class='compet'>
                                <span class='competence'>Coiffure événementielle</span>
                                <span class='competence'>Lissage</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='item-dia d-flex mt-3'>
                    <div class='img-dia left-c'>
                        <img src="{{ asset('img/rdv/recrue-3.png') }}" alt="{{ __('Title Diagnostic') }}">
                    </div>
                    <div class='content-dia right-c'>
                        <h3 class='mb-2'>Jade Camara</h3>
                        <div class='feat d-flex line-bottom-4'>
                            <div><img src="{{ asset('img/icons/Clock.png') }}"> <span>4.8</span></div>
                            <div><img src="{{ asset('img/icons/MapPin.png') }}"> <span>Toulon</span></div>
                            <div><img src="{{ asset('img/icons/Scissors.png') }}"> <span>56 missions</span></div>
                        </div>
                        <div class='description-dia mt-2'>
                            <h6>{{ __('Compétences') }}</h6>
                            <div class='compet'>
                                <span class='competence'>Coiffure événementielle</span>
                                <span class='competence'>Lissage</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='item-dia d-flex mt-3'>
                    <div class='img-dia left-c'>
                        <img src="{{ asset('img/rdv/recrue-4.png') }}" alt="{{ __('Title Diagnostic') }}">
                    </div>
                    <div class='content-dia right-c'>
                        <h3 class='mb-2'>Jade Camara</h3>
                        <div class='feat d-flex line-bottom-4'>
                            <div><img src="{{ asset('img/icons/Clock.png') }}"> <span>4.8</span></div>
                            <div><img src="{{ asset('img/icons/MapPin.png') }}"> <span>Toulon</span></div>
                            <div><img src="{{ asset('img/icons/Scissors.png') }}"> <span>56 missions</span></div>
                        </div>
                        <div class='description-dia mt-2'>
                            <h6>{{ __('Compétences') }}</h6>
                            <div class='compet'>
                                <span class='competence'>Coiffure événementielle</span>
                                <span class='competence'>Lissage</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='pagination-dia d-flex justify-content-end mt-4'>
                    <div>
                        <a href='#' class='dia-prev'><img src="{{ asset('img/icons/Arrow.png') }}"></a>
                        <a href='#' class='dia-next'><img src="{{ asset('img/icons/Arrow.png') }}"></a>
                    </div>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{ route('recruitment.partials.date-hour') }}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="#" class='btn-step btn-sec'>{{ __('Skip this step') }}</a>
                <a href="+" class='btn-step btn-pri'>{{ __('Let\'s go !') }}</a>
            </div>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Résumé') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{  session('recruitment.step1.reason')}}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ session('recruitment.step2.address')}}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ScissorsColor.png') }}" class='icon-step'> <span>@if(session('recruitment.step3.kills'))
                    {{ implode(', ', session('recruitment.step3.kills')) }} @endif</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ session('recruitment.step4.date') }} à {{session('recruitment.step4.time') }}</span></p>
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