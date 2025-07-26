@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 fw-bold text-info">Détails du produit</h1>

    <div class="card shadow-lg mx-auto" style="max-width: 900px;">
        <div class="row g-0">
            <!-- Product Image -->
            <div class="col-md-5">
                @if($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" class="img-fluid rounded-start clickable-image" alt="Product Image" style="height: 100%; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/400x400?text=No+Image" class="img-fluid rounded-start" alt="No Image">
                @endif
            </div>

            <!-- Product Info -->
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title text-primary">{{ $product->name }}</h3>
                    <p class="card-text"><strong>Prix :</strong> {{ $product->price }} DA</p>
                    <p class="card-text"><strong>Couleur :</strong> {{ $product->color }}</p>
                    <p class="card-text"><strong>Taille :</strong> {{ $product->taille }}</p>

                    @if($product->video)
                        <div class="mt-3">
                            <label class="fw-bold">Vidéo :</label>
                            <video controls class="w-100 rounded shadow" style="max-height: 300px; object-fit: cover;">
                                <source src="{{ asset('storage/' . $product->video) }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture vidéo.
                            </video>
                        </div>
                    @endif

                    <div class="mt-4 d-flex justify-content-between">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">⬅ Retour</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-white">✏️ Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-center">
            <div class="modal-body p-0">
                <img id="modalImage" class="w-100 rounded" style="max-height: 80vh;" />
            </div>
        </div>
    </div>
</div>

<!-- Image Popup Script -->
<script>
    document.querySelectorAll('.clickable-image').forEach(img => {
        img.addEventListener('click', () => {
            document.getElementById('modalImage').src = img.src;
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        });
    });
</script>
@endsection
