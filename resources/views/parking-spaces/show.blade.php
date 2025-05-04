<!DOCTYPE html>
<html>
<head>
    <title>Parking Space Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Parking Space Details</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Space Number: {{ $parkingSpace->space_number }}</h5>
                <p class="card-text">
                    <strong>Location:</strong> {{ $parkingSpace->location }}<br>
                    <strong>Status:</strong> 
                    <span class="badge bg-{{ $parkingSpace->is_available ? 'success' : 'danger' }}">
                        {{ $parkingSpace->is_available ? 'Available' : 'Occupied' }}
                    </span>
                </p>
                <a href="{{ route('parking-spaces.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
</body>
</html>