@extends('layouts.app')

@section('title', 'RDV Recruteur - Etape 1')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow'>
                <h4>{{ __('Pourquoi avez-vous besoin d\'un coiffeur?') }}</h4>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" name='reason' value="Aider pour un mariage" checked> <label class="custom-control-label">{{ __('Aider pour un mariage') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" name='reason' value="Participer à un défilé"> <label class="custom-control-label">{{ __('Participer à un défilé') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" name='reason' value="Assister à un tournage"> <label class="custom-control-label">{{ __('Assister à un tournage') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" name='reason' value="Renforcer l\'équipe d\'un salon de coiffure"> <label class="custom-control-label">{{ __('Renforcer l\'équipe d\'un salon de coiffure') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" name='reason' value="Former le personnel"> <label class="custom-control-label">{{ __('Former le personnel') }}</label>
                </div>
                <div class='custom-control mb-3 custom-radio'>
                    <input type='radio' class="custom-control-input" name='reason' value="Coiffer lors d\'un évènement d\'entreprise"> <label class="custom-control-label">{{ __('Coiffer lors d\'un évènement d\'entreprise') }}</label>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="#" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="{{ route('recruitment.partials.prestation') }}" class='btn-step btn-pri'>{{ __('Next') }}</a>
            </div>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4>{{ __('Résumé') }}</h4>
                <img src="{{ asset('img/rdv/step-1.png') }}">
            </div>
        </div>
    </div>
    

    <script>
        function submitStep1() {
            const radios = document.getElementsByName('reason');
            let reason;
            for (let i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    reason = radios[i].value; // gets the value of the selected radio button
                    break;
                }
            }
          
            fetch('{{ route('recruitment.partials.reason') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ reason: reason })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '{{ route('recruitment.partials.prestation') }}';
                } else if (data.errors && data.errors.location) {
                    document.getElementById('errorLocation').innerHTML = data.errors.location.join(', '); // Ensure all error messages are displayed.
                } else {
                    document.getElementById('errorLocation').innerHTML = "Une erreur inattendue est survenue.";
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('errorLocation').innerHTML = "Erreur lors du traitement de la requête.";
            });
        }
        </script>

@endsection