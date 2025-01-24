@extends('layouts.app')

@section('title', 'RDV recruteur - Etape 3')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow'>
                <h4>{{ __('Your address or preferred town ?') }}</h4>
                <div class='custom-control-checked mb-3'>
                    
                    <label class="checkbox-label">
                        <input type="checkbox" name="option-1" class="checkbox-input">
                        <span class="checkbox-text">{{ __('Maîtrise des tresses') }}</span>
                    </label>

                    <label class="checkbox-label-checked">
                        <input type="checkbox" name="option-11" class="checkbox-input" checked>
                        <span class="checkbox-text">{{ __('Coiffure événementielle') }}</span>
                    </label>

                    <label class="checkbox-label">
                        <input type="checkbox" name="option-3" class="checkbox-input">
                        <span class="checkbox-text">{{ __('Formatrice') }}</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="option-8" class="checkbox-input">
                        <span class="checkbox-text">{{ __('Coloration et mèches') }}</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="option-4" class="checkbox-input">
                        <span class="checkbox-text">{{ __('Capacité à innover') }}</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="option-5" class="checkbox-input">
                        <span class="checkbox-text">{{ __('Soin des cheveux') }}</span>
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="option-6" class="checkbox-input">
                        <span class="checkbox-text">{{ __('Techniques de permanente') }}</span>
                    </label>
                    <label class="checkbox-label-checked">
                        <input type="checkbox" name="option-7" class="checkbox-input" checked>
                        <span class="checkbox-text">{{ __('Lissage') }}</span>
                    </label>
                </div>
                <h4 class='mt-4'>{{ __('Do you want to include other criteria (optional)?') }}</h4>
                <div class='form-checkout'>
                    <div class='label-form'>
                        <label>{{ __('Diploma level') }}</label>
                        <select>
                            <option>{{ __('Bac') }}</option>
                            <option>{{ __('Licence') }}</option>
                            <option>{{ __('Master') }}</option>
                            <option>{{ __('Doctorat') }}</option>
                            <option>{{ __('Autres...') }}</option>
                        </select>
                    </div>
                </div>
                <div class='form-checkout mt-4'>
                    <div class='label-form'>
                        <label>{{ __('Years of experience') }}</label>
                        <select>
                            <option>2 {{ __('years') }}</option>
                            <option>3 {{ __('years') }}</option>
                            <option>4 {{ __('years') }}</option>
                            <option>5 {{ __('years') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{ route('recruitment.partials.prestation') }}"  class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="{{ route('recruitment.partials.date-hour') }}" class='btn-step btn-pri'>{{ __('Next') }}</a>
            </div>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Summary') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('Helping with a wedding') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>83000 Toulon</span></p>
            </div>
        </div>
    </div>
    
@endsection