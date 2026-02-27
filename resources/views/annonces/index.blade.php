@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">Liste des annonces</h4>
                <a href="{{ route('annonces.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Nouvelle annonce
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Ville</th>
                            <th>Superficie</th>
                            <th>Prix</th>
                            <th>État</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($annonces as $annonce)
                        <tr>

                            {{-- PHOTO --}}
                            <td>
                                @if($annonce->photo)
                                    <img src="{{ asset('storage/'.$annonce->photo) }}"
                                         class="img-thumbnail photo-thumb"
                                         data-bs-toggle="modal"
                                         data-bs-target="#photoModal{{ $annonce->id }}">
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="photoModal{{ $annonce->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('storage/'.$annonce->photo) }}"
                                                         class="img-fluid rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="https://via.placeholder.com/70x50?text=No+Image"
                                         class="img-thumbnail photo-thumb">
                                @endif
                            </td>

                            <td>{{ $annonce->titre }}</td>
                            <td>{{ Str::limit($annonce->description, 80) }}</td>

                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $annonce->type }}
                                </span>
                            </td>

                            <td>{{ $annonce->ville }}</td>
                            <td>{{ number_format($annonce->superficie, 0) }} m²</td>
                            <td>{{ number_format($annonce->prix, 0) }} DH</td>

                            <td>
                                @if($annonce->neuf)
                                    <span class="badge bg-success">Neuf</span>
                                @else
                                    <span class="badge bg-secondary">Ancien</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('annonces.show', $annonce->id) }}" 
                                   class="btn btn-sm btn-secondary">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('annonces.edit', $annonce->id) }}" 
                                   class="btn btn-sm btn-success">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('annonces.destroy', $annonce->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Êtes-vous sûr ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                Aucune annonce trouvée.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $annonces->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

</div>
@endsection