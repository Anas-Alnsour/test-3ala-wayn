@php
    // تحديد دور المستخدم الحالي (لتطبيق الثيم المناسب)
    $user = auth()->user();
    $role = $user->role ?? 'tourist';

    // محرك الثيمات الشامل (يتحكم بأدق تفاصيل الألوان لكل لوحة)
    $themes = [
        'admin' => [
            'primary' => '#F5C518', // ذهبي ملكي مشع
            'glow' => 'rgba(245, 197, 24, 0.4)',
            'bg' => '#0a0a0a',
            'panel' => '#121212',
            'border' => '#2a2a2a'
        ],
        'local' => [
            'primary' => '#8FBC8F', // أخضر زيتي
            'glow' => 'rgba(143, 188, 143, 0.4)',
            'bg' => '#0a0c0a',
            'panel' => '#121411',
            'border' => '#242b20'
        ],
        'tourist' => [
            'primary' => '#E56B6F', // وردي بتراوي
            'glow' => 'rgba(229, 107, 111, 0.4)',
            'bg' => '#140b0d',
            'panel' => '#1a0e11',
            'border' => '#2e191e'
        ],
        'restaurant' => [
            'primary' => '#F4A261', // برتقالي زعفران
            'glow' => 'rgba(244, 162, 97, 0.4)',
            'bg' => '#120a07',
            'panel' => '#1a0f0a',
            'border' => '#2e1c12'
        ],
        'hotel' => [
            'primary' => '#457B9D', // أزرق عميق
            'glow' => 'rgba(69, 123, 157, 0.4)',
            'bg' => '#070b14',
            'panel' => '#0c1421',
            'border' => '#1a273b'
        ],
        'assistant' => [
            'primary' => '#E76F51', // برتقالي صحراوي
            'glow' => 'rgba(231, 111, 81, 0.4)',
            'bg' => '#0d0a09',
            'panel' => '#16110f',
            'border' => '#2d221e'
        ],
    ];

    // استخراج الثيم الحالي، وإذا كان الدور غير معروف يعطيه ثيم السائح
    $currentTheme = $themes[$role] ?? $themes['tourist'];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" x-data="globalDashboardLogic()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="{{ $currentTheme['bg'] }}">

    <title>{{ config('app.name', 'Wayn?') }} - Enterprise Dashboard</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,600,700,900|inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --dynamic-primary: {{ $currentTheme['primary'] }};
            --dynamic-glow: {{ $currentTheme['glow'] }};
            --dynamic-bg: {{ $currentTheme['bg'] }};
            --dynamic-panel: {{ $currentTheme['panel'] }};
            --dynamic-border: {{ $currentTheme['border'] }};
        }

        html[dir="rtl"] { font-family: 'Tajawal', sans-serif; }
        html[dir="ltr"] { font-family: 'Inter', sans-serif; }
        html[dir="rtl"] .en-text { display: none !important; }
        html[dir="ltr"] .ar-text { display: none !important; }

        .font-serif { font-family: 'Playfair Display', serif; }
        html[dir="rtl"] .font-serif { font-family: 'Tajawal', sans-serif; font-weight: 900; }

        body {
            background-color: var(--dynamic-bg);
            color: #F9FAFB;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        [x-cloak] { display: none !important; }

        /* تخصيص شريط التمرير (Scrollbar) ليتناسب مع اللوحة */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--dynamic-bg);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--dynamic-border);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--dynamic-primary);
        }

        /* Glassmorphism System */
        .glass-panel {
            background: var(--dynamic-panel);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--dynamic-border);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        .solid-panel {
            background: var(--dynamic-panel);
            border: 1px solid var(--dynamic-border);
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        }

        /* حقول الإدخال الفاخرة */
        .glass-input-premium {
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid var(--dynamic-border);
            color: white;
            padding: 1rem 1.25rem;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        .glass-input-premium:focus {
            outline: none;
            border-color: var(--dynamic-primary);
            box-shadow: 0 0 0 3px color-mix(in srgb, var(--dynamic-primary) 15%, transparent);
            background: rgba(0, 0, 0, 0.6);
        }
        .glass-input-premium::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        /* أزرار ديناميكية شاملة */
        .btn-dynamic {
            background: var(--dynamic-primary);
            color: #000;
            font-weight: 900;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
        }
        .btn-dynamic:hover {
            box-shadow: 0 0 25px var(--dynamic-glow);
            transform: translateY(-2px);
        }
        .btn-dynamic:active {
            transform: translateY(1px);
        }

        /* الجداول (Tables) */
        .users-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        .users-table th, .users-table td {
            padding: 1.25rem;
            text-align: left;
            border-bottom: 1px solid var(--dynamic-border);
        }
        html[dir="rtl"] .users-table th, html[dir="rtl"] .users-table td {
            text-align: right;
        }
        .users-table th {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            color: rgba(255,255,255,0.5);
            background: color-mix(in srgb, var(--dynamic-bg) 50%, transparent);
        }

        /* شاشة التحميل (Preloader) */
        #global-loader {
            position: fixed;
            inset: 0;
            background-color: var(--dynamic-bg);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.6s ease-out, visibility 0.6s ease-out;
        }
        .loader-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid var(--dynamic-border);
            border-top-color: var(--dynamic-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            box-shadow: 0 0 30px var(--dynamic-glow);
        }
        @keyframes spin { 100% { transform: rotate(360deg); } }
    </style>
</head>
<body class="antialiased text-sm sm:text-base" :class="isOffline ? 'border-t-4 border-red-500' : ''">

    <div id="global-loader">
        <div class="flex flex-col items-center gap-6">
            <div class="loader-spinner"></div>
            <div class="font-serif text-2xl font-black tracking-widest" style="color: var(--dynamic-primary);">Wayn Platform</div>
        </div>
    </div>

    <div x-cloak x-show="isOffline" x-transition.opacity class="bg-red-600 text-white text-center py-2 px-4 font-bold text-sm shadow-md z-50 relative flex items-center justify-center gap-2">
        <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        <span class="en-text">You are currently offline. Check your connection.</span>
        <span class="ar-text">لا يوجد اتصال بالإنترنت. يرجى التحقق من الشبكة.</span>
    </div>

    <div class="fixed bottom-6 ltr:right-6 rtl:left-6 z-[100] flex flex-col gap-3 pointer-events-none">
        <template x-for="toast in toasts" :key="toast.id">
            <div x-show="toast.show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-10 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-90"
                 class="px-6 py-4 rounded-2xl shadow-[0_15px_40px_rgba(0,0,0,0.8)] font-bold flex items-center gap-4 border pointer-events-auto backdrop-blur-xl"
                 :class="{
                    'bg-[var(--dynamic-panel)] border-[var(--dynamic-primary)] text-white': toast.type === 'success',
                    'bg-red-900/90 border-red-500 text-white': toast.type === 'error',
                    'bg-blue-900/90 border-blue-500 text-white': toast.type === 'info'
                 }">
                <span class="text-2xl" :class="toast.type === 'success' ? 'text-[var(--dynamic-primary)]' : (toast.type === 'error' ? 'text-red-400' : 'text-blue-400')">
                    <template x-if="toast.type === 'success'"><span>✦</span></template>
                    <template x-if="toast.type === 'error'"><span>⚠️</span></template>
                    <template x-if="toast.type === 'info'"><span>ℹ️</span></template>
                </span>
                <span class="text-base" x-text="toast.message"></span>
                <button @click="dismissToast(toast.id)" class="ltr:ml-auto rtl:mr-auto p-1 hover:bg-white/10 rounded-lg transition-colors cursor-pointer text-gray-400 hover:text-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </template>
    </div>

    @yield('content')

    <script>
        // دالة إخفاء شاشة التحميل (مع صمام أمان لضمان عدم بقائها للأبد)
        function hideGlobalLoader() {
    const loader = document.getElementById('global-loader');
    if (loader) {
        loader.style.opacity = '0';
        setTimeout(() => loader.remove(), 500);
    }
}

        // إخفاء شاشة التحميل عند اكتمال تجهيز الصفحة
        window.addEventListener('load', hideGlobalLoader);

        // صمام أمان: إذا تأخر التحميل لأكثر من ثانيتين، نقوم بالإخفاء القسري
        setTimeout(hideGlobalLoader, 2000);

        // المحرك الأساسي للألبين (Alpine.js Global Logic)
        document.addEventListener('alpine:init', () => {
            Alpine.data('globalDashboardLogic', () => ({
                language: localStorage.getItem('wayn_lang') || 'ar',
                isOffline: !navigator.onLine,
                toasts: [],
                toastCounter: 0,

                init() {
                    // إخفاء اللودر بمجرد جاهزية الألبين
                    hideGlobalLoader();

                    // ضبط اتجاه الصفحة فوراً
                    document.documentElement.dir = this.language === 'ar' ? 'rtl' : 'ltr';

                    // مراقبة تغييرات اللغة
                    this.$watch('language', val => {
                        localStorage.setItem('wayn_lang', val);
                        document.documentElement.dir = val === 'ar' ? 'rtl' : 'ltr';
                    });

                    // مراقبة اتصال الإنترنت
                    window.addEventListener('online', () => {
                        this.isOffline = false;
                        this.addToast(this.language === 'ar' ? 'عاد الاتصال بالإنترنت!' : 'Back online!', 'success');
                    });
                    window.addEventListener('offline', () => {
                        this.isOffline = true;
                    });
                },

                toggleGlobalLang() {
                    this.language = this.language === 'en' ? 'ar' : 'en';
                },

                // نظام الإشعارات المتقدم (يدعم أكثر من إشعار في نفس الوقت)
                addToast(message, type = 'success') {
                    const id = ++this.toastCounter;
                    this.toasts.push({ id, message, type, show: false });

                    // تفعيل الأنيميشن بعد إضافته للـ DOM
                    setTimeout(() => {
                        const index = this.toasts.findIndex(t => t.id === id);
                        if(index > -1) this.toasts[index].show = true;
                    }, 50);

                    // إخفاء تلقائي بعد 4 ثوانٍ
                    setTimeout(() => {
                        this.dismissToast(id);
                    }, 4000);
                },

                dismissToast(id) {
                    const index = this.toasts.findIndex(t => t.id === id);
                    if (index > -1) {
                        this.toasts[index].show = false; // تشغيل أنيميشن الخروج
                        setTimeout(() => {
                            this.toasts = this.toasts.filter(t => t.id !== id);
                        }, 300); // إزالة من المصفوفة بعد انتهاء الأنيميشن
                    }
                }
            }));
        });
    </script>
</body>
</html>
