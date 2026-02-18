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

    <div class="content">
        <h2>Login</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div style="color:red">{{ $error }}</div>
            @endforeach
        @endif

        @if (session('success'))
            <div style="color:green">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div style="color:red">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login_submit') }}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" placeholder="Email"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit">Login</button>
                        <div>
                            <a href="{{ route('forget_password') }}">Forgot password</a>
                        </div>
                        
                    </td>
                </tr>
            </table>
        </form>

    </div>

    <footer>
        © {{ date('Y') }} RealEstateHomes
    </footer>

</body>

</html>
