@extends('layouts.app')
@section('title', 'Vous êtes ? - Ndeye coiffure')
@section('content')


    <div class='civilite-user mt-4'>
        <div class='bg-shadow'>
            <h4 class='text-center'>{{ __('Vous êtes :') }}</h4>
            <p class='mt-4 text-center'>Lorem ipsum dolor sit amet adipiscing elit.</p>
            <div id="step1">
            <form method="POST" action="">
                    @csrf
            <div class='mt-4 choix-civilite'>
                <select name="account_type" id="accountTypeSelect" required>
                <label class="checkbox-label">
                    <option name="option1" class="checkbox-input" value ="Particulier">
                    <span class="checkbox-text btn-ndeye pri">Particulier</span>
                </label>
                <label class="checkbox-label">
                    <option name="option2" class="checkbox-input" value="Coiffeur Affilié">
                    <span class="checkbox-text btn-ndeye pri">Coiffeur Affilié</span>
                </label>
                <label class="checkbox-label">
                    <option name="option3" class="checkbox-input" value="Recruteur">
                    <span class="checkbox-text btn-ndeye pri">Recruteur</span>
                </label>
            </select>
            </div>
            <span id="error-message" style="color:red; display:none;">Veuillez choisir un type de compte.</span>
            <div class='btn-step mt-4 d-flex justify-content-end'>
            <button type="button" onclick="goToStep2()" class='btn-step btn-sec'>{{ __('Next') }}</button>
            </div>
        </form>
        </div>
        
    
        </div>
    </div>

<script>
    function goToStep2() {
        var selectElement = document.getElementById('accountTypeSelect');
        var accountType = selectElement.value;
        var errorMessage = document.getElementById('error-message');
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Assurez-vous que cette balise meta est présente dans le <head>

        // Effacer le message d'erreur précédent
        errorMessage.style.display = 'none';

        if (accountType) {
            fetch('{{ route('auth.choix-type-compte') }}', {  // Utilisez la bonne URL générée par Laravel
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken  // Nécessaire pour les requêtes POST dans Laravel
                },
                body: JSON.stringify({ account_type: accountType })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '/register'; // Redirection si succès
                } else {
                    // Gérer les erreurs de validation ou autres erreurs
                    if (data.errors && data.errors.account_type) {
                        errorMessage.textContent = data.errors.account_type[0]; // Affiche le premier message d'erreur pour account_type
                        errorMessage.style.display = 'block';
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.textContent = 'Une erreur est survenue lors de l\'envoi des données.';
                errorMessage.style.display = 'block';
            });
        } else {
            // Afficher le message d'erreur si aucune option n'est sélectionnée
            errorMessage.textContent = 'Veuillez choisir un type de compte.';
            errorMessage.style.display = 'block';
        }
    }
</script>


@endsection