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
    <script>
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
            } else {
                document.getElementById('errorAddress').innerHTML = data.errors.address;
            }
        });
    }
    </script>

</x-guest-layout>