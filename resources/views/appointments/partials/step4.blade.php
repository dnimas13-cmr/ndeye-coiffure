<x-guest-layout>
    <div class="container">
        <h2>Date et horaire</h2>
        <form id="step4Form">
            @csrf
            <div id="calendar"></div>
            <label for="dateInput">Choisissez une date :</label>
            <input type="date" id="selectedDate" name="selectedDate" required onchange="updateHiddenFields()">
    
            <label for="timeInput">Choisissez un horaire :</label>
            <input type="time" id="selectedTime" name="selectedTime" required onchange="updateHiddenFields()">

            <div id="dateError"></div>
            <button type="button" onclick="submitStep4()">Suivant</button>
            <button type="button" onclick="window.history.back();">Retour</button>
        </form>
    </div>

    
    <script>

    function submitStep4() {
        const selectedDate = document.getElementById('selectedDate').value;
        const selectedTime = document.getElementById('selectedTime').value;

        if (!selectedDate || !selectedTime) {
            document.getElementById('dateError').textContent = 'Veuillez sélectionner à la fois une date et une heure.';
            return;
        }

        fetch('{{ route('appointments.partials.step4') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ date: selectedDate, time: selectedTime })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route('appointments.partials.step5') }}';
            } else {
                document.getElementById('dateError').innerHTML = Object.values(data.errors).join(', ');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('dateError').innerHTML = "Erreur lors du traitement de la requête.";
        });
    }
    </script>
</x-guest-layout>