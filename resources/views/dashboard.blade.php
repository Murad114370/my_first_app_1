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
            <a href="#" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <!-- <a href="#" class="nav-link">
                <i class="fas fa-user-shield"></i>
                Admin
            </a> -->
            <a href="{{ route('admin.index') }}" class="nav-link">
    <i class="fas fa-user-shield"></i>
    Admin
</a>


<a href="{{ route('admin.reservations') }}" class="active">
    <i class="fas fa-history"></i> Reservation History
</a>

        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
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
            <a href="#" class="nav-link">
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
                <h1>Dashboard</h1>
                <div class="user-menu">
                    <span>Welcome, {{ Auth::user()->name }}</span>
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
            </div>

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
</body>
</html>