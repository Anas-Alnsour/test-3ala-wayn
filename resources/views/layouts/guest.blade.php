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
            body { 
                margin: 0; 
                color: #ffffff; 
                background: linear-gradient(135deg, #0f0b0a 0%, #2a201d 100%);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: relative;
            }
            body::before {
                content: '';
                position: absolute;
                top: 0; left: 0; right: 0; bottom: 0;
                background-image: radial-gradient(rgba(193, 117, 81, 0.1) 1px, transparent 1px);
                background-size: 20px 20px;
                opacity: 0.5;
                pointer-events: none;
                z-index: 0;
            }
            .auth-wrapper {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 2rem;
                z-index: 10;
            }
            .auth-card {
                width: 100%;
                max-width: 500px;
                background: rgba(30, 23, 21, 0.7); 
                backdrop-filter: blur(20px); 
                border: 1px solid rgba(193, 117, 81, 0.2); 
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); 
                border-radius: 24px; 
                padding: 3rem;
                position: relative;
            }

            @keyframes fadeInUpInstant {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .fade-up-instant {
                animation: fadeInUpInstant 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            }

            /* Language Toggle Button */
            .lang-toggle {
                position: absolute;
                top: 20px;
                right: 20px;
                background: rgba(42, 32, 29, 0.6);
                border: 1px solid rgba(193, 117, 81, 0.4);
                color: #fff;
                padding: 8px 16px;
                border-radius: 20px;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 1000;
            }
            .lang-toggle:hover { background: var(--primary-accent); }
            html[dir="rtl"] .lang-toggle { right: auto; left: 20px; }

            /* Fix styles directly from user request */
            .glass-input-premium { 
                background: rgba(0,0,0,0.3) !important; 
                border: 1px solid rgba(255,255,255,0.15) !important; 
                border-radius: 12px; 
                padding: 1rem; 
                color: #fff; 
                width: 100%; 
                transition: all 0.3s; 
                outline: none; 
            }
            .glass-input-premium:focus { 
                border-color: var(--primary-accent) !important; 
                box-shadow: 0 0 15px rgba(193, 117, 81, 0.3); 
            }
            .btn-premium { 
                background: linear-gradient(135deg, var(--primary-accent), #8E3D1D) !important; 
                color: #fff !important; 
                border: none; 
                padding: 1rem; 
                border-radius: 12px; 
                font-size: 1.1rem; 
                font-weight: bold; 
                cursor: pointer; 
                transition: transform 0.3s, box-shadow 0.3s; 
                width: 100%; 
                display: flex; 
                justify-content: center; 
                align-items: center; 
                gap: 10px; 
            }
            .btn-premium:hover { 
                transform: translateY(-2px); 
                box-shadow: 0 8px 20px rgba(193, 117, 81, 0.4); 
            }
            .form-label { 
                display: block; 
                margin-bottom: 0.5rem; 
                color: var(--secondary-accent); 
                font-weight: 600; 
                font-size: 0.95rem; 
            }
            
            select.glass-input-premium {
                appearance: none;
                background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
                background-repeat: no-repeat;
                background-position: right 1rem center;
                background-size: 1em;
            }
            html[dir="rtl"] select.glass-input-premium {
                background-position: left 1rem center;
            }
        </style>
    </head>
    <body class="antialiased">
        <button @click="toggleLang()" class="lang-toggle">
            <span class="en-text">عربي</span>
            <span class="ar-text">English</span>
        </button>
        <div class="auth-wrapper">
            <div class="auth-card fade-up-instant">
                <div style="display: flex; justify-content: center; margin-bottom: 2.5rem;">
                    <a href="/" class="logo-icon-svg" style="display: flex; align-items: center; justify-content: center; gap: 12px; text-decoration: none; cursor: pointer;">
                        <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 70px; height: 70px; transition: transform 0.4s ease;" onmouseover="this.style.transform='rotate(45deg) scale(1.1)'" onmouseout="this.style.transform='none'">
                            <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" fill="url(#paint0_linear)"/>
                            <circle cx="50" cy="50" r="15" fill="#1a1513"/>
                            <circle cx="50" cy="50" r="5" fill="url(#paint0_linear)"/>
                            <defs>
                                <linearGradient id="paint0_linear" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#c17551"/>
                                    <stop offset="1" stop-color="#e6b885"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="en-text" style="font-family: var(--font-serif); font-size: 28px; font-weight: 700; color: var(--text-main);">Wayn?</span>
                        <span class="ar-text" style="font-family: var(--font-serif); font-size: 28px; font-weight: 700; color: var(--text-main);">وين؟</span>
                    </a>
                </div>
                
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
