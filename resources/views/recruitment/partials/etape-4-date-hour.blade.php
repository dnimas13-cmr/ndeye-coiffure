@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 4')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <form method='POST' action="{{ route('recruitment.partials.date-hour') }}">
            @csrf
            <div class='bg-shadow text-center'>
                <h4>{{ __('Date & time') }}</h4>
                
                <div id="calendar"></div>
            <label for="dateInput">Choisissez une date :</label>
            <input type="date" id="selectedDate" name="date" required onchange="updateHiddenFields()">
                <br>
            <label for="timeInput">Choisissez une horaire de début :</label>
            <input type="time" id="selectedstartTime" name="starttime" required onchange="updateHiddenFields()">
            <br>
            <label for="timeInput">Choisissez une horaire de fin :</label>
            <input type="time" id="selectedendTime" name="endtime" required onchange="updateHiddenFields()">

            <div  id="dateError" class="danger"></div>

            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{ route('recruitment.partials.choise-kills') }}" class='btn-step btn-sec'>{{ __('Retour') }}</a>
                <button type="submit" onclick="submitStep4()"  class='btn-step btn-pri'>{{ __('Suivant') }}</a>
            </div>
        </form>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Résumé') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ session('recruitment.step1.reason')}}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ session('recruitment.step2.address')}}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ScissorsColor.png') }}" class='icon-step'> <span>@if(session('kills2'))
            {{ implode(', ', session('kills2')) }} @endif </span></p>
            </div>
        </div>
    </div>

    <script>

        function submitStep4() {
            const selectedDate = document.getElementById('selectedDate').value;
            const selectedTime1 = document.getElementById('selectedstartTime').value;
            const selectedTime2 = document.getElementById('selectedendTime').value;
    
            if (!selectedDate || !selectedTime1 || !selectedTime2) {
                document.getElementById('dateError').innerHTML  = 'Veuillez sélectionner une date et une heure.';
                return;
            }
    
           /* fetch('{{ route('recruitment.partials.date-hour') }}', {
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
                    window.location.href = '{{ route('recruitment.process') }}';
                } else {
                    document.getElementById('dateError').innerHTML = Object.values(data.errors).join(', ');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('dateError').innerHTML = "Erreur lors du traitement de la requête.";
            });*/
        }
        </script>
    
@endsection