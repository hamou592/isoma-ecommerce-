@extends('layouts.frontend')
@section('title', 'Détails - ' . $product->name)

@section('content')
<div class="max-w-3xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6 text-center">Détails du produit</h1>
    <div class="bg-white rounded shadow p-6">
        @if($product->photo)
            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded mb-4">
        @endif

        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
        <p><strong>Prix:</strong> {{ $product->price }} DA</p>
        <p><strong>Taille:</strong> {{ $product->taille }}</p>
        <p><strong>Couleur:</strong> {{ $product->color }}</p>

        @if($product->video)
            <div class="mt-4">
                <video controls class="w-full rounded">
                    <source src="{{ asset('storage/' . $product->video) }}" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture vidéo.
                </video>
            </div>
        @endif

        <a href="{{ url('/product/' . $product->id . '/order') }}" class="mt-6 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Commander</a>
    </div>
</div>
@endsection
