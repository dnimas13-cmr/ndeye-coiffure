<x-guest-layout>
    <div class="container">
        <h2>Récapitulatif des informations fournies</h2>

        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <ul>
            <li>Lieu: {{ session('appointment.step1.location') }}</li>
            <li>Adresse: {{ session('appointment.step2.address') }}</li>
            <li>Quand: {{ session('appointment.step3.timing') }}
                @if(session('appointment.step3.otherDetail'))
                - {{ session('appointment.step3.otherDetail') }}
                @endif
            </li>
            <li>Date et Heure: {{ session('appointment.step4.date') }} at {{ session('appointment.step4.time') }}</li>
            <li>Coiffure Femme: {{ session('appointment.step5.female_haircut') }}</li>
            <li>Coiffure Homme: {{ session('appointment.step5.male_haircut') }}</li>
            <li>Coiffure Enfant: {{ session('appointment.step5.child_haircut') }}</li>
            <li>Coiffure choisi: {{ session('appointment.step6.haircut_id') }}</li>
        </ul>
        <form id="reviewForm" action="{{ route('appointments.review') }}" method="POST">
            @csrf
            <input type="hidden" name="location" value="{{ session('appointment.step1.location') }}">
            <input type="hidden" name="address" value="{{ session('appointment.step2.address') }}">
            <input type="hidden" name="timing" value="{{ session('appointment.step3.timing') }}">
            <input type="hidden" name="otherDetail" value="{{ session('appointment.step3.otherDetail') }}">
            <input type="hidden" name="date" value="{{ session('appointment.step4.date') }}">
            <input type="hidden" name="time" value="{{ session('appointment.step4.time') }}">
            <input type="hidden" name="female_haircut" value="{{ session('appointment.step5.female_haircut') }}">
            <input type="hidden" name="male_haircut" value="{{ session('appointment.step5.male_haircut') }}">
            <input type="hidden" name="child_haircut" value="{{ session('appointment.step5.child_haircut') }}">
            <input type="hidden" name="haircut_id" value="{{ session('appointment.step6.haircut_id') }}">
            <button type="button" onclick="window.history.back();" class="btn btn-secondary">Retour</button>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</x-guest-layout>