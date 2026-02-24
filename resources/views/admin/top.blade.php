 <header>
     <div class="logo">RealEstateHomes</div>
     <nav>
         <a href="">Home</a>
         <a href="">About</a>

         @auth('admin')
             <a href="{{ route('admin_profile') }}">Profile </a> |
             <a href="{{ route('admin_dashboard') }}">Dashboard </a>|
             {{-- <a href="{{ route('logout') }}">Logout </a> --}}
         @else
             <a href="{{ route('admin_login') }}">Admin</a>
           
         @endauth

     </nav>
 </header>
