<h2>Admin login</h2>

@if($errors->any())
    @foreach($errors->all() as $error)
        <div style="color:red">{{ $error }}</div>  
    @endforeach
@endif

@if (session('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div style="color:red">{{ session('error') }}</div>
@endif

<form action="{{ route('admin_login_submit') }}" method="post">
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
                    <a href="{{ route('admin_forget_password') }}">Forgot password</a>
                </div>
            </td>  
        </tr>
    </table>
</form>
