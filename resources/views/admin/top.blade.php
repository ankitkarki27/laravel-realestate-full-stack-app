 <!DOCTYPE html>
<html>

<head>
    <title>RealEstateHomes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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
     <div class="logo">
         <a href="{{ route('admin_dashboard') }}">RealEstateHomes</a>
     </div>
     <nav>
         <a href="">Home</a>
         <a href="">About</a>

         @auth('admin')
             <a href="{{ route('admin_profile') }}">Profile </a> |
             <a href="{{ route('admin_dashboard') }}">Dashboard </a>|
             <a href="{{ route('admin_logout') }}">Logout</a>
         @else
             <a href="{{ route('admin_login') }}">Admin</a>
         @endauth

     </nav>
 </header>

<div class="content">
    @yield('content')
</div>

</body>
</html>
