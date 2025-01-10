<x-guest-layout>
    <div class="container">
        <h2>Quelle coiffure te ferait plaisir ?</h2>
        <form id="step6Form">
            @csrf
            <div class="coiffure-list">
                <div class="coiffure-item">
                    <p id="haircut_name_1">ma coiffure 1</p>
                    <p id="haircut_time_1">10:00</p>
                    <input type="hidden" value="1" id="id_haircut_1">
                    <button type="button" onclick="submitStep6(1)" class="choose-haircut">Choisir</button>
                </div>
                <div class="coiffure-item">
                    <p id="haircut_name_2">ma coiffure 2</p>
                    <p id="haircut_time_2">11:00</p>
                    <input type="hidden" value="2" id="id_haircut_2">
                    <button type="button" onclick="submitStep6(2)" class="choose-haircut">Choisir</button>
                </div>
            </div>
            <div id="haircutError"></div>
            <button type="button" onclick="window.history.back();">Retour</button>
        </form>
    </div>
    
    <script>
        function submitStep6(haircutId) {
            let haircut_id = parseInt(document.getElementById('id_haircut_' + haircutId).value, 10);
            
            // Vérification que l'ID est un entier
            if (!Number.isInteger(haircut_id)) {
                document.getElementById('haircutError').textContent = 'Erreur système, actualisez la page';
                return;
            }
        
            fetch('{{ route('appointments.partials.step6') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ haircut_id: haircut_id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '{{ route('appointments.review') }}';
                } else {
                    document.getElementById('haircutError').innerHTML = Object.values(data.errors).join(', ');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('haircutError').textContent = "Erreur lors du traitement de la requête.";
            });
        }
    </script>
</x-guest-layout>