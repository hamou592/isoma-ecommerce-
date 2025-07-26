@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 fw-bold text-primary">Liste des Clients</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('clients.create') }}" class="btn btn-success px-4 py-2">➕ Ajouter un client</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center shadow-sm bg-white">
            <thead class="table-primary">
                <tr>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->number }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-outline-primary btn-sm">👁 Voir</a>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-outline-warning btn-sm">✏️ Modifier</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">🗑 Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
