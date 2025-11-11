<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="h-full flex flex-col min-h-screen text-gray-800">

    <!-- Navigation Bar -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-indigo-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
            <div class="flex items-center justify-between h-16">

                <!-- Left: Logo -->
                <div class="flex items-center space-x-3">
                    <a href="/" class="flex items-center space-x-2 group">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Logo" class="w-8 h-8 transition-transform duration-300 group-hover:scale-110" />
                        <span class="font-extrabold text-xl text-indigo-700 group-hover:text-indigo-800 transition-colors">CareerHub</span>
                    </a>
                </div>

                <!-- Center: Nav Links -->
                <div class="hidden md:flex space-x-2">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    <x-nav-link href="/user" :active="request()->is('user')">Users</x-nav-link>
                </div>

                <!-- Right: Actions -->
                
                <div class="hidden md:flex items-center space-x-4">
                    @guest
                    <a href="/login"
                       class="px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-50 rounded-lg border border-indigo-100 hover:bg-indigo-100 transition-all duration-300">
                        Log in
                    </a>
                    <a href="/register"
                       class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-md transition-all duration-300">
                        Sign up
                    </a>
                    @endguest
                    @auth
                    <h4>{{ Auth::user()->name }}</h4>
                    <form method="POST" action="/logout">
                        @csrf
                        @method("delete")
                        <button class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-md transition-all duration-300">Logout</button>
                    </form>
                    <div class="shrink-0"> <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" /> </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button"
                        class="p-2 rounded-md text-indigo-700 hover:bg-indigo-100 transition duration-200 focus:outline-none">
                        <svg id="menu-open" class="w-6 h-6 block" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="menu-close" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-lg border-t border-indigo-100 shadow-sm">
            <div class="px-4 py-4 space-y-2">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>

                <div class="pt-3 border-t border-indigo-100 flex flex-col space-y-2">
                    <a href="/login" class="px-4 py-2 text-indigo-700 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition">Log in</a>
                    <a href="/register" class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow">Sign up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="bg-gradient-to-r from-indigo-50 to-white border-b border-indigo-100">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">{{$heading ?? ''}}</h1>
        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-10 sm:px-8 lg:px-10">
        {{ $slot }}
    </main>

    <footer class="bg-white border-t border-indigo-100 py-6 mt-auto">
        <div class="text-center text-gray-500 text-sm">
            © {{ date('Y') }} CareerHub. All rights reserved.
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open');
        const closeIcon = document.getElementById('menu-close');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    </script>
</body>
</html>
