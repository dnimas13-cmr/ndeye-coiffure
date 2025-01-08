<x-guest-layout>
   
    @section('title', __('inscription'))

   
    <form method="POST" action="{{ route('register') }}">
        @csrf

       
    <!-- Étape 2 : Formulaire d'enregistrement -->
    <div id="step2"> 

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

         <!-- phone number -->
         <div>
            <x-input-label for="phone_number" :value="__('Phone')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <input type="hidden" name="account_type" value="default" id="accountTypeField">
            <button type="button" onclick="goToStep1()">Retour</button>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </div>
    </form>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
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
    });
   
    function goToStep1() {
            window.location.replace('\choix-type-compte');
            
    } 
    </script>
</x-guest-layout>
