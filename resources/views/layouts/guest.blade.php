<!DOCTYPE html>
<html lang="en" dir="ltr" x-data="{ lang: 'en', toggleLang() { this.lang = this.lang === 'en' ? 'ar' : 'en'; document.documentElement.dir = this.lang === 'ar' ? 'rtl' : 'ltr'; } }">
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
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                position: relative;
            }
            .auth-card {
                width: 100%;
                max-width: 450px;
                background: var(--bg-panel);
                border: 1px solid var(--glass-border);
                border-radius: 16px;
                padding: 2.5rem 2rem;
                box-shadow: 0 20px 40px rgba(0,0,0,0.4);
                position: relative;
            }

            @keyframes fadeInUpInstant {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .fade-up-instant {
                animation: fadeInUpInstant 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            }

            .lang-toggle {
                position: absolute;
                top: 2rem;
                right: 2rem;
                background: rgba(42, 32, 29, 0.6);
                border: 1px solid rgba(193, 117, 81, 0.4);
                color: var(--text-main);
                padding: 8px 16px;
                border-radius: 20px;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 1000;
            }
            .lang-toggle:hover { background: var(--primary-accent); }
            html[dir="rtl"] .lang-toggle { right: auto; left: 2rem; }
            
            /* Enforce styling over Tailwind preflight */
            .glass-input-strict {
                width: 100%;
                background: rgba(42, 32, 29, 0.6) !important;
                color: #ffffff !important;
                border: 1px solid rgba(193, 117, 81, 0.4) !important;
                padding: 0.75rem 1rem !important;
                border-radius: 8px !important;
                outline: none !important;
                transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
            }
            .glass-input-strict:focus {
                border-color: var(--primary-accent) !important;
                box-shadow: 0 0 10px rgba(193, 117, 81, 0.2) !important;
            }
            select.glass-input-strict option {
                background: #1a1513; /* solid dark background to override browser default */
                color: #ffffff;
                padding: 10px;
            }
            .btn-primary {
                background: var(--primary-accent);
                color: #fff;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 8px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            .btn-primary:hover {
                background: var(--highlight);
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(212, 163, 115, 0.4);
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="auth-wrapper">
            <button @click="toggleLang()" class="lang-toggle">
                <span class="en-text">عربي</span>
                <span class="ar-text">English</span>
            </button>
            
            <!-- REMOVED stagger-item AND ADDED fade-up-instant -->
            <div class="auth-card shmagh-border fade-up-instant">
                <div style="display: flex; justify-content: center; margin-bottom: 2rem;">
                    <a href="/" class="logo-icon-svg" style="display: flex; align-items: center; justify-content: center; gap: 10px; text-decoration: none; cursor: pointer;">
                        <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 60px; height: 60px; transition: transform 0.4s ease;" onmouseover="this.style.transform='rotate(45deg) scale(1.1)'" onmouseout="this.style.transform='none'">
                            <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" fill="url(#paint0_linear)"/>
                            <circle cx="50" cy="50" r="15" fill="var(--bg-dark)"/>
                            <circle cx="50" cy="50" r="5" fill="url(#paint0_linear)"/>
                            <defs>
                                <linearGradient id="paint0_linear" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#c17551"/>
                                    <stop offset="1" stop-color="#e6b885"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <span style="font-family: var(--font-serif); font-size: 32px; font-weight: 700; color: var(--secondary-accent);">وين؟</span>
                    </a>
                </div>
                
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
