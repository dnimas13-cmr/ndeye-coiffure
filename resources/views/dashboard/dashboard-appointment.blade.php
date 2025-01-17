<x-app-layout>
    <h2>Liste des rendez-vous</h2>
    <table>
        <thead>
            <tr>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Adresse</th>
                <th>Status</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->appointment_start_time }}</td>
                    <td>{{ $appointment->appointment_end_time }}</td>
                    <td>{{ $appointment->appointment_adress }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>{{ $appointment->price }}€</td>
                    <td><a href="{{ route('details-appointment', ['id' => encrypt($appointment->id)]) }}">Voir détails</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>