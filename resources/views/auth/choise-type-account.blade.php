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

        // Effacer le message d'erreur précédent
        errorMessage.style.display = 'none';

        if (accountType) {
            localStorage.setItem('account_type', accountType);
            //alert(accountType);
            window.location.href = '/register';
        } else {
            // Afficher le message d'erreur si aucune option n'est sélectionnée
            errorMessage.style.display = 'block';
        }
    }
    //var accountType2 = localStorage.getItem('account_type');
    //alert(accountType2);
    </script>
</x-guest-layout>