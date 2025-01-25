@extends('layouts.app')

@section('title', 'RDV recruteur - Etape 3')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <form>
                @csrf
            <div class='bg-shadow'>
                <h4>{{ __('Quelles sont les compétences souhaitées ?') }}</h4>
                <div class='custom-control-checked mb-3'>
                    
                    @foreach($kills as $kill)
                
                    <label class="checkbox-label">
                        <input type="checkbox" name="option-1" class="checkbox-input" value="{{ $kill->id }}">
                        <span class="checkbox-text">{{ $kill->kills }}</span>
                    </label>

                    @endforeach

                </div>
                <div id="errorKills"></div>
                <h4 class='mt-4'>{{ __('Voulez-vous inclure d\'autres crictères (en option)?') }}</h4>
                <div class='form-checkout'>
                    <div class='label-form'>
                        <label>{{ __('Niveau d\'étude') }}</label>
                        <select name="school_level" id="school_level" onclick="changevalue()">
                            <option>{{ __('Niveau d\'étude') }}</option>
                            <option value="Bac">{{ __('Bac') }}</option>
                            <option value="Licence">{{ __('Licence') }}</option>
                            <option value="Master">{{ __('Master') }}</option>
                            <option value="Doctorat">{{ __('Doctorat') }}</option>
                            <option value="Autres">{{ __('Autres(précisez)...') }}</option>
                        </select>
                        <input type="text" id="schoollevel2" placeholder="{{ __('précisez le niveau d\'étude') }}" style="display:none;">
                    </div>
                    <div id="errorLevels"></div>
                </div>
                <div class='form-checkout mt-4'>
                    <div class='label-form'>
                        <label>{{ __('Années d\'expérience') }}</label>
                        <select name="experience_years" id="experience_years">
                            <option> {{ __('Années d\'expérience') }}</option>
                            <option value="1">1 {{ __('année') }}</option>
                            <option value="2">2 {{ __('années') }}</option>
                            <option value="3">3{{ __(' années') }}</option>
                            <option value="4">4 {{ __('années') }}</option>
                        </select>
                    </div>
                    <div id="errorExperience"></div>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{ route('recruitment.partials.address') }}"  class='btn-step btn-sec'>{{ __('Retour') }}</a>
                <a href="" onclick="submitStep3()" class='btn-step btn-pri'>{{ __('Suivant') }}</a>
            </div>
        </form>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Résumé') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ session('recruitment.step1.reason')}}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ session('recruitment.step2.address')}}</span></p>
            </div>
        </div>
    </div>

    <script>
       
         function changevalue() 
         {   
            let schoolLevel = document.getElementById('school_level').value;
            let otherInput = document.getElementById('schoollevel2');
            if(schoolLevel === 'Autres') 
             {
            otherInput.style.display = 'block'; // Affiche le champ "Précisez"
            otherInput.setAttribute('required', true); // Rendre le champ requis
            schoolLevel = otherInput.valeur;
            } else {
            otherInput.style.display = 'none'; // Masque le champ "Précisez"
            otherInput.value = ''; // Réinitialise la valeur du champ
            otherInput.removeAttribute('required'); // Retirer le caractère requis
             }


         }

         function submitStep3() {
    // Récupérer les cases cochées
    let checkboxes = document.querySelectorAll('input[name="option-1"]:checked');
    let selectedkills = Array.from(checkboxes).map(checkbox => checkbox.value);

    // Vérifier si au moins une option est sélectionnée
    if (selectedkills.length === 0) {
        document.getElementById('errorKills').innerHTML = 'Veuillez sélectionner au moins une compétence.';
        return;
    } else {
        document.getElementById('errorKills').innerHTML = ''; // Effacer l'erreur si corrigée
    }

    // Vérifier le niveau d'étude
    let schoolLevel = document.getElementById('school_level').value;
    let otherInput = document.getElementById('schoollevel2');
    if (schoolLevel === 'Autres') {
        schoolLevel = otherInput.value.trim();
    }

    // Vérifier les années d'expérience
    let experienceYears = document.getElementById('experience_years').value;

    /* Préparer les données pour l'envoi
    const data = {
        kills: selectedkills,
        schoollevel: schoolLevel || null,
        experienceyears: experienceYears || null,
    };*/
    alert(selectedkills);
    // Envoi des données en AJAX
    fetch('{{ route('recruitment.partials.choise-kills') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        },
        body: JSON.stringify({kills: selectedkills, schoollevel: schoolLevel, experienceyears: experienceYears})
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route('recruitment.partials.date-hour') }}';
            } else if (data.errors) {
                // Gérer les erreurs spécifiques
                document.getElementById('errorKills').innerHTML = data.errors.kills?.join(', ') || '';
                document.getElementById('errorLevels').innerHTML = data.errors.schoollevel || '';
                document.getElementById('errorExperience').innerHTML = data.errors.experienceyears || '';
            } else {
                document.getElementById('errorKills').innerHTML = "Une erreur inattendue est survenue.";
            }
        })
        .catch(error => {
            console.error('Erreur lors de l\'envoi des données:', error);
            document.getElementById('errorKills').innerHTML = "Erreur lors du traitement de la requête.";
        });
}
                
                
                /*else {
                    // Afficher des erreurs spécifiques si elles sont renvoyées par le backend
                    /if (data.errors) {
                        document.getElementById('errorKills').innerHTML = data.errors.selectedOptions || '';
                        document.getElementById('errorLevels').innerHTML = data.errors.schoolLevel || '';
                        document.getElementById('errorExperience').innerHTML = data.errors.experienceYears || '';
                    }
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors de l\'envoi des données.');
            });*/
        
    </script>
    
    
    
@endsection