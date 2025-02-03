@extends('layouts.app')
@section('title', 'Messagerie')
@section('content')
<div class="container">
    <h1>Envoyer un message à {{ $barber->user->name }}</h1>

    <form action="{{ route('messaging.send') }}" method="POST">
        @csrf
        <input type="hidden" name="barber_id" value="{{ $barber->id }}">

        <div class="form-group mt-3">
            <label for="message">Votre message :</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
    </form>
</div>
@endsection