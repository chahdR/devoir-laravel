@extends('layouts.app')

@section('content')
<h1>Bienvenue sur notre catalogue</h1>
<p>Découvrez nos meilleurs produits informatiques.</p>
<a href="{{ route('products.index') }}" class="btn btn-primary">Voir les produits</a>
@endsection
