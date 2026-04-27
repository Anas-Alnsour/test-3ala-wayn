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
<html lang="en" dir="ltr">
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
    
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboardLogic', () => ({
                lang: 'en',
                toastMsg: '',
                toastMsgAr: '',
                
                toggleLang() {
                    this.lang = this.lang === 'en' ? 'ar' : 'en';
                    document.documentElement.dir = this.lang === 'ar' ? 'rtl' : 'ltr';
                },
                
                showToast(msgEn, msgAr) {
                    this.toastMsg = msgEn;
                    this.toastMsgAr = msgAr || msgEn;
                    setTimeout(() => {
                        this.toastMsg = '';
                        this.toastMsgAr = '';
                    }, 3000);
                }
            }));
        });
    </script>
    
    <style>
        :root {
            --bg-dark: #111827;
            --bg-panel: rgba(31, 41, 55, 0.7);
            --bg-card: rgba(55, 65, 81, 0.5);
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-main: #F9FAFB;
            --text-secondary: #9CA3AF;
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
            border-color: var(--dynamic-primary);
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
        @media (min-width: 1024px) { .stats-bar { grid-template-columns: repeat(3, 1fr); } }
        
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

        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
        }
        @media (min-width: 1024px) {
            .main-content { padding: 2.5rem; }
        }
    </style>
</head>
<body class="antialiased text-sm sm:text-base" style="--dynamic-primary: {{ $dynamicPrimary }};" x-data="dashboardLogic()">

    <!-- Toast Notification -->
    <div x-cloak x-show="toastMsg" x-transition 
         class="fixed bottom-4 right-4 rtl:right-auto rtl:left-4 z-50 bg-dynamic text-white px-6 py-3 rounded-lg shadow-2xl flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span class="en-text font-bold" x-text="toastMsg"></span>
        <span class="ar-text font-bold" x-text="toastMsgAr"></span>
    </div>

    <!-- The Entire Dashboard View is injected here, containing its own Sidebar and Main wrapper -->
    @yield('content')

</body>
</html>
