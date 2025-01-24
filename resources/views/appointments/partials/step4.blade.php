@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 4')
@section('content')

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


    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow text-center'>
                <h4>{{ __('Date & time') }}</h4>
                
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{route('appointments.partials.step3')}}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="#" onclick="submitStep4()" class='btn-step btn-pri'>{{ __('Next') }}</a>
            </div>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Summary') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('At my address') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>21 rue de la Liberté, 75001 Paris</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('On a specific date') }}</span></p>
            </div>
        </div>
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
    
@endsection
