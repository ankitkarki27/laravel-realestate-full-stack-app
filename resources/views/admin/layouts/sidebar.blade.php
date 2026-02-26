<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full lg:translate-x-0'"
    class="fixed left-0 top-0 z-50 flex h-screen w-[200px] flex-col
           border-r border-gray-200 bg-white px-5
           dark:border-gray-800 dark:bg-black
           lg:static lg:translate-x-0 transition-transform duration-300">

    <!-- sidebar header/logo -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-4 pb-7 sidebar-header">
        <a href="{{ route('admin_dashboard') }}">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="h-12" />
            </span>
            <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'" src="{{ asset('logo/logo.png') }}"
                alt="Logo" />
        </a>
    </div>

    <div class="flex flex-col overflow-y-auto no-scrollbar">
        <ul class="flex flex-col gap-4 mb-6">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin_dashboard') }}"
                    class="menu-item group flex items-center gap-2 p-2 rounded-lg transition-colors"
                    :class="{{ $page === 'dashboard' ? "'bg-gray-100 text-blue-600'" : "'text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800'" }}">
                    <i class="fa fa-home w-5"></i>
                    <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">Dashboard</span>
                </a>
            </li>

            <!-- Profile -->
            <li x-data="{ open: {{ $page === 'profile' ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="menu-item group flex items-center gap-2 w-full p-2 rounded-lg justify-between transition-colors"
                    :class="{{ $page === 'profile' ? "'bg-gray-100 text-blue-600'" : "'text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800'" }}">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-user w-5"></i>
                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">Profile</span>
                    </div>
                    <i class="fas fa-chevron-down ml-auto"
                        :class="open ? 'rotate-180 transition-transform' : 'transition-transform'"></i>
                </button>

                <!-- Dropdown -->
                <ul x-show="open" x-transition class="flex flex-col gap-1 mt-2 pl-8" style="display: none;">
                    <li>
                        <a href="{{ route('admin_profile') }}"
                            class="menu-dropdown-item group p-2 rounded-lg transition-colors"
                            :class="{{ $page === 'profile' ? "'bg-gray-100 text-blue-600'" : "'text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800'" }}">
                            <i class="fa-solid fa-user"></i>
                            Profile
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
