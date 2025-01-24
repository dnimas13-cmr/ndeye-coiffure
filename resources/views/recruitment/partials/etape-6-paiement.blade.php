@extends('layouts.app')

@section('title', 'RDV recruteur - Etape 6')
@section('content')
    <div class='rdv-step-particulier step-1 d-flex'>
        <div class='step-container left-step'>
            <div class='bg-shadow'>
                <h4 class='text-center'>{{ __('Is it all good? Book your hairdressing session') }}</h4>
                <div class='form-checkout'>
                    <div class='label-form'>
                        <label>{{ __('Specify your hair type') }}</label>
                        <select>
                            <option>{{ __('Straight hair') }}</option>
                            <option>{{ __('Straight hair 2') }}</option>
                            <option>{{ __('Straight hair 3') }}</option>
                            <option>{{ __('Straight hair 4') }}</option>
                            <option>{{ __('Straight hair 5') }}</option>
                        </select>
                    </div>
                    <div class='mt-4'>
                        <h4>{{ __('Your payment method') }}</h4>
                        <div class='d-flex justify-content-between line-checkout'>
                            <div class='d-flex align-items-center'>
                                <div><img src="{{ asset('img/icons/MasterCard.png') }}" class='icon-step'></div>
                                <div><span class='d-block'>**** **** **** 4855</span> <span class='d-block color-gray'>Exp. 09/28</span></div>
                            </div>
                            <div>
                                <input type='radio' name='payment_method'>
                            </div>
                        </div>
                        <div class='d-flex justify-content-between line-checkout'>
                            <div class='d-flex align-items-center'>
                                <div><img src="{{ asset('img/icons/Visa.png') }}" class='icon-step'></div>
                                <div><span class='d-block'>**** **** **** 4855</span> <span class='d-block color-gray'>Exp. 09/28</span></div>
                            </div>
                            <div>
                                <input type='radio' name='payment_method'>
                            </div>
                        </div>
                        <div class='d-flex justify-content-between line-checkout none'>
                            <div class='d-flex'>
                                <div><img src="{{ asset('img/icons/AnotherCArd.png') }}"> Ajouter une carte</div>
                            </div>
                            <div>
                                <input type='radio' name='payment_method' checked>
                            </div>
                        </div>

                        <div class='another-card-content'>
                            <div class='mb-3'>
                                <label>{{ __('Name') }}</label>
                                <input type='text' name='' placeholder="{{ __('Name on bank card') }}">
                            </div>
                            <div class='mb-3'>
                                <label>{{ __('Bank card number') }}</label>
                                <div class='input-img'>
                                    <img src="{{ asset('img/icons/CreditCard.png') }}" class='icon-card-input'>
                                    <input type='number' name='' placeholder="{{ __('Number') }}">
                                </div>
                            </div>
                            <div class='mb-3 d-flex justify-content-between card-year'>
                                <div>
                                    <label>{{ __('MM / YY') }}</label>
                                    <input type="text" id="expiry-date" placeholder="MM / YY" pattern="^(0[1-9]|1[0-2]) \/ (0[0-9]|[1-9])$">
                                </div>
                                <div>
                                    <label>{{ __('CVC') }}</label>
                                    <input type='text' name='' placeholder="{{ __('Security code') }}">
                                </div>
                            </div>
                            <div class='mb-2'>
                                    <input type="radio" name='remeber_choice' checked>
                                    <span>{{ __('Remember this card, save it in my list of cards') }}</span>
                            </div>
                        </div>

                        <div class='class-checkout d-flex mt-4 align-items-center'>
                            <div><img src="{{ asset('img/icons/annulation-icon.png') }}" class='icon-checkout-pub'></div>
                            <div>
                                <h4>{{ __('Free cancellation') }}</h4>
                                <p>{{ __('Up to 24 hours before each session.') }}</p>
                            </div>
                        </div>
                        <div class='class-checkout d-flex align-items-center'>
                            <div><img src="{{ asset('img/icons/expert-icon.png') }}" class='icon-checkout-pub'></div>
                            <div>
                                <h4>{{ __('Hairdressing experts') }}</h4>
                                <p>{{ __('Only professionals selected by us.') }}</p>
                            </div>
                        </div>
                        <div class='class-checkout d-flex align-items-center'>
                            <div><img src="{{ asset('img/icons/excellent-icon.png') }}" class='icon-checkout-pub'></div>
                            <div>
                                <h4>{{ __('4.8/5 - Excellent') }}</h4>
                                <p>{{ __('Average score out of 336,493 hairdressing sessions.') }}</p>
                            </div>
                        </div>
                        <div class='confirm-cgu'>
                            {{ __('By selecting the button below and booking, you accept our ') }} <a href='#'>{{ __('Terms and Conditions') }}</a> {{ __('and waive your right of withdrawal.') }}
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class='btn-step mt-4 d-flex'>
                <a href="{{ route('recruteur/choix-de-la-civilite') }}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="{{ route('recruteur/reservation-de-la-session') }}" class='btn-step btn-pri'>{{ __('Book my session') }}</a>
            </div>
            <!-- END CONTENT CLASSIC -->
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center  mt-3'>{{ __('Summary') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('Helping with a wedding') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>83000 Toulon</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ScissorsColor.png') }}" class='icon-step'> <span>Coiffure événementielle, Lissage</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('Mercredi 19 décembre à 11h') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/UserColor.png') }}" class='icon-step'> <span>Jade Camara</span></p>
            </div>
            <div class='bg-shadow mt-3 profil-recruteur'>
                <div class='img-recrue'><img src="{{ asset('img/rdv/recrue-3.png') }}" alt="{{ __('Recrue') }}"></div>
                <div class='content-recrue'>
                    <h5 class='mt-4 text-bold'>Jade Camara</h5>
                    <div class='feat d-flex line-bottom-4'>
                        <div><img src="{{ asset('img/icons/Clock.png') }}" class='img-normal'> <span>4.8</span></div>
                        <div><img src="{{ asset('img/icons/MapPin.png') }}" class='img-normal'> <span>Toulon</span></div>
                        <div><img src="{{ asset('img/icons/Scissors.png') }}" class='img-normal'> <span>56 missions</span></div>
                    </div>
                    <h6 class='mt-3'>Bio</h6>
                    <p class='mt-3'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus lacus in quam laoreet, eget finibus orci pharetra. Sed molestie leo eget urna egestas
                         tristique. Pellentesque habitant morbi tristique senectus et netus 
                         et malesuada fames ac turpis egestas. Donec nec luctus tortor, at 
                         sagittis orci.
                    </p>
                    <h5 class='mt-3'>Compétences</h5>
                    <div class='compet mt-3'>
                        <span class='competence'>Coiffure événementielle</span>
                        <span class='competence'>Lissage</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection