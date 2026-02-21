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
        <h2>Registration</h2>

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

        <form action="{{ route('profile_submit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table>

                <tr>
                    <td>Exisiting Photo: </td>
                    <td>
                        @if(Auth::guard('web')->user()->photo == null)
                        No Photo Found
                        @else
                        <img src="{{ asset('uploads/'.Auth::guard()->user()->photo) }}" alt="user photo "
                        style="width:100px;height:auto;"/>
                        @endif
                    </td>
                </tr>
                {{-- <tr>
                    <td>Changed Photo: </td>
                    <td><input type="file" name="photo" value="{{ Auth::guard('web')->user()->name }}"></td>
                </tr> --}}
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" value="{{ Auth::guard('web')->user()->name }}"></td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" value="{{ Auth::guard('web')->user()->email }}"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit">Update</button>
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
