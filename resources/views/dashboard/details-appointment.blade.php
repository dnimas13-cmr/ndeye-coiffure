<x-app-layout>
    <h2>Détails du rendez-vous</h2>
    <p><strong>Heure de début:</strong> {{ $appointment->appointment_start_time }}</p>
    <p><strong>Heure de fin:</strong> {{ $appointment->appointment_end_time }}</p>
    <p><strong>Adresse:</strong> {{ $appointment->appointment_adress }}</p>
    <p><strong>Status:</strong> {{ $appointment->status }}</p>
    <p><strong>Prix:</strong> {{ $appointment->price }}€</p>
    <!-- Bouton pour valider le rendez-vous -->
    <a href="{{ route('validate-appointment', ['id' => $appointment->id]) }}" class="btn btn-primary">
        Valider le rendez-vous
    </a>
</x-app-layout>