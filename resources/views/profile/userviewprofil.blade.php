@extends('layouts.app')
@section('title', 'profil utilisateur')
@section('content')

<div class="container">
    <div class="profile-header">
        <h1>Profil de {{ $barber->user->name }}</h1>
        <p>{{ $barber->bibliography }}</p>
        <img src="{{ $barber->cni_photo ?? asset('default-avatar.png') }}" alt="Photo du coiffeur" class="profile-image">
    </div>
    
        <div class="profile-details mt-4">
            <h2>Compétences</h2>
            <ul>
                @foreach ($kills as $kill)
                    <li>{{ $kill->kills }} - {{ $kill->killsdescription }}</li>
                @endforeach
            </ul>
    
            <h2>Formations</h2>
            <ul>
                @foreach ($formations as $formation)
                    <li>{{ $formation }}</li>
                @endforeach
            </ul>
    
            <h2>Coiffures réalisables</h2>
            <div class="hairstyles-grid grid grid-cols-2 gap-4">
                @foreach ($hairstyles as $hairstyle)
                    <div class="hairstyle-card p-4 shadow-md rounded-lg">
                        <h3 class="text-lg font-bold">{{ $hairstyle->hairstyle_name }}</h3>
                        <p><strong>Prix :</strong> {{ $hairstyle->hairstyle_price }} €</p>
                        <p><strong>Catégorie :</strong> {{ $hairstyle->category ?? 'Non spécifiée' }}</p>
                        <p><strong>Temps de réalisation :</strong> {{ $hairstyle->realisation_time }} minutes</p>
                        <p><strong>Description :</strong> {{ $hairstyle->hairstyle_description ?? 'Aucune description' }}</p>
                        @if ($hairstyle->hairstyle_photos)
                            <img src="{{ asset('storage/' . $hairstyle->hairstyle_photos) }}" alt="Photo de la coiffure" class="rounded-md mt-2">
                        @endif
                    </div>
                @endforeach
            </div>
    
            <h2>Expérience et Avis</h2>
            <p>Années d'expérience : {{ $barber->year_of_experience }}</p>
            <p>Nombre d'avis positifs : {{ $barber->positive_reviews }}</p>
        </div>
        <!-- Boutons pour les actions -->
    <div class="mt-5 d-flex gap-3">
        <a href="{{ route('recruitment.store', ['barber_id' => $barber->id]) }}" class="btn btn-primary">
            Recruter ce coiffeur
        </a>
        
        <a href="{{ route('messaging.view', ['barber_id' => $barber->id]) }}" class="btn btn-secondary">
            Envoyer un message
        </a>
    </div>
    </div>
@endsection