@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 1')
@section('content')
<div class='rdv-step-particulier step-1 d-flex'>
    <div class='step-container left-step'>
        <div class='bg-shadow'>
            <h4>{{ __('Where will your appointment take place?') }}</h4>
            <form id="step1Form">
                @csrf
                <div class='custom-control mb-4 custom-radio'>
                    <input type='radio' id="locationHome" class="custom-control-input" name='location' value="A mon adresse" checked> 
                    <label class="custom-control-label" for="locationHome">{{ __('À mon adresse') }}</label>
                </div>
                <div class='custom-control custom-radio'>
                    <input type='radio' id="locationSalon" class="custom-control-input" name='location' value="Au salon"> 
                    <label class="custom-control-label" for="locationSalon">{{ __('Au salon') }}</label>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="#" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="#" class='btn-step btn-pri' onclick="submitStep1()">{{ __('Next') }}</a>
                <div id="errorLocation"></div>
            </div>
        </form>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4>{{ __('Summary') }}</h4>
                <img src="{{ asset('img/rdv/step-1.png') }}">
            </div>
        </div>
    </div>

    <script>
        function submitStep1() {
            const radios = document.getElementsByName('location');
            let location;
            for (let i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    location = radios[i].value; // gets the value of the selected radio button
                    break;
                }
            }
          
            fetch('{{ route('appointments.partials.step1') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ location: location })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '{{ route('appointments.partials.step2') }}';
                } else if (data.errors && data.errors.location) {
                    document.getElementById('errorLocation').innerHTML = data.errors.location.join(', '); // Ensure all error messages are displayed.
                } else {
                    document.getElementById('errorLocation').innerHTML = "Une erreur inattendue est survenue.";
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('errorLocation').innerHTML = "Erreur lors du traitement de la requête.";
            });
        }
        </script>
    
@endsection