@php
    $cities = \App\Models\City::all();
    $myGems = \App\Models\Attraction::with('city')->where('submitter_id', auth()->id())->latest()->get();
    
    // محاكاة لعروض حصرية لابن البلد (بما أنه لا يوجد جدول مخصص لها حالياً)
    $localDeals = [
        ['title' => 'خصم 50% مخيمات رم', 'title_en' => '50% Off Wadi Rum Camps', 'location' => 'Wadi Rum', 'discount' => '50%'],
        ['title' => 'عرض منسف الجمعة', 'title_en' => 'Friday Mansaf Deal', 'location' => 'Amman', 'discount' => '25%'],
        ['title' => 'تذاكر تلفريك عجلون', 'title_en' => 'Ajloun Cable Car', 'location' => 'Ajloun', 'discount' => '15%'],
        ['title' => 'دخولية منتجعات البحر الميت', 'title_en' => 'Dead Sea Resorts Entry', 'location' => 'Dead Sea', 'discount' => '30%'],
    ];
@endphp
@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-dynamic-main text-white font-sans" x-data="{ 
    activeTab: 'overview', 
    sidebarOpen: false,
    isSubmitting: false,
    
    submitGem(event) {
        this.isSubmitting = true;
        const formData = new FormData(event.target);
        
        // تحويل البيانات لـ JSON
        const plainFormData = Object.fromEntries(formData.entries());
        
        fetch('/hidden-gems', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(plainFormData)
        }).then(res => res.json()).then(data => {
            this.isSubmitting = false;
            this.showToast('Hidden Gem submitted successfully! Pending approval.', 'تم إرسال المكان المخفي بنجاح! بانتظار الموافقة.');
            event.target.reset();
            this.activeTab = 'contributions'; // النقل التلقائي لصفحة المساهمات
            setTimeout(() => window.location.reload(), 1500); // تحديث الصفحة لرؤية البيانات الجديدة
        }).catch(err => {
            this.isSubmitting = false;
            this.showToast('Error submitting the gem.', 'حدث خطأ أثناء الإرسال.');
        });
    }
}">

    <aside class="w-72 bg-dynamic-sidebar border-r border-gray-800 flex-shrink-0 hidden md:flex flex-col z-40 transition-all duration-300 shadow-[4px_0_25px_rgba(0,0,0,0.3)]" :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">
        <div class="p-6 border-b border-gray-800 flex justify-between items-center">
             <a href="/" class="flex items-center gap-3 no-underline group">
                <svg viewBox="0 0 100 100" fill="none" class="w-8 h-8 transition-transform duration-500 group-hover:rotate-45">
                    <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" class="fill-dynamic"/>
                    <circle cx="50" cy="50" r="15" fill="#111827"/>
                    <circle cx="50" cy="50" r="5" class="fill-dynamic"/>
                </svg>
                <span class="text-xl font-bold font-serif text-white en-text tracking-wider">Wayn?</span>
                <span class="text-xl font-bold font-serif text-white ar-text tracking-wider">وين؟</span>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <button @click="activeTab = 'overview'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'overview' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                <span class="font-medium en-text">Local Deals</span>
                <span class="font-medium ar-text">عروض حصرية</span>
            </button>
            <button @click="activeTab = 'submit_gem'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'submit_gem' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
                <span class="font-medium en-text">Submit Hidden Gem</span>
                <span class="font-medium ar-text">شارك مكان مخفي</span>
            </button>
            <button @click="activeTab = 'contributions'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'contributions' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <span class="font-medium en-text">My Contributions</span>
                <span class="font-medium ar-text">مساهماتي</span>
            </button>
        </nav>
        
        <div class="p-4 border-t border-gray-800">
            <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-gray-800 transition-colors no-underline">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span class="font-medium">
                    <span class="en-text">Back to Explore</span>
                    <span class="ar-text">العودة للاستكشاف</span>
                </span>
            </a>
        </div>
    </aside>

    <div x-show="sidebarOpen" class="fixed inset-0 bg-black/60 z-30 md:hidden backdrop-blur-sm" x-transition.opacity @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <header class="h-20 bg-dynamic-main/80 backdrop-blur-md border-b border-gray-800 flex items-center justify-between px-6 z-10 sticky top-0">
             <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none cursor-pointer">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
             </button>
             <div class="flex-1"></div>
             
             <div class="flex items-center gap-4 sm:gap-6">
                <button @click="toggleLang()" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-600 bg-gray-800 hover:bg-gray-700 transition-colors text-sm font-bold text-gray-200 cursor-pointer">
                    <span class="en-text font-arabic">ع</span>
                    <span class="ar-text">EN</span>
                </button>

                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-transparent border-none p-0 cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-dynamic border border-white/20 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ substr(Auth::user()->name ?? 'L', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right">
                            <div class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name ?? 'Local User' }}</div>
                            <div class="text-xs text-dynamic capitalize leading-tight">ابن البلد</div>
                        </div>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-2 ltr:right-0 rtl:left-0 w-48 bg-dynamic-sidebar rounded-xl border border-gray-700 shadow-2xl py-2 z-50" x-transition.opacity style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full ltr:text-left rtl:text-right px-4 py-2 text-sm text-red-400 hover:bg-gray-700 transition-colors cursor-pointer bg-transparent border-none">
                                <span class="en-text">Sign Out</span>
                                <span class="ar-text">تسجيل خروج</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative">
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold font-serif text-white mb-2">
                    <span class="en-text">يا هلا بابن البلد (Welcome)</span>
                    <span class="ar-text">يا هلا بابن البلد</span>
                </h1>
                <p class="text-gray-400">
                    <span class="en-text">Discover exclusive deals and share Jordan's best-kept secrets.</span>
                    <span class="ar-text">اكتشف عروضك الحصرية وشاركنا الأماكن المخفية في أردننا.</span>
                </p>
            </div>

            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    @foreach($localDeals as $deal)
                    <div class="bg-dynamic-sidebar border border-gray-800 rounded-2xl overflow-hidden shadow-lg hover:-translate-y-1 transition-transform group">
                        <div class="h-40 bg-gray-800 relative flex items-center justify-center overflow-hidden">
                            <div class="absolute inset-0 bg-dynamic opacity-20 group-hover:opacity-40 transition-opacity"></div>
                            <svg class="w-12 h-12 text-dynamic opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
                        </div>
                        <div class="p-5 relative">
                            <div class="absolute -top-6 ltr:right-4 rtl:left-4 bg-dynamic text-white font-bold px-3 py-1 rounded-full shadow-lg border border-white/20">
                                {{ $deal['discount'] }}
                            </div>
                            <h3 class="text-lg font-bold text-white mb-1">
                                <span class="en-text">{{ $deal['title_en'] }}</span>
                                <span class="ar-text">{{ $deal['title'] }}</span>
                            </h3>
                            <p class="text-gray-400 text-sm flex items-center gap-1">
                                <svg class="w-4 h-4 text-dynamic" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $deal['location'] }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-show="activeTab === 'submit_gem'" x-transition x-cloak>
                <div class="bg-dynamic-sidebar border border-gray-800 p-8 rounded-2xl shadow-2xl max-w-3xl mx-auto">
                    <form @submit.prevent="submitGem" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-300 text-sm font-medium mb-2">
                                    <span class="en-text">Attraction Name (English)</span><span class="ar-text">اسم المكان (إنجليزي)</span>
                                </label>
                                <input type="text" name="name" required class="w-full bg-[#111827] border border-gray-700 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-dynamic focus:ring-1 focus:ring-dynamic transition-colors">
                            </div>
                            <div>
                                <label class="block text-gray-300 text-sm font-medium mb-2">
                                    <span class="en-text">Attraction Name (Arabic)</span><span class="ar-text">اسم المكان (عربي)</span>
                                </label>
                                <input type="text" name="name_ar" required class="w-full bg-[#111827] border border-gray-700 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-dynamic focus:ring-1 focus:ring-dynamic transition-colors text-right" dir="rtl">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-300 text-sm font-medium mb-2">
                                    <span class="en-text">City</span><span class="ar-text">المدينة</span>
                                </label>
                                <select name="city_id" required class="w-full bg-[#111827] border border-gray-700 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-dynamic focus:ring-1 focus:ring-dynamic transition-colors appearance-none">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-300 text-sm font-medium mb-2">
                                    <span class="en-text">Category</span><span class="ar-text">التصنيف</span>
                                </label>
                                <select name="type" required class="w-full bg-[#111827] border border-gray-700 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-dynamic focus:ring-1 focus:ring-dynamic transition-colors appearance-none">
                                    <option value="historical">Historical / تاريخي</option>
                                    <option value="nature">Nature / طبيعة</option>
                                    <option value="cafe">Cafe & Food / مقاهي وطعام</option>
                                    <option value="activity">Activity / أنشطة</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">
                                <span class="en-text">Description</span><span class="ar-text">الوصف</span>
                            </label>
                            <textarea name="description" rows="4" required class="w-full bg-[#111827] border border-gray-700 text-white rounded-xl px-4 py-3 focus:outline-none focus:border-dynamic focus:ring-1 focus:ring-dynamic transition-colors"></textarea>
                        </div>

                        <button type="submit" :disabled="isSubmitting" class="btn-dynamic w-full py-4 rounded-xl text-lg flex justify-center items-center gap-2 border-none cursor-pointer">
                            <span x-show="!isSubmitting" class="en-text">Submit for Approval</span>
                            <span x-show="!isSubmitting" class="ar-text">إرسال للموافقة</span>
                            <span x-show="isSubmitting" class="en-text">Submitting...</span>
                            <span x-show="isSubmitting" class="ar-text">جاري الإرسال...</span>
                            <svg x-show="isSubmitting" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

            <div x-show="activeTab === 'contributions'" x-transition x-cloak>
                <div class="solid-panel overflow-hidden bg-dynamic-sidebar rounded-2xl border border-gray-800">
                    <div class="overflow-x-auto">
                        <table class="users-table w-full text-left rtl:text-right border-collapse">
                            <thead>
                                <tr class="border-b border-gray-800 bg-black/20 text-gray-400">
                                    <th class="p-5 font-normal"><span class="en-text">Attraction Name</span><span class="ar-text">اسم المكان</span></th>
                                    <th class="p-5 font-normal"><span class="en-text">City</span><span class="ar-text">المدينة</span></th>
                                    <th class="p-5 font-normal"><span class="en-text">Type</span><span class="ar-text">التصنيف</span></th>
                                    <th class="p-5 font-normal"><span class="en-text">Status</span><span class="ar-text">الحالة</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($myGems as $gem)
                                <tr class="hover:bg-white/5 transition-colors border-b border-gray-800/50">
                                    <td class="p-5 font-medium text-white">
                                        <span class="en-text">{{ $gem->name }}</span>
                                        <span class="ar-text">{{ $gem->name_ar ?? $gem->name }}</span>
                                    </td>
                                    <td class="p-5 text-gray-300">{{ $gem->city->name ?? 'N/A' }}</td>
                                    <td class="p-5 text-gray-400 capitalize">{{ $gem->type }}</td>
                                    <td class="p-5">
                                        @if($gem->status === 'pending')
                                            <span class="px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-400 text-xs font-bold border border-yellow-500/30">
                                                <span class="en-text">Pending</span><span class="ar-text">قيد المراجعة</span>
                                            </span>
                                        @elseif($gem->status === 'approved')
                                            <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-bold border border-emerald-500/30">
                                                <span class="en-text">Approved</span><span class="ar-text">مقبول</span>
                                            </span>
                                        @else
                                            <span class="px-3 py-1 rounded-full bg-red-500/20 text-red-400 text-xs font-bold border border-red-500/30">
                                                <span class="en-text">Rejected</span><span class="ar-text">مرفوض</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-10">
                                        <div class="flex flex-col items-center text-gray-500">
                                            <svg class="w-12 h-12 mb-3 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                            <p class="en-text">You haven't submitted any hidden gems yet.</p>
                                            <p class="ar-text">لم تقم بإضافة أي أماكن مخفية بعد.</p>
                                            <button @click="activeTab = 'submit_gem'" class="mt-4 text-dynamic hover:underline bg-transparent border-none cursor-pointer font-bold">
                                                <span class="en-text">Submit one now</span><span class="ar-text">شارك مكاناً الآن</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection