<h2>Admin reset Password</h2>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

@if (session('success'))
    {{ session('success') }}
@endif

@if (session('error'))
    {{ session('error') }}
@endif


<form action="{{ route('admin_reset_password_submit',[$token,$email]) }}" method="post">
    @csrf
    <table>
        <tr>
            <td>password: </td>
            <td><input type="password" name="password" placeholder="password">
            </td>
        </tr>

        <tr>
            <td>Retype password: </td>
            <td><input type="password" name="confirm_password" placeholder="Confirm password">
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <button type="submit">Submit</button>
                <div>
                    <a href="{{ route('admin_login') }}">Back to the login page </a>
                </div>
            </td>
        </tr>


    </table>
</form>
