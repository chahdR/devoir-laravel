@extends('layouts.app')

@section('content')
<a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">← Retour</a>

<div class="row">
    <div class="col-md-4">
        <img src="{{ asset('images/' . $product['image']) }}" class="img-fluid">
    </div>
    <div class="col-md-8">
        <h2>{{ $product['title'] }}</h2>
        <p class="text-success fw-bold">{{ $product['price'] }} MAD</p>
        <p>{{ $product['description'] }}</p>
    </div>
</div>
@endsection
