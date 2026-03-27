<h2>This is agents profile page</h2>
@auth('agent')
    <span class="text-gray-800 dark:text-white">
         {{ Auth::guard('agent')->user()->name }}
         {{ Auth::guard('agent')->user()->email }}
         {{-- {{ Auth::guard('agent')->user()->photo }} --}}
         {{-- {{ Auth::guard('agent')->user()->name }} --}}
    </span>
@endauth

