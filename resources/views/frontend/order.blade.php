@extends('layouts.frontend')
@section('title', 'Commander ' . $product->name)

@section('content')
<div class="max-w-xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6 text-center">Commander: {{ $product->name }}</h1>
    
    <form action="{{ url('/product/' . $product->id . '/order') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        <div>
            <label class="block mb-1 font-semibold">Nom Complet</label>
            <input type="text" name="name" required class="w-full border rounded px-3 py-2" />
        </div>
        <div>
            <label class="block mb-1 font-semibold">Numéro de Téléphone</label>
            <input type="text" name="number" required class="w-full border rounded px-3 py-2" />
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Envoyer via WhatsApp
        </button>
    </form>
</div>
@endsection
