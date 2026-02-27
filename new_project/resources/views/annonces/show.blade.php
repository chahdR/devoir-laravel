@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Détails de l'Annonce</h1>
    <a href="{{ route('annonces.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                @if($annonce->photo)
                    <img src="{{ asset('storage/' . $annonce->photo) }}" 
                         alt="{{ $annonce->titre }}" 
                         class="img-fluid rounded"
                         style="max-width: 100%;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                         style="height: 300px;">
                        <p class="text-muted mb-0">Aucune photo disponible</p>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="mb-3">{{ $annonce->titre }}</h2>
                
                <div class="mb-3">
                    <span class="badge bg-info fs-6">{{ $annonce->type }}</span>
                    @if($annonce->neuf)
                        <span class="badge bg-success fs-6">Neuf</span>
                    @else
                        <span class="badge bg-secondary fs-6">Ancien</span>
                    @endif
                </div>
                
                <div class="mb-4">
                    <h4 class="text-primary">{{ number_format($annonce->prix, 2) }} DH</h4>
                </div>
                
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Ville:</strong></td>
                        <td>{{ $annonce->ville }}</td>
                    </tr>
                    <tr>
                        <td><strong>Superficie:</strong></td>
                        <td>{{ number_format($annonce->superficie, 2) }} m²</td>
                    </tr>
                    <tr>
                        <td><strong>Créé le:</strong></td>
                        <td>{{ $annonce->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Modifié le:</strong></td>
                        <td>{{ $annonce->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
                
                <div class="mb-3">
                    <strong>Description:</strong>
                    <p class="mt-2">{{ $annonce->description }}</p>
                </div>
                
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('annonces.edit', $annonce->id) }}" 
                       class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Modifier
                    </a>
                    <form action="{{ route('annonces.destroy', $annonce->id) }}" 
                          method="POST" 
                          class="d-inline"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
