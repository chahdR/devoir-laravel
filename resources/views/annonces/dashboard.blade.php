@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Gestion Immobilière</h2>
    <a href="{{ route('annonces.index') }}" class="btn btn-primary px-4">
        <i class="bi bi-plus-lg"></i> Nouvelle annonce
    </a>
</div>

<div class="row g-4">

    {{-- Carte 1 --}}
    <div class="col-md-3">
        <div class="card dashboard-card">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-primary-subtle text-primary">
                    <i class="bi bi-house-door-fill"></i>
                </div>
                <div class="ms-3">
                    <p class="text-muted mb-1 small">Total Annonces</p>
                    <h4 class="fw-bold mb-0">{{ number_format($stats['total']) }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Carte 2 --}}
    <div class="col-md-3">
        <div class="card dashboard-card">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-success-subtle text-success">
                    <i class="bi bi-cash-stack"></i>
                </div>
                <div class="ms-3">
                    <p class="text-muted mb-1 small">Valeur Totale (DH)</p>
                    <h4 class="fw-bold mb-0">{{ number_format($stats['prix_total'],2) }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Carte 3 --}}
    <div class="col-md-3">
        <div class="card dashboard-card">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-warning-subtle text-warning">
                    <i class="bi bi-calculator"></i>
                </div>
                <div class="ms-3">
                    <p class="text-muted mb-1 small">Prix Moyen</p>
                    <h4 class="fw-bold mb-0">{{ number_format($stats['prix_moyen'],2) }} DH</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Carte 4 --}}
    <div class="col-md-3">
        <div class="card dashboard-card">
            <div class="card-body d-flex align-items-center">
                <div class="icon-box bg-info-subtle text-info">
                    <i class="bi bi-rulers"></i>
                </div>
                <div class="ms-3">
                    <p class="text-muted mb-1 small">Superficie Totale</p>
                    <h4 class="fw-bold mb-0">{{ number_format($stats['superficie_totale'],2) }} m²</h4>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection