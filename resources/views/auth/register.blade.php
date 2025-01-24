@extends('layouts.app')
@if(!session()->has('account_type'))
    <script>
        window.location.href = "{{ route('auth.choix-type-compte') }}"; // Utilisez JavaScript pour rediriger
    </script>
    @endif
@section('title', 'Register - Ndeye Coiffure')
@section('content')

<div class='log-container'>
    <h1 class='text-center mb-3'>{{ __('Register') }}</h1>
    <form method="POST" action="{{ route('register') }}" class='form-css reg'>
        @csrf

       
    <!-- Étape 2 : Formulaire d'enregistrement -->

        <!-- Name -->
        <div class='d-flex gap-register'>
            <div class='fle'>
                <img class='input-file-register' src="{{ asset('img/icons/User.png') }}">
                <x-input-label for="name" :value="__('Name*')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="pername" :value="__('Surname')" />
                <x-text-input id="pername" class="block mt-1 w-full" type="text" name="pername" :value="old('pername')" autofocus autocomplete="surname" />
                <x-input-error :messages="$errors->get('pername')" class="mt-2" />
            </div>  
        </div>

        <!-- Email Address -->
        <div class="mt-1 fle">
            <img class='input-file' src="{{ asset('img/icons/PaperPlane.png') }}">
            <x-input-label for="email" :value="__('Email*')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

         <!-- Phone NUmber -->
         <div class="mt-1">
            <x-input-label for="phone" :value="__('Phone Number*')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

       <!-- Password -->
       <div class="mt-1 fle">
        <img class='input-file' src="{{ asset('img/icons/LockKey.png') }}">
        <x-input-label for="password" :value="__('Password*')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

        <!-- Confirm Password -->

        <!-- Confirm Password -->
        <div class="mt-1">
            <x-input-label for="password_confirmation" :value="__('Confirm Password*')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <div class="flex items-center justify-end mt-4">
            
            <input type="hidden" name="account_type" value="{{ session('account_type', 'default') }}" id="accountTypeField">
            <x-primary-button class="ms-4 btn-ndeye">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <hr class='line'>
    </form>

    <div>
        <a class="btn-ndeye no-bg" href="{{ route('login') }}">
                {{ __('Sign in with my account') }}
            </a>
    </div>
    <div class='login-social'>
        <p class='text-center'>{{ __('Connect with') }}</p>
        <div class='d-flex justify-content-center line-bottom no-bottom'>
            <div><a href='#' title='Se connecter avec Google'><img src="{{ asset('img/icons/Google-icon.png') }}"></a></div>
            <div><a href='#' title='Se connecter avec Instagram'><img src="{{ asset('img/icons/Instagram-icon.png') }}"></a></div>
        </div>
        <p class='text-center register'>{{ __('Would you like to join us?') }} <a href="{{ route('login') }}"> {{ __('Login') }}</a></p>
    </div>
</div>
<!--<button type="button" onclick="goToStep1()">Retour</button> -->

    <script>
    /*document.addEventListener('DOMContentLoaded', function() {
        // Récupérer la valeur de 'account_type' de localStorage
        var accountType2 = localStorage.getItem('account_type');
        //alert(accountType2);
        var element;   
        // Vérifier si la valeur existe
        if (accountType2) {
            // Si la valeur existe, affectez-la à l'élément avec l'id 'accountTypeField'
            element = document.getElementById('accountTypeField');
            if (element)
            {
                element.value = accountType2;
            }
            //alert(element.value);
        }  
    });*/
   
    function goToStep1() {
            window.location.replace('\choix-type-compte');
            
    } 
    </script>
   @endsection 
