<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter etudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Ajouter un etudiant</h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="/etudiant/store">
                @csrf

                <!-- Nom -->
                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control">
                    @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Prenom -->
                <div class="mb-3">
                    <label class="form-label">Prenom</label>
                    <input type="text" name="prenom" class="form-control">
                    @error('prenom') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Confirmation -->
                <div class="mb-3">
                    <label class="form-label">Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <!-- Type Bac -->
                <div class="mb-3">
                    <label class="form-label d-block">Type de Bac</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type_bac" value="marocain">
                        <label class="form-check-label">Marocain</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type_bac" value="international">
                        <label class="form-check-label">International</label>
                    </div><br>
                    @error('type_bac') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Filiere -->
                <div class="mb-3">
                    <label class="form-label">Filiere</label>
                    <select name="filiere" class="form-select">
                        <option value="">-- Choisir --</option>
                        <option value="SMI">SMI</option>
                        <option value="SMA">SMA</option>
                        <option value="SEG">SEG</option>
                        <option value="PC">PC</option>
                    </select>
                    @error('filiere') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        Ajouter
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>