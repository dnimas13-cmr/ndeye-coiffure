<x-guest-layout>
    <div class="container">
        <h2>Quelle coiffure te ferait plaisir ?</h2>
        <form id="step6Form">
            @csrf
            <div class="coiffure-list">
                @foreach(range(1, 5) as $index)
                <div class="coiffure-item">
                    <p>Coiffure {{ $index }}</p>
                    <button type="button" class="choose-haircut" data-haircut-id="{{ $index }}">Choisir</button>
                </div>
                @endforeach
            </div>
            <div id="haircutError"></div>
            <button type="button" onclick="submitStep6()">Suivant</button>
            <button type="button" onclick="window.history.back();">Retour</button>
        </form>
    </div>
    
    <script>
    document.querySelectorAll('.choose-haircut').forEach(button => {
        button.addEventListener('click', function() {
            const haircutId = this.getAttribute('data-haircut-id');
            submitStep6(haircutId);
        });
    });
    
    function submitStep6(haircutId) {
        fetch('{{ route('appointments.partials.step6') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ haircut_id: haircutId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route('appointments.partials.step7') }}';
            } else {
                document.getElementById('haircutError').textContent = 'Please select a valid haircut.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('haircutError').textContent = 'An error occurred. Please try again.';
        });
    }
    </script>
</x-guest-layout>