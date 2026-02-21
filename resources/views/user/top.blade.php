 <header>
     <div class="logo">RealEstateHomes</div>
     <nav>
         <a href="{{ route('home') }}">Home</a>
         <a href="{{ route('about') }}">About</a>
         {{-- @if (auth()->check()) --}}
         @auth
             <a href="{{ route('home') }}">{{ auth()->user()->name }}</a>
             <a href="{{ route('profile') }}">Profile </a>
             <a href="{{ route('logout') }}">Logout </a>
         @else
             <a href="{{ route('login') }}">Login</a>
             <a href="{{ route('registration') }}">Register</a>
         @endauth

     </nav>
 </header>
