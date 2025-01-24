@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 2')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow'>
                <h4>{{ __('Where will your appointment take place?') }}</h4>
                <form id="step2Form">
                    @csrf
                <div class='custom-control mb-4'>
                    <label class="custom-control-label-text">{{ __('To my address') }}*</label>
                    <div class='input-step'><img src="{{ asset('img/icons/MapPin.png') }}"><input type='text' class="custom-control-input" id="address" name='address' placeholder="{{ __('Your address') }}" required> </div>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{route('appointments.partials.step1')}}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="#" onclick="submitStep2()" class='btn-step btn-pri'>{{ __('Next') }}</a>
            </div>
        </form>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Summary') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('At my address') }}</span></p>
            </div>
        </div>
    </div>
  
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeKORSeUf85fccSR43YcjwvVJIuS0mYbc&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
    function initAutocomplete() {
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input, {
            types: ['geocode'], // Restrict the search to geographical location types.
            componentRestrictions: {country: "fr"} // Optional: Adjust this to limit searches to a particular country.
        });
    
        // Listen for the "place_changed" event on the autocomplete object.
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and pressed the Enter key, or the Place Details request failed.
                document.getElementById('errorAddress').textContent = "No details available for input: '" + place.name + "'";
            } else {
                document.getElementById('errorAddress').textContent = '';
            }
        });
    }
    
    function submitStep2() {
        const address = document.getElementById('address').value;
        fetch('{{ route('appointments.partials.step2') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ address: address })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route('appointments.partials.step3') }}';
            } else if (data.errors && data.errors.address) {
                document.getElementById('errorAddress').innerHTML = data.errors.address.join(', '); // S'assure que tous les messages d'erreur sont affichés.
            } else {
                document.getElementById('errorAddress').innerHTML = "Une erreur inattendue est survenue.";
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('errorAddress').innerHTML = "Erreur lors du traitement de la requête.";
        });
    }
    </script>
    
@endsection


    
