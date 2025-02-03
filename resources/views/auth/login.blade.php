@extends('layouts.app')
@section('title', 'Login - Ndeye Coiffure')
@section('content')
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    

<div class='log-container'>
    <h1 class='text-center'>{{ __('Login') }}</h1>
    @if(session('verifyfirstappointment') == 1)
    <div class="alert alert-warning">
        Vous devez vous connecter avant de passer un rendez-vous.
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <p class='text-center mt-3 paragraphe'>{{ __('Lorem ipsum dolor sit amet adipiscing elit.') }}</p>
    <form method="POST" action="{{ route('login') }}" class='form-css'>
        @csrf

        <!-- Email Address -->
        <div class='fle'>
            <img class='input-file' src="{{ asset('img/icons/PaperPlane.png') }}">
            <x-input-label for="email" :value="__('Email*')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class='fle'>
                <img class='input-file' src="{{ asset('img/icons/LockKey.png') }}">
                <x-input-label for="password" :value="__('Password*')" />
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 btn-ndeye">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        </form>
        <div class='login-social'>
            <p class='text-center'>{{ __('Connect with') }}</p>
            <div class='d-flex justify-content-center line-bottom'>
                <div><a href='#' title='Se connecter avec Google'><img src="{{ asset('img/icons/Google-icon.png') }}"></a></div>
                <div><a href='#' title='Se connecter avec Instagram'><img src="{{ asset('img/icons/Instagram-icon.png') }}"></a></div>
            </div>
            <p class='text-center register'>{{ __('Would you like to join us?') }} <a href="{{ route('register') }}"> {{ __('Register') }}</a></p>
        </div>
    </div>

@endsection
