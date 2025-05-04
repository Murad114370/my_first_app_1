<!DOCTYPE html>
<html>
<head>
    <title>Parking Spaces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Parking Spaces Management</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('parking-spaces.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Parking Space
            </a>
            <a href="{{ route('parking-spaces.availability') }}" class="btn btn-info ml-2">
                <i class="fas fa-search"></i> Check Availability
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>All Parking Spaces</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Space Number</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parkingSpaces as $space)
                        <tr>
                            <td>{{ $space->space_number }}</td>
                            <td>{{ $space->location }}</td>
                            <td>
                                <span class="badge bg-{{ $space->is_available ? 'success' : 'danger' }}">
                                    {{ $space->is_available ? 'Available' : 'Occupied' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('parking-spaces.show', $space->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('parking-spaces.edit', $space->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('parking-spaces.destroy', $space->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>