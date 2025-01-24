@extends('layouts.app')

@section('title', 'Vous êtes ? - Ndeye coiffure')
@section('content')
<style>
 
</style>


    <div class='civilite-user mt-4'>
        <div class='bg-shadow'>
            <h4 class='text-center'>{{ __('Vous êtes :') }}</h4>
            <p class='mt-4 text-center'>Lorem ipsum dolor sit amet adipiscing elit.</p>
            <div class='mt-4 choix-civilite'>
                <label class="checkbox-label">
                    <input type="checkbox" name="option1" class="checkbox-input">
                    <span class="checkbox-text btn-ndeye pri">Option 1</span>
                </label>
                <label class="checkbox-label">
                    <input type="checkbox" name="option2" class="checkbox-input">
                    <span class="checkbox-text btn-ndeye pri">Option 2</span>
                </label>
                <label class="checkbox-label">
                    <input type="checkbox" name="option3" class="checkbox-input">
                    <span class="checkbox-text btn-ndeye pri">Option 3</span>
                </label>
            </div>
        <div class='btn-step mt-4 d-flex justify-content-end'>
            <a href="{{ route('register') }}" class='btn-step btn-sec'>{{ __('Next') }}</a>
        </div>
    </div>
@endsection