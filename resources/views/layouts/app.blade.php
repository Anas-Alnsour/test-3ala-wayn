<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wayn? | Authentic Jordan')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Lato:wght@300;400;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased overflow-x-hidden selection:bg-amber-500 selection:text-gray-900" x-data="{ mobileMenuOpen: false, currentMode: 'en' }">
    
    <!-- HEADER -->
    <header class="fixed top-0 left-0 w-full z-50 bg-gray-900/80 backdrop-blur-md border-b border-gray-800 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                
                <!-- Logo -->
                <div class="flex items-center gap-3 cursor-pointer group">
                    <div class="w-10 h-10 relative flex-shrink-0">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="w-full h-full drop-shadow-md group-hover:rotate-90 transition-transform duration-700 ease-in-out">
                            <defs>
                                <linearGradient id="goldGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#f59e0b" />
                                    <stop offset="100%" stop-color="#b45309" />
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="45" fill="none" stroke="url(#goldGradient)" stroke-width="2" opacity="0.5" stroke-dasharray="4 4"/>
                            <g>
                                <polygon points="50,10 58,42 50,50 42,42" fill="url(#goldGradient)"/>
                                <polygon points="50,90 58,58 50,50 42,58" fill="url(#goldGradient)" opacity="0.6"/>
                                <polygon points="90,50 58,58 50,50 58,42" fill="url(#goldGradient)"/>
                                <polygon points="10,50 42,58 50,50 42,42" fill="url(#goldGradient)" opacity="0.6"/>
                            </g>
                            <circle cx="50" cy="50" r="6" fill="#111827" stroke="url(#goldGradient)" stroke-width="2"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-serif text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-400 to-amber-600">Wayn?</div>
                        <div class="text-xs text-gray-400 tracking-wider">Authentic Travel · Jordan</div>
                    </div>
                </div>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-6">
                    <a href="#home" class="text-sm font-medium text-amber-500 hover:text-amber-400 transition-colors">Explore</a>
                    <a href="#cities" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Cities</a>
                    <a href="#planner" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">AI Planner</a>
                    <a href="#currency" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Currency</a>
                    <a href="#admin" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Admin</a>
                    
                    <div class="flex items-center bg-gray-800 rounded-full p-1 border border-gray-700">
                        <button class="px-3 py-1 rounded-full text-xs font-bold transition-colors" :class="currentMode === 'en' ? 'bg-amber-600 text-white' : 'text-gray-400 hover:text-white'" @click="currentMode = 'en'">EN</button>
                        <button class="px-3 py-1 rounded-full text-xs font-bold transition-colors font-arabic" :class="currentMode === 'ar' ? 'bg-amber-600 text-white' : 'text-gray-400 hover:text-white'" @click="currentMode = 'ar'">عربي</button>
                    </div>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-300 hover:text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden bg-gray-800 border-b border-gray-700 absolute w-full"
             @click.away="mobileMenuOpen = false">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="#home" class="block px-3 py-2 rounded-md text-base font-medium text-amber-500 bg-gray-900">Explore</a>
                <a href="#cities" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Cities</a>
                <a href="#planner" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">AI Planner</a>
                <a href="#currency" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Currency</a>
                <a href="#admin" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Admin</a>
                
                <div class="mt-4 flex items-center justify-center bg-gray-900 rounded-lg p-1 border border-gray-700 w-max mx-auto">
                    <button class="px-4 py-2 rounded-md text-sm font-bold transition-colors" :class="currentMode === 'en' ? 'bg-amber-600 text-white' : 'text-gray-400'" @click="currentMode = 'en'">EN</button>
                    <button class="px-4 py-2 rounded-md text-sm font-bold transition-colors font-arabic" :class="currentMode === 'ar' ? 'bg-amber-600 text-white' : 'text-gray-400'" @click="currentMode = 'ar'">عربي</button>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-20">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 border-t border-gray-800 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="text-gray-400 text-sm">Wayn? | وين؟ — Authentic Tourism Platform for Jordan</div>
            <div class="text-gray-500 text-xs mt-2">Powered by AI &middot; Built with &hearts; for Jordan</div>
        </div>
    </footer>

</body>
</html>
