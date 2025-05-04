<!DOCTYPE html>
<html>
<head>
    <title>Edit Parking Space</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Parking Space</h1>
        
        <form method="POST" action="{{ route('parking-spaces.update', $parkingSpace->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="space_number" class="form-label">Space Number</label>
                <input type="text" class="form-control" id="space_number" name="space_number" 
                       value="{{ $parkingSpace->space_number }}" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" 
                       value="{{ $parkingSpace->location }}" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_available" name="is_available" 
                       value="1" {{ $parkingSpace->is_available ? 'checked' : '' }}>
                <label class="form-check-label" for="is_available">Available</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('parking-spaces.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>