@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 fw-bold text-warning">Modifier le client</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li class="small">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mx-auto" style="max-width: 600px;">
        <div class="card-body p-4 bg-white">
            <form action="{{ route('clients.update', $client) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nom</label>
                    <input type="text" name="name" id="name" value="{{ $client->name }}" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="number" class="form-label fw-semibold">Numéro de téléphone</label>
                    <input type="text" name="number" id="number" value="{{ $client->number }}" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">⬅ Retour</a>
                    <button type="submit" class="btn btn-warning text-white">✏️ Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
