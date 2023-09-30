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
<body>
<div class="container mt-5">
    <h1 class="text-center">Candidate Details</h1>
    <hr>

    <div class="card custom-card">
        <div class="card-body">
            <h5 class="card-title candidate-name">{{ $candidate->first_name }} {{ $candidate->last_name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $candidate->email }}</p>
            <p class="card-text"><strong>About You:</strong> {{ $candidate->about_you }}</p>
        </div>
    </div>

    <a href="{{ route('data.index') }}" class="btn btn-primary mt-3">Back to Candidate List</a>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
