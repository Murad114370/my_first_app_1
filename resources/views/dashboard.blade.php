<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ParkXpress Dashboard</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #4a6baf;
            --secondary-color: #3a5a9f;
            --accent-color: #ff7e33;
            --dark-color: #1a2035;
            --light-color: #f8f9fa;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            color: var(--dark-color);
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            background: var(--dark-color);
            color: white;
            padding: 2rem 1rem;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header img {
            height: 50px;
            margin-bottom: 1rem;
        }

        .sidebar-header h2 {
            margin: 0;
            font-size: 1.2rem;
            color: white;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .nav-link:hover, .nav-link.active {
            background: var(--primary-color);
            color: white;
        }

        /* Main Content Styles */
        .main-content {
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }

        .header h1 {
            margin: 0;
            color: var(--primary-color);
            font-size: 1.8rem;
        }

        .user-menu {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 1rem;
            font-weight: bold;
        }

        /* Dashboard Cards */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .card-title {
            margin: 0;
            font-size: 1.1rem;
            color: var(--dark-color);
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(74, 107, 175, 0.1);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .card-value {
            font-size: 2rem;
            font-weight: bold;
            margin: 0.5rem 0;
            color: var(--primary-color);
        }

        .card-description {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }

        /* Logout Button */
        .logout-btn {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }

        .logout-btn i {
            margin-right: 8px;
        }

        .logout-btn:hover {
            background: #e66a2b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 126, 51, 0.3);
        }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .welcome-banner h2 {
            margin: 0 0 0.5rem 0;
            font-size: 1.5rem;
        }

        .welcome-banner p {
            margin: 0;
            opacity: 0.9;
        }

        /* User Features Section */
        .user-features {
            display: none;
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .user-features.active {
            display: block;
        }

        .feature-section {
            margin-bottom: 2rem;
        }

        .feature-section h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
        }

        .parking-spaces {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
        }

        .parking-space {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            border: 1px solid #eee;
        }

        .space-available {
            color: var(--success-color);
            font-weight: bold;
        }

        .space-unavailable {
            color: var(--danger-color);
            font-weight: bold;
        }

        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn:hover {
            background: var(--secondary-color);
        }

        .btn-reserve {
            background: var(--accent-color);
        }

        .btn-reserve:hover {
            background: #e66a2b;
        }

        .btn-success {
            background: var(--success-color);
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-danger {
            background: var(--danger-color);
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .booking-history {
            width: 100%;
            border-collapse: collapse;
        }

        .booking-history th, .booking-history td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .booking-history th {
            background: #f8f9fa;
            font-weight: 600;
        }

        .booking-history tr:hover {
            background: #f5f7fa;
        }

        .btn-cancel {
            background: var(--danger-color);
            color: white;
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            font-size: 0.8rem;
        }

        .btn-cancel:hover {
            background: #c82333;
        }

        /* Payment Methods */
        .payment-methods {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .payment-method {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-method:hover {
            border-color: var(--primary-color);
        }

        .payment-method.active {
            border-color: var(--primary-color);
            background: rgba(74, 107, 175, 0.05);
        }

        .payment-method img {
            height: 30px;
            margin-bottom: 0.5rem;
        }

        .payment-method .radio {
            display: flex;
            align-items: center;
            margin-top: 0.5rem;
        }

        .payment-method .radio input {
            margin-right: 0.5rem;
        }

        .payment-details {
            display: none;
            padding: 1rem;
            border: 1px solid #eee;
            border-radius: 8px;
            margin-top: 1rem;
            background: #f8f9fa;
        }

        .payment-details.active {
            display: block;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-header h3 {
            margin: 0;
            color: var(--primary-color);
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                display: none;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .filter-form {
                grid-template-columns: 1fr;
            }
            
            .parking-spaces {
                grid-template-columns: 1fr;
            }
            
            .payment-methods {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/img2.jpg') }}" alt="ParkXpress Logo">
                <h2>ParkXpress</h2>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active" onclick="showDashboard()">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="fas fa-user-shield"></i>
                        Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showUserFeatures()">
                        <i class="fas fa-users"></i>
                        User
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-car"></i>
                        Parking Spaces
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-parking"></i>
                        Request Parking
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="showPaymentSection()">
                        <i class="fas fa-credit-card"></i>
                        Payment
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        Reservations
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1 id="main-title">Dashboard</h1>
                <div class="user-menu">
                    <span>Welcome, {{ Auth::user()->name }}</span>
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
            </div>

            <!-- Default Dashboard Content -->
            <div id="dashboard-content">
                <!-- Welcome Banner -->
                <div class="welcome-banner">
                    <h2>Welcome back to ParkXpress!</h2>
                    <p>Manage your parking facilities efficiently</p>
                </div>

                <!-- Dashboard Cards -->
                <div class="dashboard-grid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Available Spaces</h3>
                            <div class="card-icon">
                                <i class="fas fa-parking"></i>
                            </div>
                        </div>
                        <p class="card-value">142</p>
                        <p class="card-description">Out of 200 total spaces</p>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Today's Reservations</h3>
                            <div class="card-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                        </div>
                        <p class="card-value">68</p>
                        <p class="card-description">12% increase from yesterday</p>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Monthly Revenue</h3>
                            <div class="card-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <p class="card-value">$24,580</p>
                        <p class="card-description">Projected: $28,000</p>
                    </div>
                </div>
            </div>

            <!-- User Features Content (Hidden by default) -->
            <div id="user-features" class="user-features">
                <h2>User Parking Management</h2>
                
                <!-- 1. All Available Parking Spaces -->
                <div class="feature-section">
                    <h3>Available Parking Spaces</h3>
                    <div class="parking-spaces" id="parking-spaces-container">
                        <!-- Parking spaces will be loaded here by JavaScript -->
                    </div>
                </div>
                
                <!-- 2. Search/Filter -->
                <div class="feature-section">
                    <h3>Search & Filter Parking Spaces</h3>
                    <form class="filter-form" id="filter-form">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <select id="location" class="form-control">
                                <option value="">All Locations</option>
                                <option value="north">North Parking</option>
                                <option value="east">East Parking</option>
                                <option value="south">South Parking</option>
                                <option value="west">West Parking</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="type">Space Type</label>
                            <select id="type" class="form-control">
                                <option value="">All Types</option>
                                <option value="standard">Standard</option>
                                <option value="premium">Premium</option>
                                <option value="disabled">Disabled</option>
                                <option value="electric">Electric Vehicle</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <select id="availability" class="form-control">
                                <option value="">All</option>
                                <option value="available">Available Only</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="button" class="btn" onclick="filterSpaces()">Filter Spaces</button>
                        </div>
                    </form>
                </div>
                
                <!-- 3. Reserve Parking Slot -->
                <div class="feature-section">
                    <h3>Reserve a Parking Space</h3>
                    <form id="reservation-form">
                        <div class="filter-form">
                            <div class="form-group">
                                <label for="reserve-space">Select Space</label>
                                <select id="reserve-space" class="form-control" required>
                                    <option value="">-- Select Space --</option>
                                    <!-- Options will be populated by JavaScript -->
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="reserve-date">Date</label>
                                <input type="date" id="reserve-date" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="reserve-start">Start Time</label>
                                <input type="time" id="reserve-start" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="reserve-end">End Time</label>
                                <input type="time" id="reserve-end" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-reserve">Reserve Parking</button>
                        </div>
                    </form>
                </div>
                
                <!-- 4. Booking History -->
                <div class="feature-section">
                    <h3>Your Booking History</h3>
                    <table class="booking-history" id="booking-history">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Space</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Booking history will be loaded here by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Payment Section (Hidden by default) -->
            <div id="payment-section" class="user-features">
                <h2>Payment Methods</h2>
                
                <div class="feature-section">
                    <h3>Select Payment Method</h3>
                    <div class="payment-methods">
                        <div class="payment-method" onclick="selectPaymentMethod('bkash')">
                            <img src="./images/img3.jpg" alt="bKash">
                            <h4>bKash</h4>
                            <p>Mobile Banking</p>
                            <div class="radio">
                                <input type="radio" name="payment-method" id="bkash-radio" value="bkash">
                                <label for="bkash-radio">Pay with bKash</label>
                            </div>
                        </div>
                        
                        <div class="payment-method" onclick="selectPaymentMethod('nagad')">
                            <img src="./images/img4.png" alt="Nagad">
                            <h4>Nagad</h4>
                            <p>Mobile Banking</p>
                            <div class="radio">
                                <input type="radio" name="payment-method" id="nagad-radio" value="nagad">
                                <label for="nagad-radio">Pay with Nagad</label>
                            </div>
                        </div>
                        
                        <div class="payment-method" onclick="selectPaymentMethod('card')">
                            <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" alt="Credit Card">
                            <h4>Credit/Debit Card</h4>
                            <p>Visa, Mastercard</p>
                            <div class="radio">
                                <input type="radio" name="payment-method" id="card-radio" value="card">
                                <label for="card-radio">Pay with Card</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- bKash Payment Details -->
                    <div id="bkash-details" class="payment-details">
                        <h4>bKash Payment</h4>
                        <form id="bkash-form">
                            <div class="form-group">
                                <label for="bkash-number">bKash Number</label>
                                <input type="text" id="bkash-number" class="form-control" placeholder="01XXXXXXXXX" required>
                            </div>
                            <div class="form-group">
                                <label for="bkash-pin">bKash PIN</label>
                                <input type="password" id="bkash-pin" class="form-control" placeholder="Enter 5-digit PIN" required>
                            </div>
                            <div class="form-group">
                                <label for="bkash-amount">Amount (BDT)</label>
                                <input type="number" id="bkash-amount" class="form-control" value="100" readonly>
                            </div>
                            <button type="submit" class="btn btn-success">Pay with bKash</button>
                        </form>
                    </div>
                    
                    <!-- Nagad Payment Details -->
                    <div id="nagad-details" class="payment-details">
                        <h4>Nagad Payment</h4>
                        <form id="nagad-form">
                            <div class="form-group">
                                <label for="nagad-number">Nagad Number</label>
                                <input type="text" id="nagad-number" class="form-control" placeholder="01XXXXXXXXX" required>
                            </div>
                            <div class="form-group">
                                <label for="nagad-pin">Nagad PIN</label>
                                <input type="password" id="nagad-pin" class="form-control" placeholder="Enter 4-digit PIN" required>
                            </div>
                            <div class="form-group">
                                <label for="nagad-amount">Amount (BDT)</label>
                                <input type="number" id="nagad-amount" class="form-control" value="100" readonly>
                            </div>
                            <button type="submit" class="btn btn-success">Pay with Nagad</button>
                        </form>
                    </div>
                    
                    <!-- Card Payment Details -->
                    <div id="card-details" class="payment-details">
                        <h4>Card Payment</h4>
                        <form id="card-form">
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" id="card-number" class="form-control" placeholder="1234 5678 9012 3456" required>
                            </div>
                            <div class="form-group">
                                <label for="card-name">Cardholder Name</label>
                                <input type="text" id="card-name" class="form-control" placeholder="John Doe" required>
                            </div>
                            <div class="filter-form">
                                <div class="form-group">
                                    <label for="card-expiry">Expiry Date</label>
                                    <input type="text" id="card-expiry" class="form-control" placeholder="MM/YY" required>
                                </div>
                                <div class="form-group">
                                    <label for="card-cvv">CVV</label>
                                    <input type="text" id="card-cvv" class="form-control" placeholder="123" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="card-amount">Amount (USD)</label>
                                <input type="number" id="card-amount" class="form-control" value="10" readonly>
                            </div>
                            <button type="submit" class="btn btn-success">Pay with Card</button>
                        </form>
                    </div>
                </div>
                
                <!-- Payment History -->
                <div class="feature-section">
                    <h3>Payment History</h3>
                    <table class="booking-history" id="payment-history">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>TXN-2023-001</td>
                                <td>2023-06-15</td>
                                <td>BDT 500</td>
                                <td>bKash</td>
                                <td><span class="space-available">Completed</span></td>
                                <td><button class="btn">View</button></td>
                            </tr>
                            <tr>
                                <td>TXN-2023-002</td>
                                <td>2023-06-10</td>
                                <td>USD 15</td>
                                <td>Visa Card</td>
                                <td><span class="space-available">Completed</span></td>
                                <td><button class="btn">View</button></td>
                            </tr>
                            <tr>
                                <td>TXN-2023-003</td>
                                <td>2023-06-05</td>
                                <td>BDT 300</td>
                                <td>Nagad</td>
                                <td><span class="space-unavailable">Failed</span></td>
                                <td><button class="btn">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Reservation Confirmation Modal -->
            <div class="modal" id="reservation-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Reservation Confirmation</h3>
                        <button class="close-modal" onclick="closeModal()">&times;</button>
                    </div>
                    <div id="modal-body">
                        <!-- Modal content will be inserted here -->
                    </div>
                    <div class="form-group" style="margin-top: 1.5rem;">
                        <button class="btn" onclick="closeModal()">Close</button>
                        <button class="btn btn-reserve" onclick="confirmReservation()" style="margin-left: 0.5rem;">Confirm</button>
                    </div>
                </div>
            </div>

            <!-- Payment Confirmation Modal -->
            <div class="modal" id="payment-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="payment-modal-title">Payment Confirmation</h3>
                        <button class="close-modal" onclick="closePaymentModal()">&times;</button>
                    </div>
                    <div id="payment-modal-body">
                        <!-- Payment modal content will be inserted here -->
                    </div>
                    <div class="form-group" style="margin-top: 1.5rem;">
                        <button class="btn" onclick="closePaymentModal()">Close</button>
                        <button class="btn btn-success" onclick="confirmPayment()" style="margin-left: 0.5rem;">Confirm Payment</button>
                    </div>
                </div>
            </div>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </main>
    </div>

    <script>
        // Sample data for parking spaces
        const parkingSpaces = [
            { id: 'A101', name: 'Lot A - Space 101', location: 'north', type: 'standard', status: 'available', rate: '$5/hour' },
            { id: 'A102', name: 'Lot A - Space 102', location: 'north', type: 'standard', status: 'available', rate: '$5/hour' },
            { id: 'B205', name: 'Lot B - Space 205', location: 'east', type: 'premium', status: 'available', rate: '$8/hour' },
            { id: 'C302', name: 'Lot C - Space 302', location: 'south', type: 'standard', status: 'unavailable', rate: '$5/hour' },
            { id: 'D401', name: 'Lot D - Space 401', location: 'west', type: 'electric', status: 'available', rate: '$7/hour' },
            { id: 'E105', name: 'Lot E - Space 105', location: 'north', type: 'disabled', status: 'available', rate: '$5/hour' }
        ];

        // Sample booking history data
        const bookingHistory = [
            { id: 'BK-2023-001', space: 'Lot A - Space 101', date: '2023-06-15', time: '09:00 - 17:00', status: 'Completed', payment: 'Paid (bKash)' },
            { id: 'BK-2023-002', space: 'Lot B - Space 205', date: '2023-06-20', time: '10:00 - 18:00', status: 'Confirmed', payment: 'Pending' },
            { id: 'BK-2023-003', space: 'Lot C - Space 302', date: '2023-06-25', time: '08:00 - 16:00', status: 'Pending', payment: 'Unpaid' }
        ];

        // Current reservation data
        let currentReservation = null;
        let currentPaymentMethod = null;

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            loadParkingSpaces();
            loadBookingHistory();
            populateReservationSpaces();
            
            // Set today's date as default for reservation
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('reserve-date').value = today;
            
            // Form submission for reservation
            document.getElementById('reservation-form').addEventListener('submit', function(e) {
                e.preventDefault();
                showReservationConfirmation();
            });
            
            // Form submissions for payment methods
            document.getElementById('bkash-form').addEventListener('submit', function(e) {
                e.preventDefault();
                showPaymentConfirmation('bkash');
            });
            
            document.getElementById('nagad-form').addEventListener('submit', function(e) {
                e.preventDefault();
                showPaymentConfirmation('nagad');
            });
            
            document.getElementById('card-form').addEventListener('submit', function(e) {
                e.preventDefault();
                showPaymentConfirmation('card');
            });
        });

        // Function to load parking spaces
        function loadParkingSpaces(filter = {}) {
            const container = document.getElementById('parking-spaces-container');
            container.innerHTML = '';
            
            let filteredSpaces = [...parkingSpaces];
            
            // Apply filters if provided
            if (filter.location) {
                filteredSpaces = filteredSpaces.filter(space => space.location === filter.location);
            }
            if (filter.type) {
                filteredSpaces = filteredSpaces.filter(space => space.type === filter.type);
            }
            if (filter.availability === 'available') {
                filteredSpaces = filteredSpaces.filter(space => space.status === 'available');
            } else if (filter.availability === 'unavailable') {
                filteredSpaces = filteredSpaces.filter(space => space.status === 'unavailable');
            }
            
            // Create space cards
            filteredSpaces.forEach(space => {
                const spaceCard = document.createElement('div');
                spaceCard.className = 'parking-space';
                
                const statusClass = space.status === 'available' ? 'space-available' : 'space-unavailable';
                const statusText = space.status === 'available' ? 'Available' : 'Occupied';
                const buttonDisabled = space.status !== 'available' ? 'disabled' : '';
                
                spaceCard.innerHTML = `
                    <h4>${space.name}</h4>
                    <p>Location: ${space.location.charAt(0).toUpperCase() + space.location.slice(1)} Parking</p>
                    <p>Type: ${space.type.charAt(0).toUpperCase() + space.type.slice(1)}</p>
                    <p>Rate: ${space.rate}</p>
                    <p>Status: <span class="${statusClass}">${statusText}</span></p>
                    <button class="btn btn-reserve" ${buttonDisabled} 
                            onclick="quickReserve('${space.id}')">Reserve</button>
                `;
                
                container.appendChild(spaceCard);
            });
        }

        // Function to load booking history
        function loadBookingHistory() {
            const tbody = document.querySelector('#booking-history tbody');
            tbody.innerHTML = '';
            
            bookingHistory.forEach(booking => {
                const row = document.createElement('tr');
                
                let actionButton = '';
                if (booking.status === 'Confirmed' || booking.status === 'Pending') {
                    actionButton = `<button class="btn-cancel" onclick="cancelBooking('${booking.id}')">Cancel</button>`;
                }
                
                let paymentButton = '';
                if (booking.payment === 'Pending' || booking.payment === 'Unpaid') {
                    paymentButton = `<button class="btn" onclick="showPaymentForBooking('${booking.id}')">Pay Now</button>`;
                }
                
                row.innerHTML = `
                    <td>${booking.id}</td>
                    <td>${booking.space}</td>
                    <td>${booking.date}</td>
                    <td>${booking.time}</td>
                    <td>${booking.status}</td>
                    <td>${booking.payment}</td>
                    <td>${paymentButton} ${actionButton}</td>
                `;
                
                tbody.appendChild(row);
            });
        }

        // Function to populate reservation space dropdown
        function populateReservationSpaces() {
            const select = document.getElementById('reserve-space');
            select.innerHTML = '<option value="">-- Select Space --</option>';
            
            parkingSpaces.forEach(space => {
                if (space.status === 'available') {
                    const option = document.createElement('option');
                    option.value = space.id;
                    option.textContent = space.name;
                    select.appendChild(option);
                }
            });
        }

        // Function to filter spaces
        function filterSpaces() {
            const location = document.getElementById('location').value;
            const type = document.getElementById('type').value;
            const availability = document.getElementById('availability').value;
            
            loadParkingSpaces({
                location: location || undefined,
                type: type || undefined,
                availability: availability || undefined
            });
        }

        // Function for quick reserve
        function quickReserve(spaceId) {
            const space = parkingSpaces.find(s => s.id === spaceId);
            if (!space) return;
            
            document.getElementById('reserve-space').value = spaceId;
            
            // Set default times (current time +1 hour and +3 hours)
            const now = new Date();
            const startTime = new Date(now.getTime() + 60 * 60 * 1000); // 1 hour from now
            const endTime = new Date(now.getTime() + 3 * 60 * 60 * 1000); // 3 hours from now
            
            document.getElementById('reserve-start').value = startTime.toTimeString().substring(0, 5);
            document.getElementById('reserve-end').value = endTime.toTimeString().substring(0, 5);
            
            // Scroll to reservation form
            document.getElementById('reservation-form').scrollIntoView({ behavior: 'smooth' });
        }

        // Function to show reservation confirmation
        function showReservationConfirmation() {
            const spaceId = document.getElementById('reserve-space').value;
            const date = document.getElementById('reserve-date').value;
            const startTime = document.getElementById('reserve-start').value;
            const endTime = document.getElementById('reserve-end').value;
            
            const space = parkingSpaces.find(s => s.id === spaceId);
            if (!space) {
                alert('Please select a valid parking space');
                return;
            }
            
            if (!date || !startTime || !endTime) {
                alert('Please fill in all reservation details');
                return;
            }
            
            // Calculate duration and price
            const start = new Date(`${date}T${startTime}`);
            const end = new Date(`${date}T${endTime}`);
            const durationHours = (end - start) / (1000 * 60 * 60);
            const ratePerHour = parseFloat(space.rate.replace(/[^0-9.]/g, ''));
            const totalPrice = (durationHours * ratePerHour).toFixed(2);
            
            // Store current reservation
            currentReservation = {
                spaceId,
                spaceName: space.name,
                date,
                startTime,
                endTime,
                rate: space.rate,
                duration: durationHours.toFixed(1),
                price: totalPrice
            };
            
            // Show modal with reservation details
            const modalBody = document.getElementById('modal-body');
            modalBody.innerHTML = `
                <p><strong>Space:</strong> ${space.name}</p>
                <p><strong>Date:</strong> ${date}</p>
                <p><strong>Time:</strong> ${startTime} - ${endTime}</p>
                <p><strong>Duration:</strong> ${durationHours.toFixed(1)} hours</p>
                <p><strong>Rate:</strong> ${space.rate}</p>
                <p><strong>Total Price:</strong> $${totalPrice}</p>
                <p>Please confirm your reservation details.</p>
            `;
            
            document.getElementById('reservation-modal').style.display = 'flex';
        }

        // Function to confirm reservation
        function confirmReservation() {
            if (!currentReservation) return;
            
            // In a real app, you would send this to your backend
            console.log('Reservation confirmed:', currentReservation);
            
            // Add to booking history
            const newBookingId = `BK-2023-${(bookingHistory.length + 1).toString().padStart(3, '0')}`;
            bookingHistory.unshift({
                id: newBookingId,
                space: currentReservation.spaceName,
                date: currentReservation.date,
                time: `${currentReservation.startTime} - ${currentReservation.endTime}`,
                status: 'Confirmed',
                payment: 'Pending'
            });
            
            // Update the space status to unavailable
            const spaceIndex = parkingSpaces.findIndex(s => s.id === currentReservation.spaceId);
            if (spaceIndex !== -1) {
                parkingSpaces[spaceIndex].status = 'unavailable';
            }
            
            // Refresh displays
            loadParkingSpaces();
            loadBookingHistory();
            populateReservationSpaces();
            
            // Reset form
            document.getElementById('reservation-form').reset();
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('reserve-date').value = today;
            
            // Close modal and show success message
            closeModal();
            alert('Reservation confirmed successfully! Please proceed to payment.');
            
            // Show payment section
            showPaymentSection();
        }

        // Function to cancel booking
        function cancelBooking(bookingId) {
            if (confirm('Are you sure you want to cancel this booking?')) {
                // In a real app, you would send this to your backend
                console.log('Booking canceled:', bookingId);
                
                // Find the booking in history
                const bookingIndex = bookingHistory.findIndex(b => b.id === bookingId);
                if (bookingIndex !== -1) {
                    // Update status to Canceled
                    bookingHistory[bookingIndex].status = 'Canceled';
                    
                    // Find the space and make it available again
                    const spaceName = bookingHistory[bookingIndex].space;
                    const spaceId = spaceName.split(' - ')[1].replace('Space ', '');
                    const spacePrefix = spaceName.split(' - ')[0].replace('Lot ', '');
                    const spaceFullId = spacePrefix + spaceId;
                    
                    const spaceIndex = parkingSpaces.findIndex(s => s.id === spaceFullId);
                    if (spaceIndex !== -1) {
                        parkingSpaces[spaceIndex].status = 'available';
                    }
                    
                    // Refresh displays
                    loadParkingSpaces();
                    loadBookingHistory();
                    populateReservationSpaces();
                    
                    alert('Booking canceled successfully!');
                }
            }
        }

        // Function to close modal
        function closeModal() {
            document.getElementById('reservation-modal').style.display = 'none';
        }

        // Function to close payment modal
        function closePaymentModal() {
            document.getElementById('payment-modal').style.display = 'none';
        }

        // Function to select payment method
        function selectPaymentMethod(method) {
            // Update radio button
            document.getElementById(`${method}-radio`).checked = true;
            
            // Remove active class from all payment methods
            document.querySelectorAll('.payment-method').forEach(el => {
                el.classList.remove('active');
            });
            
            // Add active class to selected method
            event.currentTarget.classList.add('active');
            
            // Hide all payment details
            document.querySelectorAll('.payment-details').forEach(el => {
                el.classList.remove('active');
            });
            
            // Show selected payment details
            document.getElementById(`${method}-details`).classList.add('active');
            
            currentPaymentMethod = method;
        }

        // Function to show payment confirmation
        function showPaymentConfirmation(method) {
            let paymentDetails = {};
            let amount = 0;
            let currency = '';
            
            if (method === 'bkash') {
                paymentDetails = {
                    number: document.getElementById('bkash-number').value,
                    amount: document.getElementById('bkash-amount').value
                };
                amount = paymentDetails.amount;
                currency = 'BDT';
            } else if (method === 'nagad') {
                paymentDetails = {
                    number: document.getElementById('nagad-number').value,
                    amount: document.getElementById('nagad-amount').value
                };
                amount = paymentDetails.amount;
                currency = 'BDT';
            } else if (method === 'card') {
                paymentDetails = {
                    number: document.getElementById('card-number').value.slice(-4),
                    name: document.getElementById('card-name').value,
                    amount: document.getElementById('card-amount').value
                };
                amount = paymentDetails.amount;
                currency = 'USD';
            }
            
            // Show modal with payment details
            document.getElementById('payment-modal-title').textContent = `${method.charAt(0).toUpperCase() + method.slice(1)} Payment Confirmation`;
            
            const paymentModalBody = document.getElementById('payment-modal-body');
            paymentModalBody.innerHTML = `
                <p><strong>Payment Method:</strong> ${method.charAt(0).toUpperCase() + method.slice(1)}</p>
                ${method === 'card' ? `<p><strong>Card:</strong> **** **** **** ${paymentDetails.number}</p>` : ''}
                ${method !== 'card' ? `<p><strong>${method.charAt(0).toUpperCase() + method.slice(1)} Number:</strong> ${paymentDetails.number}</p>` : ''}
                <p><strong>Amount:</strong> ${currency} ${amount}</p>
                <p>Please confirm your payment details.</p>
            `;
            
            document.getElementById('payment-modal').style.display = 'flex';
        }

        // Function to confirm payment
        function confirmPayment() {
            if (!currentPaymentMethod) return;
            
            // In a real app, you would send this to your backend
            console.log('Payment confirmed with:', currentPaymentMethod);
            
            // Find the most recent booking and mark as paid
            if (bookingHistory.length > 0 && bookingHistory[0].payment === 'Pending') {
                bookingHistory[0].payment = `Paid (${currentPaymentMethod.charAt(0).toUpperCase() + currentPaymentMethod.slice(1)})`;
                bookingHistory[0].status = 'Completed';
            }
            
            // Refresh displays
            loadBookingHistory();
            
            // Close modal and show success message
            closePaymentModal();
            alert('Payment successful! Thank you for your reservation.');
        }

        // Function to show payment for a specific booking
        function showPaymentForBooking(bookingId) {
            const booking = bookingHistory.find(b => b.id === bookingId);
            if (!booking) return;
            
            // Calculate price based on booking details (simplified for demo)
            const price = booking.space.includes('Premium') ? '800' : '500';
            
            // Set amount in payment forms
            document.getElementById('bkash-amount').value = price;
            document.getElementById('nagad-amount').value = price;
            document.getElementById('card-amount').value = (parseInt(price) / 100).toFixed(2);
            
            // Show payment section
            showPaymentSection();
            
            // Scroll to payment section
            document.getElementById('payment-section').scrollIntoView({ behavior: 'smooth' });
        }

        // Function to show user features and hide dashboard
        function showUserFeatures() {
            document.getElementById('dashboard-content').style.display = 'none';
            document.getElementById('user-features').classList.add('active');
            document.getElementById('payment-section').classList.remove('active');
            document.getElementById('main-title').textContent = 'User Features';
            
            // Update active menu item
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => link.classList.remove('active'));
            event.currentTarget.classList.add('active');
        }
        
        // Function to show dashboard and hide user features
        function showDashboard() {
            document.getElementById('dashboard-content').style.display = 'block';
            document.getElementById('user-features').classList.remove('active');
            document.getElementById('payment-section').classList.remove('active');
            document.getElementById('main-title').textContent = 'Dashboard';
            
            // Update active menu item
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => link.classList.remove('active'));
            event.currentTarget.classList.add('active');
        }
        
        // Function to show payment section
        function showPaymentSection() {
            document.getElementById('dashboard-content').style.display = 'none';
            document.getElementById('user-features').classList.remove('active');
            document.getElementById('payment-section').classList.add('active');
            document.getElementById('main-title').textContent = 'Payment';
            
            // Update active menu item
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => link.classList.remove('active'));
            document.querySelector('.nav-link[onclick="showPaymentSection()"]').classList.add('active');
            
            // Select first payment method by default
            selectPaymentMethod('bkash');
        }
    </script>
</body>
</html>