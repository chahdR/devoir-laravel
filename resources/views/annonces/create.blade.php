@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Nouvelle Annonce</h1>
    <a href="{{ route('annonces.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="titre" class="form-label">Titre *</label>
                    <input type="text" class="form-control @error('titre') is-invalid @enderror" 
                           id="titre" name="titre" value="{{ old('titre') }}" required>
                    @error('titre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="type" class="form-label">Type *</label>
                    <select class="form-select @error('type') is-invalid @enderror" 
                            id="type" name="type" required>
                        <option value="">Sélectionner un type</option>
                        <option value="Appartement" {{ old('type') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                        <option value="Maison" {{ old('type') == 'Maison' ? 'selected' : '' }}>Maison</option>
                        <option value="Villa" {{ old('type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                        <option value="Magasin" {{ old('type') == 'Magasin' ? 'selected' : '' }}>Magasin</option>
                        <option value="Terrain" {{ old('type') == 'Terrain' ? 'selected' : '' }}>Terrain</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ville" class="form-label">Ville *</label>
                    <input type="text" class="form-control @error('ville') is-invalid @enderror" 
                           id="ville" name="ville" value="{{ old('ville') }}" required>
                    @error('ville')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="superficie" class="form-label">Superficie (m²) *</label>
                    <input type="number" step="0.01" class="form-control @error('superficie') is-invalid @enderror" 
                           id="superficie" name="superficie" value="{{ old('superficie') }}" required>
                    @error('superficie')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="prix" class="form-label">Prix (DH) *</label>
                    <input type="number" step="0.01" class="form-control @error('prix') is-invalid @enderror" 
                           id="prix" name="prix" value="{{ old('prix') }}" required>
                    @error('prix')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="neuf" class="form-label">État *</label>
                    <select class="form-select @error('neuf') is-invalid @enderror" 
                            id="neuf" name="neuf" required>
                        <option value="">Sélectionner l'état</option>
                        <option value="1" {{ old('neuf') == '1' ? 'selected' : '' }}>Neuf</option>
                        <option value="0" {{ old('neuf') == '0' ? 'selected' : '' }}>Ancien</option>
                    </select>
                    @error('neuf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-4">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                       id="photo" name="photo" accept="image/*">
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Formats acceptés: jpeg, png, jpg, gif, svg. Taille max: 2MB</small>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="reset" class="btn btn-outline-secondary">Réinitialiser</button>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
