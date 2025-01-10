<x-guest-layout>
    <div class="container">
        <h2>À quelle adresse aura lieu votre rendez-vous ?</h2>
        <form id="step2Form">
            @csrf
            <input type="text" id="address" name="address" required>
            <button type="button" onclick="submitStep2()">Suivant</button>
            <button type="button" onclick="window.history.back();">Retour</button>
            <div id="errorAddress"></div>
        </form>
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

</x-guest-layout>