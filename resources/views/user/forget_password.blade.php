<h2>Admin Forget Password</h2>

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


<form action="{{ route('forget_password_submit') }}" method="post">
    @csrf
    <table>
        <tr>
            <td>Email: </td>
            <td><input type="text" name="email" placeholder="Email">
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <button type="submit">Submit</button>
                <div>
                    <a href="{{ route('login') }}">Back to the login page </a>
                </div>
            </td>
        </tr>


    </table>
</form>
