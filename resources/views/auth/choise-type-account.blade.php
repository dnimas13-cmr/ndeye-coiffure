<x-guest-layout>
    @section('title', __('inscription'))

   
    <form method="POST" action="">
        @csrf

        <!-- Étape 1 : Choix du type de compte -->
        <div id="step1">
            <select name="account_type" id="accountTypeSelect" required>
                <option value="">Choisir le type de compte...</option>
                <option value="particulier">Particulier</option>
                <option value="coiffeur_affilie">Coiffeur Affilié</option>
                <option value="recruteur">Recruteur</option>
            </select>
            <span id="error-message" style="color:red; display:none;">Veuillez choisir un type de compte.</span>
            <button type="button" onclick="goToStep2()">Suivant</button>
        </div>
</form>
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
</x-guest-layout>