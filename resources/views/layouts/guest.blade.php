<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Wayn?') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair-display:400,600,700|inter:300,400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            html[dir="rtl"] { font-family: 'Tajawal', sans-serif; }
            html[dir="ltr"] { font-family: 'Inter', sans-serif; }
            body { background-color: var(--bg-dark); color: var(--text-main); }
            .auth-wrapper {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem;
                background-image: radial-gradient(circle at 50% 0%, rgba(140, 158, 108, 0.1) 0%, transparent 70%);
            }
            .auth-card {
                width: 100%;
                max-width: 450px;
                background: var(--bg-panel);
                border: 1px solid var(--glass-border);
                border-radius: 16px;
                padding: 2rem;
                box-shadow: 0 20px 40px rgba(0,0,0,0.4);
                position: relative;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="auth-wrapper">
            <div class="auth-card shmagh-border stagger-item">
                <div style="display: flex; justify-content: center; margin-bottom: 2rem;">
                    <a href="/" class="logo-icon-svg" style="display: flex; align-items: center; justify-content: center; gap: 10px; text-decoration: none;">
                        <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 50px; height: 50px;">
                            <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" fill="url(#paint0_linear)"/>
                            <circle cx="50" cy="50" r="15" fill="var(--bg-dark)"/>
                            <circle cx="50" cy="50" r="5" fill="url(#paint0_linear)"/>
                            <defs>
                                <linearGradient id="paint0_linear" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#D4A373"/>
                                    <stop offset="1" stop-color="#BC6C25"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <span style="font-family: var(--font-serif); font-size: 28px; font-weight: 700; color: var(--text-main);">وين؟</span>
                    </a>
                </div>
                
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
