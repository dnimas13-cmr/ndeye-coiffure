@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 7')
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
                <a href="{{ route('particulier/diagnostic-disponible') }}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
                <a href="{{ route('particulier/reservation-de-la-session') }}" class='btn-step btn-pri'>{{ __('Book my session') }}</a>
            </div>
            <!-- END CONTENT CLASSIC -->
        </div>
        <div class='step-container right-step'>
            <div class='bg-shadow'>
                <h4 class='text-center  mt-3'>{{ __('Summary') }}</h4>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('At my address') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>21 rue de la Liberté, 75001 Paris</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('In the coming days') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('Mercredi 19 décembre à 11h') }}</span></p>
                <p class='d-flex'><img src="{{ asset('img/icons/UserColor.png') }}" class='icon-step'> <span>Woman x1</span></p>
                <p class='d-flex justify-content-between'>
                    <span class='d-block'><img src="{{ asset('img/icons/BasketColor.png') }}" class='icon-step'> <span class='d-inline'>{{ __('Box braids') }}</span></span> 
                    <span class='d-block'><span class='gray-p'>35,99 €</span></span>
                </p>
                <p class='d-flex justify-content-between none'>
                    <span class='d-block'>-25% <span class='color'>Club</span></span>
                    <span class='d-block'><span class='color'>-7,50 €</span></span>
                </p>
                <p class='d-flex justify-content-between none mt-4'>
                    <span class='d-block'>Total</span>
                    <span class='d-block'><span class='font-p'>28,49 €</span></span>
                </p>

                <div>
                    <div class="test d-flex">
                        <div>
                            <span class='text-switch'>Vous économisez <b>7,50 €</b> avec <a href='#'>le Club</a> </span> 
                        </div>
                        <div class="switch d-flex" role="radiogroup">
                            <input type="radio" class="switch-input" name="view" value="week" id="week" role="radio" aria-checked="false" tabindex="-1">
                            <label for="week" class="switch-label switch-label-off">N</label>
                            <input type="radio" class="switch-input" name="view" value="month" id="month" checked role="radio" aria-checked="true" tabindex="0">
                            <label for="month" class="switch-label switch-label-on">Y</label>
                            <span style="" class="switch-selection"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection