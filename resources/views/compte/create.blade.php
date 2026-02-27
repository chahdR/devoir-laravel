<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer compte</title>

    @vite(['resources\css\app.css','resources\js\app.js'])
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class=" card-header text-primary text-center">
            <h4 class="mb-0">creer compte</h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="">
                @csrf

                <!-- Nom -->
                <div class="mb-3">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input type="text" name="nom" class="form-control">
                    @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
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

                <!-- Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        créer
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>


</body>
</html>