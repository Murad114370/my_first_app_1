<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Welcome to ParkXpress</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Preload background image for better performance -->
    <link rel="preload" href="{{ asset('images/6910-N.-Mesa-finished--scaled.webp') }}" as="image">
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            /* Background with overlay gradient and your image */
            background: 
                linear-gradient(rgba(102, 126, 234, 0.85), rgba(118, 75, 162, 0.85)),
                url('{{ asset("images/img1.webp") }}') no-repeat center center fixed;
            background-size: cover;
            color: white;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .welcome-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            max-width: 800px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: white;
            color: #667eea;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            margin: 10px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .features {
            text-align: left;
            margin: 2rem 0;
        }
        .features li {
            margin-bottom: 1rem;
            position: relative;
            padding-left: 30px;
        }
        .features li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #4ade80;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .welcome-container {
                padding: 2rem;
            }
            body {
                background-attachment: scroll; /* Remove fixed background on mobile */
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1 class="text-4xl font-bold mb-6">Welcome to ParkXpress</h1>
        <p class="text-xl mb-8">Your premium parking management solution</p>
        
        <div class="features">
            <h2 class="text-2xl font-semibold mb-4">Getting Started</h2>
            <ul>
                <li>Read the Documentation</li>
                <li>Watch video tutorials</li>
                <li>Explore the dashboard</li>
                <li>Configure your parking lots</li>
            </ul>
        </div>
        
        <div class="mt-8">
            <a href="{{ route('login') }}" class="btn">Log In</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        </div>
        
        <div class="mt-8 text-sm opacity-80">
            <p>ParkXpress v{{ app()->version() }}</p>
        </div>
    </div>
</body>
</html>