<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Chattogram Parking Spaces</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 2rem;
            color: #1a1a1a;
        }
        h1 {
            color: #4a6baf;
            text-align: center;
            margin-bottom: 2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 1rem;
            border: 1px solid #e0e0e0;
            text-align: left;
        }
        th {
            background: #4a6baf;
            color: white;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #f1f3f7;
        }
        button {
            background: #4a6baf;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            transition: all 0.2s;
        }
        button:hover {
            background: #3a5a9f;
            transform: translateY(-1px);
        }
        .delete-btn {
            background: #dc3545;
        }
        .delete-btn:hover {
            background: #c82333;
        }
        .status-available {
            color: #28a745;
            font-weight: bold;
        }
        .status-occupied {
            color: #dc3545;
            font-weight: bold;
        }
        .status-maintenance {
            color: #ffc107;
            font-weight: bold;
        }
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>

    <h1><i class="fas fa-parking"></i> Chattogram Parking Spaces Management</h1>

    <table>
        <thead>
            <tr>
                <th>Index</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example 1 -->
            <tr>
                <td>1</td>
                <td>Agrabad Commercial Area</td>
                <td class="status-available">Available</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 2 -->
            <tr>
                <td>2</td>
                <td>GEC Circle</td>
                <td class="status-occupied">Occupied</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 3 -->
            <tr>
                <td>3</td>
                <td>Nasirabad</td>
                <td class="status-available">Available</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 4 -->
            <tr>
                <td>4</td>
                <td>2 No. Gate</td>
                <td class="status-maintenance">Maintenance</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 5 -->
            <tr>
                <td>5</td>
                <td>Port Connecting Road</td>
                <td class="status-available">Available</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 6 -->
            <tr>
                <td>6</td>
                <td>Halishahar Residential Area</td>
                <td class="status-occupied">Occupied</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 7 -->
            <tr>
                <td>7</td>
                <td>Patenga Sea Beach</td>
                <td class="status-available">Available</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 8 -->
            <tr>
                <td>8</td>
                <td>Chawkbazar</td>
                <td class="status-occupied">Occupied</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 9 -->
            <tr>
                <td>9</td>
                <td>EPZ Area</td>
                <td class="status-maintenance">Maintenance</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
            
            <!-- Example 10 -->
            <tr>
                <td>10</td>
                <td>Bayezid Bostami</td>
                <td class="status-available">Available</td>
                <td>
                    <div class="action-buttons">
                        <button><i class="fas fa-edit"></i> Edit</button>
                        <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        // Enhanced edit functionality
        document.querySelectorAll('button').forEach(btn => {
            if (btn.textContent.includes('Edit')) {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const location = row.cells[1].textContent;
                    const status = row.cells[2].textContent;
                    
                    const newLocation = prompt('Edit location:', location);
                    if (newLocation !== null && newLocation.trim() !== '') {
                        row.cells[1].textContent = newLocation.trim();
                    }
                    
                    const newStatus = prompt('Edit status (Available/Occupied/Maintenance):', status);
                    if (newStatus !== null) {
                        const statusClass = 
                            newStatus === 'Available' ? 'status-available' :
                            newStatus === 'Occupied' ? 'status-occupied' :
                            'status-maintenance';
                        
                        row.cells[2].textContent = newStatus;
                        row.cells[2].className = statusClass;
                    }
                });
            }
            
            if (btn.classList.contains('delete-btn')) {
                btn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this parking space?')) {
                        this.closest('tr').remove();
                        // In real app, would send AJAX request to delete from database
                        
                        // Reindex remaining rows
                        document.querySelectorAll('tbody tr').forEach((row, index) => {
                            row.cells[0].textContent = index + 1;
                        });
                    }
                });
            }
        });
    </script>

</body>
</html>