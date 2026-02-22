<h2>Admin dash</h2>
<h3>{{  Auth::guard('admin')->user()->name }}</h3>
<h3>{{  Auth::guard('admin')->user()->email }}</h3>
<a href="{{ route('admin_profile') }}">profile</a>
<a href="{{ route('admin_logout') }}">Logout</a>