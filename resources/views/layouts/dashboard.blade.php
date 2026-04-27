@php
    $role = auth()->user()->role ?? 'tourist';
    $themeColors = [
        'tourist' => '#c17551',    // Petra Rose
        'local' => '#8c9e6c',      // Olive Tree Green
        'admin' => '#d4af37',      // Royal Gold
        'restaurant' => '#cc5500', // Warm Saffron
        'hotel' => '#0ea5e9',      // Deep Azure
        'assistant' => '#ea580c',  // Desert Sunset Orange
    ];
    $dynamicPrimary = $themeColors[$role] ?? '#D4A373';
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr" x-data="{ lang: 'en', sidebarOpen: false, toggleLang() { this.lang = this.lang === 'en' ? 'ar' : 'en'; document.documentElement.dir = this.lang === 'ar' ? 'rtl' : 'ltr'; } }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Wayn?') }} - Enterprise Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,600,700|inter:300,400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --bg-dark: #111827;
            --bg-panel: rgba(31, 41, 55, 0.7);
            --bg-card: rgba(55, 65, 81, 0.5);
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-main: #F9FAFB;
            --text-secondary: #9CA3AF;
            --dynamic-primary: {{ $dynamicPrimary }};
            --primary-accent: var(--dynamic-primary);
            --secondary-accent: #BC6C25;
            --shmagh-red: var(--dynamic-primary);
        }
        
        html[dir="rtl"] { font-family: 'Tajawal', sans-serif; }
        html[dir="ltr"] { font-family: 'Inter', sans-serif; }
        html[dir="rtl"] .en-text { display: none; }
        html[dir="ltr"] .ar-text { display: none; }

        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            overflow-x: hidden;
        }

        .text-dynamic { color: var(--dynamic-primary) !important; }
        .bg-dynamic { background-color: var(--dynamic-primary) !important; }
        .border-dynamic { border-color: var(--dynamic-primary) !important; }

        /* Glassmorphism */
        .glass-panel {
            background: var(--bg-panel);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .solid-panel {
            background: #1F2937;
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        }

        /* Shmagh Active Link */
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: var(--text-secondary);
            font-weight: 500;
        }
        .nav-link:hover {
            color: var(--text-main);
            background: rgba(255, 255, 255, 0.05);
        }
        .nav-link.active {
            background-color: color-mix(in srgb, var(--dynamic-primary) 15%, transparent);
            color: white;
            border-radius: 0;
        }
        html[dir="ltr"] .nav-link.active { border-left: 4px solid var(--dynamic-primary); }
        html[dir="rtl"] .nav-link.active { border-right: 4px solid var(--dynamic-primary); }
        
        .nav-link.active::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, color-mix(in srgb, var(--dynamic-primary) 5%, transparent) 10px, color-mix(in srgb, var(--dynamic-primary) 5%, transparent) 20px);
            z-index: 0;
            pointer-events: none;
        }
        .nav-link > * { position: relative; z-index: 1; }

        .shmagh-border {
            border-bottom: 2px solid transparent;
            border-image: repeating-linear-gradient(45deg, var(--dynamic-primary), var(--dynamic-primary) 10px, transparent 10px, transparent 20px) 1;
        }

        /* Layout */
        .dashboard-layout {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 280px;
            flex-shrink: 0;
            transition: transform 0.3s ease;
            z-index: 40;
        }
        html[dir="ltr"] .sidebar { border-right: 1px solid var(--glass-border); }
        html[dir="rtl"] .sidebar { border-left: 1px solid var(--glass-border); }
        
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
        }
        @media (min-width: 1024px) {
            .main-content { padding: 2.5rem; }
        }

        /* Form Inputs */
        .glass-input-premium {
            width: 100%;
            background: rgba(17, 24, 39, 0.6);
            border: 1px solid var(--glass-border);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        .glass-input-premium:focus {
            outline: none;
            border-color: var(--primary-accent);
            box-shadow: 0 0 0 2px color-mix(in srgb, var(--dynamic-primary) 20%, transparent);
        }

        /* Tables */
        .users-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        .users-table th, .users-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--glass-border);
        }
        html[dir="rtl"] .users-table th, html[dir="rtl"] .users-table td {
            text-align: right;
        }
        .users-table th {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
            background: rgba(31, 41, 55, 0.4);
        }

        /* Stats Bar */
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1.5rem;
        }
        @media (min-width: 768px) { .stats-bar { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 1024px) { .stats-bar { grid-template-columns: repeat(4, 1fr); } }
        
        .stat-card {
            background: linear-gradient(145deg, var(--bg-panel), rgba(17, 24, 39, 0.8));
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .cities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        /* Mobile Sidebar */
        @media (max-width: 1023px) {
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
            }
            html[dir="ltr"] .sidebar {
                left: 0;
                transform: translateX(-100%);
            }
            html[dir="rtl"] .sidebar {
                right: 0;
                transform: translateX(100%);
            }
            html[dir="ltr"] .sidebar.open { transform: translateX(0); }
            html[dir="rtl"] .sidebar.open { transform: translateX(0); }
        }
    </style>
</head>
<body class="antialiased text-sm sm:text-base">

    <div class="dashboard-layout">
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" 
             class="fixed inset-0 bg-black/60 z-30 lg:hidden backdrop-blur-sm"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false" style="display: none;"></div>

        <!-- Sidebar -->
        <aside class="sidebar glass-panel flex flex-col" :class="{'open': sidebarOpen}">
            <!-- Logo Area (Shmagh border removed per Phase 8 req) -->
            <div class="h-20 flex items-center justify-center border-b border-white/10 relative">
                <a href="/" class="flex items-center gap-3 no-underline group">
                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 transition-transform duration-500 group-hover:rotate-45">
                        <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" class="fill-dynamic"/>
                        <circle cx="50" cy="50" r="15" fill="#111827"/>
                        <circle cx="50" cy="50" r="5" class="fill-dynamic"/>
                    </svg>
                    <span class="font-serif text-2xl font-bold text-white tracking-wider">Wayn?</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto py-6 px-3 flex flex-col gap-2">
                @yield('sidebar_links')
            </nav>

            <!-- Bottom Section (Back to Home) -->
            <div class="p-4 border-t border-white/10">
                <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span class="font-medium">
                        <span class="en-text">Back to Explore</span>
                        <span class="ar-text">العودة للاستكشاف</span>
                    </span>
                </a>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="main-wrapper relative">
            
            <!-- Top Header -->
            <header class="h-20 glass-panel border-b-0 border-x-0 sticky top-0 z-20 flex items-center justify-between px-4 lg:px-8">
                <div class="flex items-center gap-4">
                    <!-- Hamburger (Mobile) -->
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-300 hover:text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <!-- Search Bar -->
                    <div class="relative hidden sm:block w-64 md:w-80 text-gray-400 focus-within:text-white">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 rtl:pl-0 rtl:pr-3 pointer-events-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" class="glass-input-premium !pl-10 rtl:!pl-4 rtl:!pr-10 !py-2 !rounded-full text-sm" placeholder="Search...">
                    </div>
                </div>

                <div class="flex items-center gap-4 sm:gap-6">
                    <!-- Language Toggle -->
                    <button @click="toggleLang()" class="flex items-center justify-center w-10 h-10 rounded-full border border-white/20 bg-white/5 hover:bg-white/10 transition-colors text-sm font-bold text-gray-200 focus:outline-none">
                        <span class="en-text font-arabic">ع</span>
                        <span class="ar-text">EN</span>
                    </button>

                    <!-- Notifications -->
                    <button class="relative text-gray-300 hover:text-white transition-colors focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-dynamic rounded-full border border-gray-900"></span>
                    </button>

                    <!-- Profile Dropdown -->
                    <div x-data="{ profileOpen: false }" class="relative">
                        <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-transparent border-none p-0 cursor-pointer">
                            <div class="w-10 h-10 rounded-full bg-dynamic border border-white/20 flex items-center justify-center text-white font-bold shadow-lg shadow-black/20">
                                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                            </div>
                            <div class="hidden md:block text-left rtl:text-right">
                                <div class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name ?? 'User' }}</div>
                                <div class="text-xs text-dynamic capitalize leading-tight">{{ Auth::user()->role ?? 'Guest' }}</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div x-show="profileOpen" 
                             @click.away="profileOpen = false"
                             class="absolute top-full right-0 rtl:right-auto rtl:left-0 mt-2 w-48 solid-panel py-2 z-50 shadow-2xl"
                             x-transition.opacity
                             style="display: none;">
                            <div class="px-4 py-2 border-b border-white/10 mb-2 md:hidden">
                                <div class="text-sm font-bold text-white">{{ Auth::user()->name ?? 'User' }}</div>
                                <div class="text-xs text-dynamic capitalize">{{ Auth::user()->role ?? 'Guest' }}</div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="w-full text-left rtl:text-right px-4 py-2 text-sm text-red-400 hover:bg-white/5 transition-colors cursor-pointer bg-transparent border-none">
                                    <span class="en-text">Sign Out</span>
                                    <span class="ar-text">تسجيل خروج</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Scrollable Content -->
            <main class="main-content">
                @yield('content')
            </main>

        </div>
    </div>
</body>
</html>
