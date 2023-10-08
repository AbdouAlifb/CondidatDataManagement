<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Candidate Details</title>
    <style>
  
        .custom-card {
            background-color: #f8f9fa; 
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }


        .candidate-name {
            font-size: 24px;
            font-weight: bold;
        }

        .card-text {
            margin-top: 10px;
        }
    </style>
</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('diagnostics.index')}}">Gestion des diagnostic</a>
        <a class="navbar-brand" href="{{route('questions.index')}}">Gestion des Question</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

                <div class="container">
                    <h2>Create a New Question</h2>
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
    <label for="category">Category:</label>
    <select name="category" id="category" class="form-control" required>
        <option value="Ressource Humaine">Ressource Humaine</option>
        <option value="Gestion de Production">Gestion de Production</option>
        <option value="Administration">Administration</option>
        <option value="Finance">Finance</option>
        <option value="Marketing">Marketing</option>
        <option value="Informatique">Informatique</option>
        <option value="Logistique">Logistique</option>
        <option value="Vente">Vente</option>
        <option value="Communication">Communication</option>
        <option value="Juridique">Juridique</option>
        <option value="Qualité">Qualité</option>
        <!-- Add more options as needed -->
    </select>
</div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
