@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 5')
@section('content')

    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow'>
                <h4>{{ __('Qui va se faire coiffer ?') }}</h4>
                <form id="step5Form">
                    @csrf
                <div class='civilite-steps d-flex align-items-center'>
                    <div class='thumb-civil'><img src="{{ asset('img/rdv/woman.png') }}" class='img-civil-step'></div>
                    <div class='title-civil'>{{ __('Coiffure femme') }}</div>
                    <div class='input-civil'> <div class='custom-control custom-radio'> <input type='checkbox' class="custom-control-input" id='female' name='female_haircut' value='Coiffure femme'> </div> </div>
                </div>

                <div class='civilite-steps d-flex align-items-center'>
                    <div class='thumb-civil'><img src="{{ asset('img/rdv/men.png') }}" class='img-civil-step'></div>
                    <div class='title-civil'>{{ __('Coiffure homme') }}</div>
                    <div class='input-civil'> <div class='custom-control custom-radio'> <input type='checkbox' class="custom-control-input" id='male' name='male_haircut' value='Coiffure homme'> </div> </div>
                </div>

                <div class='civilite-steps d-flex align-items-center'>
                    <div class='thumb-civil'><img src="{{ asset('img/rdv/child.png') }}" class='img-civil-step'></div>
                    <div class='title-civil'>{{ __('Coiffure enfant') }}</div>
                    <div class='input-civil'><div class='custom-control custom-radio'><input type='checkbox' class="custom-control-input" id='child' name='child_haircut' value='Coiffure enfant'> </div></div>
                </div>
                <div id="haircutError" style="color: red;"></div>
            </div>

            <div class='bg-shadow mt-4'>
                <h4>{{ __('Quelle est votre type de cheveux ?') }}</h4>
                <div class='select-civil'>
                    <select>
                        <option>{{ __('Type of hair') }}</option>
                        <option>{{ __('Type of hair 1') }}</option>
                        <option>{{ __('Type of hair 2') }}</option>
                        <option>{{ __('Type of hair 3') }}</option>
                        <option>{{ __('Type of hair 4') }}</option>
                        <option>{{ __('Type of hair 5') }}</option>
                        <option>{{ __('Type of hair 6') }}</option>
                    </select>
                    <div class='civil-bg'>
                        <img src="{{ asset('img/bg-civil.png') }}" class='bg-position'>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div>{{ __('Get a personalised diagnosis thanks to our AI.') }}</div>
                            <div><a href='#'><span>{{ __('Start diagnosis') }}<span> <img src="{{ asset('img/icons/Btn 2.png') }}"></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{route('appointments.partials.step4')}}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="#" onclick="submitStep5()"class='btn-step btn-pri'>{{ __('Next') }}</a>
            </div>
        </form>
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Résumé') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('At my address') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>21 rue de la Liberté, 75001 Paris</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('In the coming days') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('Mercredi 19 décembre à 11h') }}</span></p>
            </div>
        </div>
    </div>

    <script>
        function submitStep5() {
            const femaleCheckbox = document.getElementById('female');
            const maleCheckbox = document.getElementById('male');
            const childCheckbox = document.getElementById('child');
            
            const female = femaleCheckbox.checked ? femaleCheckbox.value : null;
            const male = maleCheckbox.checked ? maleCheckbox.value : null;
            const child = childCheckbox.checked ? childCheckbox.value : null;
        
            // Vérifier si au moins une option est cochée
            if (!female && !male && !child) {
                document.getElementById('haircutError').textContent = 'Veuillez choisir au moins une catégorie';
                return; // Stopper la fonction si rien n'est cochée
            }
        
            // Préparer les données à envoyer
            const data = {
                female_haircut: female,
                male_haircut: male,
                child_haircut: child
            };
        
            // Envoyer les données en POST avec fetch
            fetch('{{ route("appointments.partials.step5") }}', {
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
                    window.location.href = '{{ route("appointments.partials.step6") }}';
                } else {
                    document.getElementById('haircutError').innerHTML = Object.values(data.errors).join(', ');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('haircutError').innerHTML = "Erreur lors du traitement de la requête.";
            });
        }
        </script>
        

    @endsection
