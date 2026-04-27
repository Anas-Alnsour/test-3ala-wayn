<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" x-data="guestLayout()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wayn?') }} - Welcome</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,600,700,900|inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            /* ألوان الواجهة الترحيبية (مزيج بين ذهبي الأدمن ووردي البتراء) */
            --auth-primary: #F5C518;
            --auth-secondary: #E56B6F;
            --auth-bg: #0a0c10;
            --auth-panel: rgba(18, 20, 24, 0.65);
            --auth-border: rgba(255, 255, 255, 0.08);
        }

        html[dir="rtl"] { font-family: 'Tajawal', sans-serif; }
        html[dir="ltr"] { font-family: 'Inter', sans-serif; }
        html[dir="rtl"] .en-text { display: none !important; }
        html[dir="ltr"] .ar-text { display: none !important; }

        .font-serif { font-family: 'Playfair Display', serif; }
        html[dir="rtl"] .font-serif { font-family: 'Tajawal', sans-serif; font-weight: 900; }

        body {
            margin: 0;
            color: #ffffff;
            background-color: var(--auth-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* شبكة الخلفية الفاخرة */
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 15% 50%, rgba(245, 197, 24, 0.08), transparent 25%),
                radial-gradient(circle at 85% 30%, rgba(229, 107, 111, 0.08), transparent 25%);
            z-index: 0;
            pointer-events: none;
        }

        /* تأثير الدخول (Fade In) */
        @keyframes fadeInUpInstant {
            from { opacity: 0; transform: translateY(40px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .fade-up-instant {
            animation: fadeInUpInstant 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        }

        /* بطاقة تسجيل الدخول الزجاجية */
        .auth-card {
            width: 100%;
            max-width: 480px;
            background: var(--auth-panel);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--auth-border);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.8), inset 0 1px 0 rgba(255,255,255,0.1);
            border-radius: 32px;
            padding: 3.5rem 3rem;
            position: relative;
            z-index: 10;
        }

        /* 🟢 الفئات العامة (Classes) التي يجب استخدامها داخل شاشات Login و Register 🟢 */
        .glass-input-premium {
            background: rgba(0,0,0,0.4) !important;
            border: 1px solid var(--auth-border) !important;
            border-radius: 16px;
            padding: 1rem 1.25rem;
            color: #fff;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            font-weight: 500;
        }
        .glass-input-premium:focus {
            border-color: var(--auth-primary) !important;
            background: rgba(0,0,0,0.6) !important;
            box-shadow: 0 0 0 4px rgba(245, 197, 24, 0.15) !important;
        }
        .glass-input-premium::placeholder {
            color: rgba(255,255,255,0.3);
        }

        .btn-premium {
            background: linear-gradient(135deg, var(--auth-primary), #D4AF37) !important;
            color: #000 !important;
            border: none;
            padding: 1rem;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 900;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(245, 197, 24, 0.2);
        }
        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(245, 197, 24, 0.4);
        }
        .btn-premium:active {
            transform: translateY(1px);
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #9CA3AF;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* زر تغيير اللغة */
        .lang-toggle {
            position: absolute;
            top: 2rem;
            ltr:right: 2rem;
            rtl:left: 2rem;
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--auth-border);
            color: #fff;
            width: 44px;
            height: 44px;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            backdrop-filter: blur(10px);
        }
        .lang-toggle:hover {
            background: var(--auth-primary);
            color: #000;
            border-color: var(--auth-primary);
            transform: scale(1.05);
        }
        html[dir="rtl"] .lang-toggle { right: auto; left: 2rem; }
    </style>
</head>
<body>

    <button @click="toggleLang()" class="lang-toggle" title="تغيير اللغة / Change Language">
        <span class="en-text font-arabic text-xl">ع</span>
        <span class="ar-text text-sm">EN</span>
    </button>

    <div class="w-full flex justify-center items-center px-4 py-8 z-10 relative">
        <div class="auth-card fade-up-instant">

            <div class="flex justify-center mb-10">
                <a href="/" class="flex flex-col items-center justify-center gap-4 text-decoration-none cursor-pointer group">
                    <div class="relative w-20 h-20">
                        <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full transition-transform duration-700 ease-out group-hover:rotate-90 drop-shadow-[0_0_15px_rgba(245,197,24,0.4)]">
                            <defs>
                                <linearGradient id="paint0_linear" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#F5C518"/>
                                    <stop offset="1" stop-color="#E56B6F"/>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="45" fill="none" stroke="url(#paint0_linear)" stroke-width="2" opacity="0.3" stroke-dasharray="4 4" class="animate-[spin_10s_linear_infinite]"/>
                            <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" fill="url(#paint0_linear)"/>
                            <circle cx="50" cy="50" r="15" fill="#0a0c10"/>
                            <circle cx="50" cy="50" r="5" fill="url(#paint0_linear)"/>
                        </svg>
                    </div>
                    <div class="text-center">
                        <span class="block font-serif text-3xl font-black bg-clip-text text-transparent bg-gradient-to-r from-[#F5C518] to-[#E56B6F] tracking-wider mb-1">
                            <span class="en-text">Wayn?</span>
                            <span class="ar-text">وين؟</span>
                        </span>
                        <span class="block text-xs text-gray-500 font-bold uppercase tracking-widest" x-text="language === 'ar' ? 'بوابتك للأردن' : 'Your Gateway to Jordan'"></span>
                    </div>
                </a>
            </div>

            <div class="w-full">
                {{ $slot }}
            </div>

        </div>
    </div>

    <script>
        function guestLayout() {
            return {
                // جلب اللغة المحفوظة أو تعيين العربية كافتراضي
                language: localStorage.getItem('wayn_lang') || 'ar',

                init() {
                    // تحديث اتجاه الصفحة عند التحميل
                    document.documentElement.dir = this.language === 'ar' ? 'rtl' : 'ltr';

                    // مراقبة تغيير اللغة
                    this.$watch('language', val => {
                        localStorage.setItem('wayn_lang', val);
                        document.documentElement.dir = val === 'ar' ? 'rtl' : 'ltr';
                    });
                },

                toggleLang() {
                    this.language = this.language === 'ar' ? 'en' : 'ar';
                }
            }
        }
    </script>
</body>
</html>
