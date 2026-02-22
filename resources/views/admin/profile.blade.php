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

    {{-- @include('user.top') --}}

    <div class="content">
        <h2>Profile</h2>

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

        <form action="{{ route('admin_profile_submit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table>

                <tr>
                    <td>Existing Photo: </td>
                    <td>
                        @if (Auth::guard('admin')->user()->photo == null)
                            No Photo Found
                        @else
                            <img src="{{ asset('uploads/' . Auth::guard('admin')->user()->photo) }}" alt="admin photo "
                                style="width:100px;height:auto;" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Change Photo: </td>
                    <td>
                        <input type="file" name="photo" />
                    </td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" value="{{ Auth::guard('admin')->user()->name }}"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" value="{{ Auth::guard('admin')->user()->email }}" readonly></td>
                </tr>
                
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="confirm_password"></td>
                    </tr>


                <tr>
                    <td colspan="2">
                        <button type="submit">Save Changes</button>
                    </td>
                </tr>
            </table>
        </form>

    </div>

    {{-- @include('user.bottom') --}}

</body>

</html>
