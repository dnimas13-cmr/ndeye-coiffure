<x-guest-layout>
    <div class="container">
        <h2>Où aura lieu votre rendez-vous ?</h2>
        <form id="step1Form">
            @csrf
            <select name="location" id="location" required>
                <option value="">Sélectionnez une option</option>
                <option value="A mon adresse">À mon adresse</option>
                <option value="au salon">Au salon</option>
            </select>
            <button type="button" onclick="submitStep1()">Suivant</button>
            <div id="errorLocation"></div>
        </form>
    </div>
    
    <script>
    function submitStep1() {
        const location = document.getElementById('location').value;
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
                document.getElementById('errorLocation').innerHTML = data.errors.location.join(', '); // S'assure que tous les messages d'erreur sont affichés.
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

</x-guest-layout>