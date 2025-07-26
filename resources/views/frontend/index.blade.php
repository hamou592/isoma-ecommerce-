@extends('layouts.frontend')
@section('title', 'Nos Produits')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8 text-center">Nos Produits</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ url('/') }}" class="flex flex-wrap items-center justify-center gap-4 mb-6">
        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Prix min" class="border px-3 py-2 rounded w-32">
        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Prix max" class="border px-3 py-2 rounded w-32">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Filtrer</button>
        @if(request()->has('min_price') || request()->has('max_price'))
        <a href="{{ url('/') }}" class="text-red-500 underline ml-2">Réinitialiser</a>
        @endif
    </form>

    <!-- Product Cards -->
    <div class="grid md:grid-cols-3 gap-8">
        @forelse($products as $product)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($product->photo)
                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
            @endif
            <div class="p-4 space-y-2 text-center">
                <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                <div class="flex justify-center gap-4 mt-4">
                    <a href="{{ url('/product/' . $product->id . '/details') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Détails</a>
                    <a href="{{ url('/product/' . $product->id . '/order') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Commander</a>
                </div>
            </div>
        </div>
        @empty
        <p class="col-span-3 text-center text-red-500">Aucun produit trouvé pour ce filtre.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
