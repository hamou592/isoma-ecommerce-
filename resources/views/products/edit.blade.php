@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 fw-bold text-warning">Modifier le produit</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li class="small">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mx-auto" style="max-width: 700px;">
        <div class="card-body p-4 bg-white">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nom</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">Prix (DA)</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="taille" class="form-label fw-semibold">Taille</label>
                    <input type="text" name="taille" id="taille" value="{{ $product->taille }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label fw-semibold">Couleur</label>
                    <input type="text" name="color" id="color" value="{{ $product->color }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold">Image</label>
                    <input type="file" name="photo" id="photo" accept="image/*" class="form-control">
                    @if($product->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $product->photo) }}" class="img-thumbnail" style="max-height: 120px;">
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="video" class="form-label fw-semibold">Vidéo</label>
                    <input type="file" name="video" id="video" accept="video/*" class="form-control">
                    @if($product->video)
                        <div class="mt-2">
                            <video controls style="width: 100%; max-height: 200px;" class="rounded shadow">
                                <source src="{{ asset('storage/' . $product->video) }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture vidéo.
                            </video>
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">⬅ Retour</a>
                    <button type="submit" class="btn btn-warning text-white">✏️ Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
