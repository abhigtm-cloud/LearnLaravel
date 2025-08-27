<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-50 backdrop-blur-sm bg-white/95 dark:bg-gray-900/95">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left Side - Logo & Navigation -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <span class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Medium</span>
                    </a>
                </div>

                <!-- Navigation Links (for authenticated users) -->
                @auth
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium text-sm transition-colors duration-200">
                        Home
                    </a>
                    <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium text-sm transition-colors duration-200">
                        Following
                    </a>
                    <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium text-sm transition-colors duration-200">
                        Explore
                    </a>
                </div>
                @endauth
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                
                <!-- Guest Navigation -->
                @guest
                <div class="hidden sm:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium text-sm transition-colors duration-200">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-sm font-medium rounded-full hover:bg-gray-800 dark:hover:bg-gray-100 transition-all duration-200 transform hover:scale-105">
                        Get started
                    </a>
                </div>
                @endguest

                <!-- Authenticated Navigation -->
                @auth
                <div class="hidden sm:flex items-center space-x-4">
                    <!-- Search Icon -->
                    <button class="p-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <!-- Write Button -->
                    <a href="{{ route('post.create') }}" class="inline-flex items-center gap-2 px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium text-sm transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Write
                    </a>

                    <!-- Notifications -->
                    <button class="p-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM10.07 14C10.28 13.95 10.5 13.96 10.72 14.03C11.38 14.23 12 14.7 12 15.5V16.5C12 17.05 11.55 17.5 11 17.5C10.45 17.5 10 17.05 10 16.5V15.5C10 15.22 10.03 14.95 10.07 14M12 2C13.1 2 14 2.9 14 4V10C14 11.1 13.1 12 12 12C10.9 12 10 11.1 10 10V4C10 2.9 10.9 2 12 2Z" />
                        </svg>
                    </button>

                    <!-- Profile Dropdown -->
                    <x-dropdown align="right" width="64">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-3 p-1 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all duration-200">
                                <x-user-avatar :user="auth()->user()" class="w-8 h-8" />
                                <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>

                            <div class="py-2">
                                <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profile
                                </x-dropdown-link>

                                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    My Stories
                                </a>

                                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Settings
                                </a>
                            </div>

                            <div class="py-2 border-t border-gray-200 dark:border-gray-700">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" 
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="flex items-center gap-3 px-4 py-3 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Sign out
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth

                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button @click="open = ! open" class="p-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        
        @guest
        <div class="px-4 py-4 space-y-3">
            <a href="{{ route('login') }}" class="block text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium py-2">
                Sign in
            </a>
            <a href="{{ route('register') }}" class="block w-full text-center py-3 px-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-medium rounded-lg">
                Get started
            </a>
        </div>
        @endguest

        @auth
        <div class="px-4 py-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                Home
            </a>
            <a href="{{ route('post.create') }}" class="block py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                Write
            </a>
            <a href="{{ route('profile.edit') }}" class="block py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                Profile
            </a>
        </div>

        <div class="px-4 py-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3 mb-3">
                <x-user-avatar :user="auth()->user()" class="w-10 h-10" />
                <div>
                    <div class="font-medium text-gray-900 dark:text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
                </div>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left py-2 text-red-600 dark:text-red-400">
                    Sign out
                </button>
            </form>
        </div>
        @endauth
    </div>
</nav>
