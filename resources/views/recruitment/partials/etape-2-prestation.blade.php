@extends('layouts.app')

@section('title', 'RDV Recruteur- Etape 2')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow'>
                <h4>{{ __('Styling for a corporate event') }}</h4>
                <div class='custom-control mb-4'>
                    <label class="custom-control-label-text">{{ __('Spécifier mon adresse ou la ville souhaitée *') }}</label>
                    <div class='input-step'><img src="{{ asset('img/icons/MapPin.png') }}"><input type='text' class="custom-control-input" name='adresse' placeholder="{{ __('Your address or preferred town') }}" required> </div>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{ route('recruitment.partials.lieu') }}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="{{ route('recruitment.partials.choise-of-day') }}" class='btn-step btn-pri'>{{ __('Next') }}</a>
            </div>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Summary') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('Helping with a wedding') }}</span></p>
            </div>
        </div>
    </div>
    
@endsection