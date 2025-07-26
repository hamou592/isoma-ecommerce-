@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 fw-bold text-primary">Liste des Produits</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('products.create') }}" class="btn btn-success px-4 py-2">➕ Ajouter un produit</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center shadow-sm bg-white">
            <thead class="table-primary">
                <tr>
                    <th>Image</th>
                    <th>Vidéo</th>
                    <th>Nom</th>
                    <th>Prix (DA)</th>
                    <th>Couleur</th>
                    <th>Taille</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <!-- Image -->
                    <td style="width: 150px;">
                        @if($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}" 
                                 alt="Product Image" 
                                 class="img-thumbnail clickable-image" 
                                 style="height: 80px; width: 120px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/120x80?text=No+Image" 
                                 alt="No Image" 
                                 class="img-thumbnail">
                        @endif
                    </td>

                    <!-- Video -->
                    <td style="width: 200px;">
                        @if($product->video)
                            <video width="180" height="100" controls>
                                <source src="{{ asset('storage/' . $product->video) }}" type="video/mp4">
                                Votre navigateur ne prend pas en charge la vidéo.
                            </video>
                        @else
                            <span class="text-muted">Aucune vidéo</span>
                        @endif
                    </td>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->taille }}</td>

                    <td>
                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">👁 Voir</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">✏️ Modifier</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')" class="d-inline-block">
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
