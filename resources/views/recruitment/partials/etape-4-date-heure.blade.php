@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 4')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow text-center'>
                <h4>{{ __('Date & time') }}</h4>
                
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{ route('recruitment.partials.choise-of-day') }}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="{{ route('recruitment.partials.swho-does-her-hair') }}" class='btn-step btn-pri'>{{ __('Next') }}</a>
            </div>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Summary') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('Helping with a wedding') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>83000 Toulon</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ScissorsColor.png') }}" class='icon-step'> <span>Coiffure événementielle, Lissage</span></p>
            </div>
        </div>
    </div>
    
@endsection