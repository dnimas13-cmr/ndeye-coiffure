<x-guest-layout>

    <div class="container">
        <h2>Qui va se coiffer ?</h2>
        <form id="step5Form">
            @csrf
            <div>
                <label>Coiffure Femme:</label>
                <button type="button" onclick="decrement('female')">-</button>
                <input type="text" id="female" name="female_haircut" value="0" readonly>
                <button type="button" onclick="increment('female')">+</button>
            </div>
            <div>
                <label>Coiffure Homme:</label>
                <button type="button" onclick="decrement('male')">-</button>
                <input type="text" id="male" name="male_haircut" value="0" readonly>
                <button type="button" onclick="increment('male')">+</button>
            </div>
            <div>
                <label>Coiffure Enfant:</label>
                <button type="button" onclick="decrement('child')">-</button>
                <input type="text" id="child" name="child_haircut" value="0" readonly>
                <button type="button" onclick="increment('child')">+</button>
            </div>
            <div id="haircutError1"></div>
            <button type="button" onclick="submitStep5()">Suivant</button>
            <button type="button" onclick="window.history.back();">Retour</button>
        </form>
    </div>
    
    <script>
    function increment(id) {
        var input = document.getElementById(id);
        var value = parseInt(input.value, 10);
        input.value = value + 1;
    }
    
    function decrement(id) {
        var input = document.getElementById(id);
        var value = parseInt(input.value, 10);
        if (value > 0) {
            input.value = value - 1;
        }
    }
    
    function submitStep5() {
        const female = document.getElementById('female').value;
        const male = document.getElementById('male').value;
        const child = document.getElementById('child').value;
    
        if (female == 0 && male == 0 && child == 0) {
            document.getElementById('haircutError1').textContent = 'veuillez choisir au moins une personne';
            return;
        }
    
        fetch('{{ route('appointments.partials.step5') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ female_haircut: female, male_haircut: male, child_haircut: child })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route('appointments.partials.step6') }}';
            } else {
                document.getElementById('haircutError1').innerHTML = Object.values(data.errors).join(', ');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('haircutError1').innerHTML = "Erreur lors du traitement de la requête.";
        });
    }
    </script>

</x-guest-layout>