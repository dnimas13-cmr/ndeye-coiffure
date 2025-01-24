@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 8')
@section('content')

    <div class="container">
        <h2>Récapitulatif des informations fournies</h2>
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
                <a href="{{ route('appointments.partials.step6') }}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
            </div>
            <!-- END CONTENT CLASSIC -->
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center  mt-3'>{{ __('Résumé') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ session('appointment.step1.location') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span> {{ session('appointment.step2.address') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ session('appointment.step3.timing') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>le {{ session('appointment.step4.date') }} à {{ session('appointment.step4.time') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/UserColor.png') }}" class='icon-step'> <span> {{ session('appointment.step5.female_haircut') }} {{ session('appointment.step5.male_haircut') }} {{ session('appointment.step5.child_haircut') }} </span></p>
                <p class='d-flex justify-content-between'>
                    <span class='d-block'><img src="{{ asset('img/icons/BasketColor.png') }}" class='icon-step'> <span class='d-inline'>{{ session('appointment.step6.haircut_name') }}</span></span> 
                    <span class='d-block'><span class='gray-p'>{{ session('appointment.step6.haircut_price') }} €</span></span>
                </p>
                <p class='d-flex justify-content-between none'>
                    <span class='d-block'>-25% <span class='color'>Club</span></span>
                    <span class='d-block'><span class='color'>-7,50 €</span></span>
                </p>
                <p class='d-flex justify-content-between none mt-4'>
                    <span class='d-block'>Total</span>
                    <span class='d-block'><span class='font-p'>{{ session('appointment.step6.haircut_price') }} €</span></span>
                </p>

                <div>
                    <div class="test d-flex">
                        <div>
                            <span class='text-switch'>Vous économisez <b>7,50 €</b> avec <a href='#'>le Club</a> </span> 
                        </div>
                        <div class="switch d-flex" role="radiogroup">
                            <input type="radio" class="switch-input" name="view" value="week" id="week" role="radio" aria-checked="false" tabindex="-1">
                            <label for="week" class="switch-label switch-label-off">N</label>
                            <input type="radio" class="switch-input" name="view" value="month" id="month" checked role="radio" aria-checked="true" tabindex="0">
                            <label for="month" class="switch-label switch-label-on">Y</label>
                            <span style="" class="switch-selection"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="reviewForm" action="{{ route('appointments.review') }}" method="POST">
        @csrf
        <input type="hidden" name="location" value="{{ session('appointment.step1.location') }}">
        <input type="hidden" name="address" value="{{ session('appointment.step2.address') }}">
        <input type="hidden" name="timing" value="{{ session('appointment.step3.timing') }}">
        <input type="hidden" name="otherDetail" value="{{ session('appointment.step3.otherDetail') }}">
        <input type="hidden" name="date" value="{{ session('appointment.step4.date') }}">
        <input type="hidden" name="time" value="{{ session('appointment.step4.time') }}">
        <input type="hidden" name="female_haircut" value="{{ session('appointment.step5.female_haircut') }}">
        <input type="hidden" name="male_haircut" value="{{ session('appointment.step5.male_haircut') }}">
        <input type="hidden" name="child_haircut" value="{{ session('appointment.step5.child_haircut') }}">
        <input type="hidden" name="haircut_id" value="{{ session('appointment.step6.haircut_id') }}">
        <input type="hidden" name="haircut_id" value="{{ session('appointment.step6.haircut_name') }}">
        <input type="hidden" name="haircut_id" value="{{ session('appointment.step6.haircut_price') }}">
        <a href="{{route('appointments.partials.step6')}}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection