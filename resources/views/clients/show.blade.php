@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 fw-bold text-info">Détails du Client</h1>

    <div class="card shadow-lg mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h3 class="card-title text-primary">{{ $client->name }}</h3>

            <p class="card-text">
                <strong>Téléphone :</strong> {{ $client->number }}
            </p>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">⬅ Retour</a>
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning text-white">✏️ Modifier</a>
            </div>
        </div>
    </div>
</div>
@endsection
