@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 fw-bold text-primary">Ajouter un nouveau produit</h1>

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
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom du produit" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">Prix (DA)</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Prix" required>
                </div>

                <div class="mb-3">
                    <label for="taille" class="form-label fw-semibold">Taille</label>
                    <input type="text" name="taille" id="taille" class="form-control" placeholder="Taille" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label fw-semibold">Couleur</label>
                    <input type="text" name="color" id="color" class="form-control" placeholder="Couleur" required>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold">Image</label>
                    <input type="file" name="photo" id="photo" accept="image/*" class="form-control">
                </div>

                <div class="mb-4">
                    <label for="video" class="form-label fw-semibold">Vidéo</label>
                    <input type="file" name="video" id="video" accept="video/*" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        ⬅ Retour
                    </a>
                    <button type="submit" class="btn btn-primary">
                        💾 Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
