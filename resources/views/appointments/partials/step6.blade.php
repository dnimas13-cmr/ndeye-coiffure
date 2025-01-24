@extends('layouts.app')

@section('title', 'RDV Particuliers - Etape 6')
@section('content')
<!-- POPup -->
<div class='popup-diagnostic-element' id='popup-diagnostic'>
    <div class="popup-content">
        <div class='bg-white'>
            <span class="close" onclick="closePopup()">X</span>
            <div><img id="popup-image" src="" alt="" /></div>
            <h4 id="popup-title" class='mt-3'></h4>
            <div lass='feat d-flex'><img src="{{ asset('img/icons/Clock.png') }}"> <span id="popup-hour"></span></div>
            <div class='description-dia mt-2'>
                <p id="popup-description"></p>
                <div class='feat d-flex justify-content-between'>
                    <h5 id="popup-price"></h5>
                    <p><a href='#' class='btn-ndeye pop-diag'><img src="{{ asset('img/icons/Basket.png') }}"> <span>{{ __('Virtual fitting') }}</span></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END POPup -->


<div class='rdv-step-particulier step-1 d-flex'>
    <div class='step-container left-step'>
        <div class='bg-shadow'>
            <h4>{{ __('What hairstyles would you like?') }}</h4>
            <div class='d-flex justify-content-between mb-3'>
                <div class='link-nav d-flex align-items-center'>
                    <div class='link-navigation'><span id='btn-classic' class='active-dia'>{{ __('Classic') }}</span></div>
                    <div class='link-navigation'><span id='btn-package'>{{ __('Packages') }}</span></div>
                    <div class='link-navigation'><span id='btn-categories'>{{ __('Categories') }}</span></div>
                </div>
                <div class='link-nav-search'>
                    <form action='#' method='post' class='diagnostic-search'>
                        <div class='d-flex'><button type='submit'><img src="{{ asset('img/icons/Search.png') }}"></button> <input type='text' placeholder="{{ __('Search') }}" name=''></div>
                    </form>
                </div>
            </div>

            <!-- CONTENT CLASSIC -->
            <div class='classic-content'>
                @foreach ($hairstyles as $hairstyle)
                <form id="step6Form_{{ $hairstyle->id }}" action="{{ route('appointments.partials.step6') }}" method="POST">
                    @csrf
                <div class='item-dia d-flex mt-3' id='diagnostic-{{ $hairstyle->id }}'>
                    <div class='img-dia'>
                        @if ($hairstyle->hairstyle_photos)
                        <img src="{{ asset('storage/' . $hairstyle->hairstyle_photos) }}" alt="{{ __('Title Diagnostic') }}">
                    @endif
                    </div>
                    <div class='content-dia'>
                        <h3 class='mb-2'>{{ $hairstyle->hairstyle_name }}</h3>
                        <div class='feat d-flex justify-content-between'>
                            <div><img src="{{ asset('img/icons/Clock.png') }}"> <span>{{ $hairstyle->realisation_time }} heures</span></div>
                            <div><h5>{{ $hairstyle->hairstyle_price }}€</h5></div>
                        </div>
                        <div class='description-dia mt-2'>
                            <p>{{ $hairstyle->hairstyle_description }}
                            </p>
                        </div>
                        <div class='essayage-virtuelle'>
                            <input type="hidden" name="haircut_name" value="{{ $hairstyle->hairstyle_name }}">
                            <input type="hidden" name="haircut_price" value="{{ $hairstyle->hairstyle_price }}">
                            <input type="hidden" name="haircut_id" value="{{ $hairstyle->id }}"> 
                            <button type ="submit" class='btn-ne' > Choisir cete coiffure </button>
                        </div>
                        <div class='essayage-virtuelle'>
                            <p id='essaye-1 d-flex' class='btn-ne' 
                                    onclick="openPopup('Box braids', 'Box braids, long, thick braids in square sections, protect your hair while offering a unique, trendy style, with or without extensions, combining comfort, good looks and minimal maintenance.', '35,99€', '{{ asset('img/diagnostic/coiffure-1.png') }}', '45 heures')">
                                    <img src="{{ asset('img/icons/Camera.png') }}"> <span>{{ __('Virtual fitting') }}</span>
                            </p> 
                        </div>
                        <div id="haircutError_{{ $hairstyle->id }}"></div>
                    </div>
                </div>
            </form>
            @endforeach       

                <div class='pagination-dia d-flex justify-content-end mt-4'>
                    <div>
                        <a href='#' class='dia-prev'><img src="{{ asset('img/icons/Arrow.png') }}"></a>
                        <a href='#' class='dia-next'><img src="{{ asset('img/icons/Arrow.png') }}"></a>
                    </div>
                </div>
            </div>
            <div class='forfait-content'>Forfaits</div>
            <div class='categories-content'>Catégories</div>
        </div>
        <div class='btn-step mt-4 d-flex'>
            <a href="{{ route('appointments.partials.step5') }}" class='btn-step btn-sec'>{{ __('Previous') }}</a>
            <a href="{{ route('appointments.partials.step6') }}" class='btn-step btn-pri'>{{ __('Next') }}</a>
        </div>
        <!-- END CONTENT CLASSIC -->
    </div>
    <div class='step-container right-step'>
        <div class='bg-shadow'>
            <div class='postion-rel-pub'>
                <img src="{{ asset('img/bg-step-diagnostic.png') }}" class='img-1'>
                <div class='pub'>
                    <h4>{{ __('Find your hair style!') }}</h4>
                    <p>{{ __('Get a personalised diagnosis thanks to our AI.') }}</p>
                    <a href='#'>{{ __('Commencer le diagnostic') }} <img src="{{ asset('img/icons/Btn 2.png') }}"></a>
                </div>
            </div>
            <h4 class='text-center  mt-3'>{{ __('Summary') }}</h4>
            <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>{{ __('At my address') }}</span></p>
            <p class='d-flex'><img src="{{ asset('img/icons/MapPinColor.png') }}" class='icon-step'> <span>21 rue de la Liberté, 75001 Paris</span></p>
            <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('In the coming days') }}</span></p>
            <p class='d-flex'><img src="{{ asset('img/icons/ClockColor.png') }}" class='icon-step'> <span>{{ __('Mercredi 19 décembre à 11h') }}</span></p>
            <p class='d-flex'><img src="{{ asset('img/icons/UserColor.png') }}" class='icon-step'> <span>Woman x1</span></p>
            <p class='d-flex none'><img src="{{ asset('img/icons/BasketColor.png') }}" class='icon-step'> <span>{{ __('Box braids') }}</span></p>

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

    <script>

   /* function submitStep6(haircutId) {
    let haircut_id = parseInt(document.getElementById('id_haircut_' + haircutId).value, 10);
    let errorDiv = document.getElementById('haircutError_' + haircutId);

    if (!Number.isInteger(haircut_id)) {
        errorDiv.textContent = 'Erreur système, actualisez la page';
        return;
    }
    alert(haircut_id);
    fetch('{{ route('appointments.partials.step6') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify({ haircut_id: haircut_id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = '{{ route('appointments.review') }}';
        } else {
            errorDiv.innerHTML = Object.values(data.errors).join(', ');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        errorDiv.textContent = "Erreur lors du traitement de la requête.";
    });
} */
    function openPopup(title, description, price, image, hour) {
    document.getElementById('popup-hour').textContent = hour;
    document.getElementById('popup-title').textContent = title;
    document.getElementById('popup-description').textContent = description;
    document.getElementById('popup-price').textContent =  price;
    document.getElementById('popup-image').src = image;
    document.getElementById('popup-diagnostic').style.display = 'flex';

    const popupImage = document.getElementById('popup-image');
    popupImage.src = image;
    popupImage.alt = title;
}

function closePopup() {
    document.getElementById('popup-diagnostic').style.display = 'none';
}
</script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
    (function($) {
    let btn_classic = $('#btn-classic');
    let btn_package = $('#btn-package');
    let btn_categories = $('#btn-categories');


    let content_classic = $('.classic-content');
    let content_package = $('.forfait-content');
    let content_categories = $('.categories-content');

    btn_classic.on( "click", function() {
        content_classic.css('display', 'block');
        content_package.css('display', 'none');
        content_categories.css('display', 'none');

        btn_classic.addClass('active-dia');
        btn_package.removeClass('active-dia');
        btn_categories.removeClass('active-dia');
      } );

    btn_package.on( "click", function() {
        content_classic.css('display', 'none');
        content_package.css('display', 'block');
        content_categories.css('display', 'none');

        btn_classic.removeClass('active-dia');
        btn_package.addClass('active-dia');
        btn_categories.removeClass('active-dia');
      } );

    btn_categories.on( "click", function() {
        content_classic.css('display', 'none');
        content_package.css('display', 'none');
        content_categories.css('display', 'block');

        btn_classic.removeClass('active-dia');
        btn_package.removeClass('active-dia');
        btn_categories.addClass('active-dia');
    } );
})(jQuery);
</script>
@endsection
