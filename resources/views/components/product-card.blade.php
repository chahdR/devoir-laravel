<div class="card h-100 shadow-sm">
    <img src="{{ asset('images/' . $product['image']) }}" 
         class="card-img-top p-3" 
         style="height: 180px; object-fit: contain">

    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $product['title'] }}</h5>
        <p class="text-success fw-semibold">{{ $product['price'] }} MAD</p>
        <a href="{{ route('products.show', $product['id']) }}" class="btn btn-primary mt-auto">
            Voir
        </a>
    </div>
</div>
