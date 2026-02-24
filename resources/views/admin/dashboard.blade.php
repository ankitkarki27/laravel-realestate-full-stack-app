<!DOCTYPE html>
<html>

<head>
    <title>RealEstateHomes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
    @include('admin.top')
    {{-- <h2>Admin dash</h2> --}}
    <div class="content">
        <h3>Name: {{ Auth::guard('admin')->user()->name }}</h3>
        <h3>{{ Auth::guard('admin')->user()->email }}</h3>
        <a href="{{ route('admin_profile') }}">profile</a>
        <a href="{{ route('admin_logout') }}">Logout</a>
    </div>
</body>

</html>
