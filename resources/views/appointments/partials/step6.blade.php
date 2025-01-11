<x-guest-layout>
    
    <div class="container">
        <h1>Choisir une coiffure</h1>
        <div class="hairstyles-container">
            @foreach ($hairstyles as $hairstyle)
                <form id="step6Form_{{ $hairstyle->id }}" action="{{ route('appointments.partials.step6') }}" method="POST">
                    @csrf
                    <div class="hairstyle">
                        <h2>{{ $hairstyle->hairstyle_name }}</h2>
                        @if ($hairstyle->hairstyle_photos)
                            <img src="{{ asset('storage/' . $hairstyle->hairstyle_photos) }}" alt="Photo de la coiffure">
                        @endif
                        <p>Prix: {{ $hairstyle->hairstyle_price }}€</p>
                        <p>Temps de réalisation: {{ $hairstyle->realisation_time }} minutes</p>
                        <p>Description: {{ $hairstyle->hairstyle_description }}</p>
                        <input type="hidden" name="haircut_id" value="{{ $hairstyle->id }}">  
                        <button type="submit">Choisir cette coiffure</button>
                        <div id="haircutError_{{ $hairstyle->id }}"></div>
                    </div>
                </form>
            @endforeach
        </div>
        <button type="button" onclick="window.history.back();" class="choose-haircut">Retour</button>
    
    <script>
      /* function submitStep6(haircutId) {
    let haircut_id = parseInt(document.getElementById('id_haircut_' + haircutId).value, 10);
    let errorDiv = document.getElementById('haircutError_' + haircutId);

    if (!Number.isInteger(haircut_id)) {
        errorDiv.textContent = 'Erreur système, actualisez la page';
        return;
    }
    alert(haircut_id);
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
            errorDiv.innerHTML = Object.values(data.errors).join(', ');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        errorDiv.textContent = "Erreur lors du traitement de la requête.";
    });
} */
    </script>
</x-guest-layout>