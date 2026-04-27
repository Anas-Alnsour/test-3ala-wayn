@php
    /**
     * 🚀 الموجه الذكي للوحات التحكم (Smart Dashboard Router) 🚀
     * هذا الملف يقرأ دور المستخدم الحالي ويقوم بجلب اللوحة المخصصة له.
     * بدلاً من تعديل الـ Routes في Laravel، هذا الملف يتكفل بكل شيء!
     */

    // جلب دور المستخدم (الافتراضي هو سائح)
    $role = auth()->user()?->role ?? 'tourist';

    // تحديد مسار ملف اللوحة بناءً على الدور
    $dashboardView = 'dashboards.' . $role;
@endphp

@if(view()->exists($dashboardView))
    {{-- 🌟 إذا كان الملف موجوداً (مثلاً: dashboards.admin)، قم بعرضه فوراً --}}
    @include($dashboardView)
@else
    {{-- ⚠️ شاشة طوارئ فخمة في حال كان هناك خطأ في اسم الدور أو عدم وجود الملف --}}
    @extends('layouts.dashboard')

    @section('content')
    <div class="flex h-screen w-full items-center justify-center bg-[#0a0c10] text-white">
        <div class="text-center bg-[#12141a] p-10 md:p-16 rounded-3xl border border-gray-800 shadow-[0_20px_50px_rgba(0,0,0,0.8)] max-w-lg relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-red-500 opacity-10 rounded-full blur-3xl"></div>

            <div class="w-24 h-24 bg-red-500/10 rounded-full flex items-center justify-center mx-auto mb-6 border border-red-500/20">
                <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>

            <h1 class="text-3xl font-black mb-3">
                <span class="en-text">Dashboard Not Found</span>
                <span class="ar-text">اللوحة غير موجودة</span>
            </h1>

            <p class="text-gray-400 mb-8 leading-relaxed">
                <span class="en-text">Could not load the dashboard view for role: <span class="text-amber-500 font-bold uppercase">{{ $role }}</span>. Please contact the administrator.</span>
                <span class="ar-text">لم نتمكن من العثور على لوحة التحكم الخاصة بصلاحية: <span class="text-amber-500 font-bold uppercase">{{ $role }}</span>. يرجى التواصل مع الإدارة.</span>
            </p>

            <form method="POST" action="{{ route('logout') }}" class="mt-8">
                @csrf
                <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white px-6 py-4 rounded-xl font-black hover:shadow-[0_0_20px_rgba(220,38,38,0.4)] transition-all hover:-translate-y-1 cursor-pointer border-none">
                    <span class="en-text">Logout & Return Home</span>
                    <span class="ar-text">تسجيل الخروج والعودة للرئيسية</span>
                </button>
            </form>
        </div>
    </div>
    @endsection
@endif
