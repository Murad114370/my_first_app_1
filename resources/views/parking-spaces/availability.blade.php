<!DOCTYPE html>
<html>
<head>
    <title>Parking Availability</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Available Parking Spaces</h1>
        
        <div class="card">
            <div class="card-body">
                @if($availableSpaces->isEmpty())
                    <div class="alert alert-warning">
                        No available parking spaces at this time.
                    </div>
                @else
                    <ul class="list-group">
                        @foreach($availableSpaces as $space)
                        <li class="list-group-item">
                            {{ $space->space_number }} - {{ $space->location }}
                            <form action="{{ route('parking-spaces.reserve', $space->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning float-end">
                                    Reserve
                                </button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        
        <a href="{{ route('parking-spaces.index') }}" class="btn btn-primary mt-3">Back to All Spaces</a>
    </div>
</body>
</html>