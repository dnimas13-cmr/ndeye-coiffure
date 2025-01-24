@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 3')
@section('content')
<div class='rdv-step-particulier step-1 d-flex'>
    <div class='step-container left-step'>
        <div class='bg-shadow'>
            <h4>{{ __('When do you need hairdressing?') }}</h4>
            <form id="step3Form">
                @csrf
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" id="flexible" name='timing' value="je suis flexible" onchange="checkOther(this.value)"> 
                    <label class="custom-control-label" for="flexible">{{ __('je suis flexible') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" id="soon" name='timing' value="dans les prochains jours" onchange="checkOther(this.value)">
                    <label class="custom-control-label" for="soon">{{ __('dans les prochains jours') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" id="asap" name='timing' value="dès que possible" onchange="checkOther(this.value)">
                    <label class="custom-control-label" for="asap">{{ __('dès que possible') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" id="specificDate" name='timing' value="à une date précise" checked onchange="checkOther(this.value)">
                    <label class="custom-control-label" for="specificDate">{{ __('à une date précise') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" id="other" name='timing' value="autres" onchange="checkOther(this.value)">
                    <label class="custom-control-label" for="other">{{ __('autres (précisez)') }}</label>
                    <input type="text" class="custom-control-label" id="otherDetail" name="otherDetail" placeholder="Précisez" style="display:none;" required>
                </div>
                <div id="timingError"></div>
            </form>
        </div>
        <div class='btn-step mt-4 d-flex'>
            <a href="{{route('appointments.partials.step2')}}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
            <a href="#" onclick="submitStep3()" class='btn-step btn-pri'>{{ __('Next') }}</a>
        </div>
    </div>
</div>

<script>
    function checkOther(value) {
        var otherInput = document.getElementById('otherDetail');
        otherInput.style.display = value === 'autres' ? 'block' : 'none';
        if (value !== 'autres') {
            otherInput.value = ''; // Assurez-vous de vider le champ si ce n'est pas nécessaire
        }
    }
    
    function submitStep3() {
        const radios = document.getElementsByName('timing');
        let timing = '';
        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                timing = radios[i].value; // gets the value of the selected radio button
                break;
            }
        }
        const otherInput = document.getElementById('otherDetail');
        const otherDetail = otherInput.style.display === 'block' && otherInput.value.trim() !== '' ? otherInput.value.trim() : null;
    
        // Construire l'objet de données en fonction de la présence de otherDetail
        let data = { timing: timing };
        if (otherDetail) {
            data.otherDetail = otherDetail;
        }
        
        fetch('{{ route('appointments.partials.step3') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route('appointments.partials.step4') }}';
            } else if (data.errors && data.errors.timing) {
                document.getElementById('timingError').innerHTML = data.errors.timing.join(', '); // Ensure all error messages are displayed.
            } else {
                document.getElementById('timingError').innerHTML = "Une erreur inattendue est survenue.";
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('timingError').innerHTML = "Erreur lors du traitement de la requête.";
        });
    }
    </script>

@endsection
