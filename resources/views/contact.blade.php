@extends('layouts.app')

@section('title', 'Contactez-nous - Ndeye coiffure')
@section('content')
<style>
 
</style>


    <div class='contact-page mt-4'>
        <div class='bg-shadow'>
            <div class='d-flex justify-content-between'>
                <div>
                    <h4 class='text-center'>{{ __('Nous contacter :') }}</h4>
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
                                    <label>{{ __('Message *') }}</label>
                                    <textarea name='' placeholder="{{ __('Write ...') }}" required></textarea>
                                </div>
                            </div>
                            <div class='mb-4'><input type="radio" name='agree_condition' required> <span>{{ __('I agree to be contacted by a Ndeye Coiffure consultant') }}</span></div>
                            <div class='btn-checkout line-bottom-2 none'>
                                <button class='btn-ndeye' type='submit'><img src="{{ asset('img/icons/PaperPlane.png') }}" class='icon-card-input-2'> {{ __('Send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div><img src="{{ asset('img/contact-bg.png') }}" alt="{{ __('Contactez Ndeye Coiffure') }}"></div> 
            </div>       
    </div>
@endsection