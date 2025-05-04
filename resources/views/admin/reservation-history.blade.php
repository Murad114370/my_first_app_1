<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Parking Reservation History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        :root {
            --primary: #4a6baf;
            --primary-dark: #3a5a9f;
            --danger: #dc3545;
            --danger-dark: #c82333;
            --warning: #ffc107;
            --success: #28a745;
            --gray: #6c757d;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #1a1a1a;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        h1 {
            color: var(--primary);
            margin: 0;
        }
        
        .admin-nav {
            display: flex;
            gap: 1rem;
        }
        
        .admin-nav a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.2s;
        }
        
        .admin-nav a:hover, .admin-nav a.active {
            background-color: var(--primary);
            color: white;
        }
        
        .filters {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: flex-end;
        }
        
        .filter-group {
            flex: 1;
            min-width: 200px;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #555;
        }
        
        input, select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
        }
        
        button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }
        
        .btn-danger {
            background: var(--danger);
        }
        
        .btn-danger:hover {
            background: var(--danger-dark);
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background: rgba(74, 107, 175, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
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
            background: var(--primary);
            color: white;
            font-weight: 600;
            position: sticky;
            top: 0;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: #f1f3f7;
        }
        
        .status {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        
        .status-completed {
            background-color: #d4edda;
            color: var(--success);
        }
        
        .status-active {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .status-cancelled {
            background-color: #f8d7da;
            color: var(--danger);
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            gap: 0.5rem;
        }
        
        .pagination button {
            padding: 0.5rem 1rem;
            min-width: 40px;
        }
        
        .pagination button.active {
            background: var(--primary-dark);
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .filters {
                flex-direction: column;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            th, td {
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-parking"></i> Chattogram Parking Admin</h1>
            <nav class="admin-nav">
                <a href="parking-spaces.html"><i class="fas fa-car"></i> Parking Spaces</a>
                <a href="reservation-history.html" class="active"><i class="fas fa-history"></i> Reservation History</a>
                <a href="users.html"><i class="fas fa-users"></i> Users</a>
                <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </header>
        
        <div class="filters">
            <div class="filter-group">
                <label for="search">Search</label>
                <input type="text" id="search" placeholder="Search by user, vehicle or space...">
            </div>
            
            <div class="filter-group">
                <label for="status">Status</label>
                <select id="status">
                    <option value="">All Statuses</option>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="date-range">Date Range</label>
                <input type="text" id="date-range" placeholder="Select date range...">
            </div>
            
            <button type="button" id="apply-filters"><i class="fas fa-filter"></i> Apply Filters</button>
            <button type="button" class="btn-outline" id="reset-filters"><i class="fas fa-sync-alt"></i> Reset</button>
        </div>
        
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>User</th>
                        <th>Vehicle</th>
                        <th>Parking Space</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Reservation 1 -->
                    <tr>
                        <td>#RES-1001</td>
                        <td>Abdul Karim</td>
                        <td>Chattogram Metro-Ga 12345</td>
                        <td>Agrabad Commercial (Space 1)</td>
                        <td>2023-06-15 09:30</td>
                        <td>2023-06-15 12:45</td>
                        <td>3h 15m</td>
                        <td>৳195.00</td>
                        <td><span class="status status-completed">Completed</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 2 -->
                    <tr>
                        <td>#RES-1002</td>
                        <td>Fatima Begum</td>
                        <td>Chattogram Metro-Kha 67890</td>
                        <td>GEC Circle (Space 3)</td>
                        <td>2023-06-15 14:00</td>
                        <td>2023-06-15 18:30</td>
                        <td>4h 30m</td>
                        <td>৳270.00</td>
                        <td><span class="status status-completed">Completed</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 3 -->
                    <tr>
                        <td>#RES-1003</td>
                        <td>Rahim Uddin</td>
                        <td>Chattogram Metro-Cha 45678</td>
                        <td>Nasirabad (Space 2)</td>
                        <td>2023-06-16 10:15</td>
                        <td>2023-06-16 11:45</td>
                        <td>1h 30m</td>
                        <td>৳90.00</td>
                        <td><span class="status status-cancelled">Cancelled</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 4 -->
                    <tr>
                        <td>#RES-1004</td>
                        <td>Nusrat Jahan</td>
                        <td>Chattogram Metro-U 98765</td>
                        <td>2 No. Gate (Space 5)</td>
                        <td>2023-06-16 13:00</td>
                        <td>2023-06-16 17:00</td>
                        <td>4h 00m</td>
                        <td>৳240.00</td>
                        <td><span class="status status-completed">Completed</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 5 -->
                    <tr>
                        <td>#RES-1005</td>
                        <td>Kamal Hossain</td>
                        <td>Chattogram Metro-Gha 54321</td>
                        <td>Port Connecting Road (Space 4)</td>
                        <td>2023-06-17 08:00</td>
                        <td>2023-06-17 16:00</td>
                        <td>8h 00m</td>
                        <td>৳480.00</td>
                        <td><span class="status status-completed">Completed</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 6 -->
                    <tr>
                        <td>#RES-1006</td>
                        <td>Sabina Yasmin</td>
                        <td>Chattogram Metro-Jha 13579</td>
                        <td>Halishahar (Space 7)</td>
                        <td>2023-06-17 11:30</td>
                        <td>2023-06-17 14:30</td>
                        <td>3h 00m</td>
                        <td>৳180.00</td>
                        <td><span class="status status-completed">Completed</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 7 -->
                    <tr>
                        <td>#RES-1007</td>
                        <td>Imran Khan</td>
                        <td>Chattogram Metro-Ta 24680</td>
                        <td>Patenga Sea Beach (Space 1)</td>
                        <td>2023-06-18 09:00</td>
                        <td>2023-06-18 18:00</td>
                        <td>9h 00m</td>
                        <td>৳540.00</td>
                        <td><span class="status status-active">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                                <button class="btn-danger" title="Cancel Reservation"><i class="fas fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 8 -->
                    <tr>
                        <td>#RES-1008</td>
                        <td>Farhana Akter</td>
                        <td>Chattogram Metro-Da 11223</td>
                        <td>Chawkbazar (Space 2)</td>
                        <td>2023-06-18 10:45</td>
                        <td>2023-06-18 12:45</td>
                        <td>2h 00m</td>
                        <td>৳120.00</td>
                        <td><span class="status status-active">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                                <button class="btn-danger" title="Cancel Reservation"><i class="fas fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 9 -->
                    <tr>
                        <td>#RES-1009</td>
                        <td>Mohammad Ali</td>
                        <td>Chattogram Metro-Tha 33445</td>
                        <td>EPZ Area (Space 3)</td>
                        <td>2023-06-19 08:30</td>
                        <td>2023-06-19 17:30</td>
                        <td>9h 00m</td>
                        <td>৳540.00</td>
                        <td><span class="status status-cancelled">Cancelled</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Sample Reservation 10 -->
                    <tr>
                        <td>#RES-1010</td>
                        <td>Shirin Akter</td>
                        <td>Chattogram Metro-Pa 55667</td>
                        <td>Bayezid Bostami (Space 4)</td>
                        <td>2023-06-19 13:15</td>
                        <td>2023-06-19 15:15</td>
                        <td>2h 00m</td>
                        <td>৳120.00</td>
                        <td><span class="status status-completed">Completed</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-outline" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn-outline" title="Print Receipt"><i class="fas fa-print"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="pagination">
            <button disabled><i class="fas fa-angle-left"></i></button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button><i class="fas fa-angle-right"></i></button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize date range picker
        flatpickr("#date-range", {
            mode: "range",
            dateFormat: "Y-m-d",
            allowInput: true
        });
        
        // Filter functionality
        document.getElementById('apply-filters').addEventListener('click', function() {
            const searchTerm = document.getElementById('search').value.toLowerCase();
            const statusFilter = document.getElementById('status').value;
            const dateRange = document.getElementById('date-range').value;
            
            document.querySelectorAll('tbody tr').forEach(row => {
                const rowText = row.textContent.toLowerCase();
                const rowStatus = row.querySelector('.status').textContent.toLowerCase();
                const rowDate = row.cells[4].textContent.split(' ')[0]; // Get just the date part
                
                let matchesSearch = searchTerm === '' || rowText.includes(searchTerm);
                let matchesStatus = statusFilter === '' || rowStatus.includes(statusFilter);
                let matchesDate = true;
                
                if (dateRange) {
                    const dates = dateRange.split(' to ');
                    const startDate = dates[0];
                    const endDate = dates[1] || dates[0];
                    matchesDate = rowDate >= startDate && rowDate <= endDate;
                }
                
                row.style.display = (matchesSearch && matchesStatus && matchesDate) ? '' : 'none';
            });
        });
        
        // Reset filters
        document.getElementById('reset-filters').addEventListener('click', function() {
            document.getElementById('search').value = '';
            document.getElementById('status').value = '';
            document.getElementById('date-range').value = '';
            
            document.querySelectorAll('tbody tr').forEach(row => {
                row.style.display = '';
            });
        });
        
        // Cancel reservation
        document.querySelectorAll('.btn-danger').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to cancel this reservation?')) {
                    const row = this.closest('tr');
                    const statusCell = row.querySelector('.status');
                    
                    statusCell.textContent = 'Cancelled';
                    statusCell.className = 'status status-cancelled';
                    
                    // Remove cancel button after cancellation
                    this.remove();
                    
                    // In real app, would send AJAX request to update status in database
                }
            });
        });
    </script>
</body>
</html>