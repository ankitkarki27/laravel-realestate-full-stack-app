<!DOCTYPE html>
<html>

<head>
    <title>RealEstateHomes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background: #f2f2f2;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        nav a {
            text-decoration: none;
            margin-left: 15px;
            color: black;
        }

        .content {
            padding: 40px 30px;
        }

        footer {
            background: #f2f2f2;
            text-align: center;
            padding: 10px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">RealEstateHomes</div>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('registration') }}">Register</a>
        </nav>
    </header>
    <h2>This is user dashboard</h2>
    <p>
        Welcome {{ Auth::guard(('web')->user()->name) }} to your dashboard.
    </p>
    <a href="{{ route('logout') }}">Logout </a>

    <footer>
        © {{ date('Y') }} RealEstateHomes
    </footer>

</body>

</html>
