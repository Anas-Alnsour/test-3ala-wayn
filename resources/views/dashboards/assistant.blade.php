@php
    // Simulated Data for Assistant
    $upcomingTours = [
        (object)[
            'id' => 1, 
            'tourist_name' => 'Michael Smith',
            'route_name' => 'Wadi Mujib Siq Trail', 
            'route_name_ar' => 'مسار السيق في وادي الموجب', 
            'date' => now()->addDays(2)->format('M d, Y'), 
            'day_num' => now()->addDays(2)->format('d'),
            'month_short' => now()->addDays(2)->format('M'),
            'time' => '08:00 AM - 12:00 PM', 
            'group_size' => 4, 
        ],
        (object)[
            'id' => 2, 
            'tourist_name' => 'Elena Rossi',
            'route_name' => 'Dana Biosphere Reserve Hike', 
            'route_name_ar' => 'مسار محمية ضانا', 
            'date' => now()->addDays(4)->format('M d, Y'), 
            'day_num' => now()->addDays(4)->format('d'),
            'month_short' => now()->addDays(4)->format('M'),
            'time' => '06:00 AM - 02:00 PM', 
            'group_size' => 2, 
        ],
    ];
@endphp
@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-dynamic-main text-white font-sans" x-data="{ 
    activeTab: 'overview', 
    sidebarOpen: false,
    
    slotForm: { date: '', shift: 'morning', capacity: 4 },
    
    saveAvailability() {
        if (!this.slotForm.date) {
            this.showToast('Please select a date', 'الرجاء اختيار تاريخ');
            return;
        }
        // Simulated submission
        this.showToast('Availability slot opened successfully!', 'تم فتح موعد جديد بنجاح!');
        this.slotForm = { date: '', shift: 'morning', capacity: 4 };
        this.activeTab = 'overview';
    },

    viewTourDetails(name) {
        this.showToast('Loading details for ' + name + '...', 'جاري تحميل تفاصيل ' + name + '...');
    }
}">

    <aside class="w-72 bg-dynamic-sidebar border-r border-gray-800 flex-shrink-0 hidden md:flex flex-col z-20 transition-all duration-300" :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">
        <div class="p-6 border-b border-gray-800 flex justify-between items-center">
             <a href="/" class="flex items-center gap-2 no-underline group">
                <svg viewBox="0 0 100 100" fill="none" class="w-8 h-8 transition-transform duration-500 group-hover:rotate-45">
                    <path d="M50 0L57.5 35L93.3 25L70 50L93.3 75L57.5 65L50 100L42.5 65L6.7 75L30 50L6.7 25L42.5 35L50 0Z" class="fill-dynamic"/>
                    <circle cx="50" cy="50" r="15" fill="#111827"/>
                    <circle cx="50" cy="50" r="5" class="fill-dynamic"/>
                </svg>
                <span class="text-xl font-bold text-white en-text">Wayn?</span>
                <span class="text-xl font-bold text-white ar-text">وين؟</span>
             </a>
             <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>
        </div>

        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <button @click="activeTab = 'overview'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'overview' ? 'sidebar-active' : 'text-gray-400 hover:bg-white/5 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                <span class="font-medium en-text">Upcoming Tours</span>
                <span class="font-medium ar-text">جولاتي الجاية</span>
            </button>
            <button @click="activeTab = 'availability'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'availability' ? 'sidebar-active' : 'text-gray-400 hover:bg-white/5 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="font-medium en-text">Set Availability</span>
                <span class="font-medium ar-text">أوقات الفراغ</span>
            </button>
        </nav>
        
        <div class="p-4 border-t border-gray-800">
            <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5 transition-colors no-underline">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span class="font-medium">
                    <span class="en-text">Back to Explore</span>
                    <span class="ar-text">العودة للاستكشاف</span>
                </span>
            </a>
        </div>
    </aside>

    <div x-show="sidebarOpen" 
         class="fixed inset-0 bg-black/60 z-30 md:hidden backdrop-blur-sm"
         x-transition.opacity
         @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <header class="h-20 bg-dynamic-main/80 backdrop-blur-md border-b border-gray-800 flex items-center justify-between px-6 z-10 sticky top-0">
             <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none cursor-pointer">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
             </button>
             
             <div class="flex-1"></div>
             
             <div class="flex items-center gap-4 sm:gap-6">
                <!-- Language Toggle -->
                <button @click="toggleLang()" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-600 bg-dynamic-sidebar hover:bg-white/10 transition-colors text-sm font-bold text-gray-200 cursor-pointer">
                    <span class="en-text font-arabic">ع</span>
                    <span class="ar-text">EN</span>
                </button>

                <!-- Profile Dropdown -->
                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-transparent border-none p-0 cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-dynamic border border-white/20 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ substr(Auth::user()->name ?? 'C', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right">
                            <div class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name ?? 'Captain Guide' }}</div>
                            <div class="text-xs text-dynamic capitalize leading-tight">Assistant</div>
                        </div>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-2 ltr:right-0 rtl:left-0 w-48 bg-dynamic-sidebar rounded-xl border border-gray-700 shadow-2xl py-2 z-50" x-transition.opacity style="display: none;">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full ltr:text-left rtl:text-right px-4 py-2 text-sm text-red-400 hover:bg-white/5 transition-colors cursor-pointer bg-transparent border-none">
                                <span class="en-text">Sign Out</span>
                                <span class="ar-text">تسجيل خروج</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10 relative">
            
            <div x-show="activeTab === 'overview'" x-transition x-cloak class="mb-8">
                <div class="relative h-64 md:h-80 rounded-2xl overflow-hidden mb-8 border border-gray-800 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1540202404-b71180fb78d8?auto=format&fit=crop&w=1200&q=80" class="absolute inset-0 w-full h-full object-cover" alt="Wadi Rum Guide">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#111827] via-[#111827]/70 to-transparent"></div>
                    
                    <div class="absolute bottom-0 left-0 right-0 p-8">
                        <div class="flex items-end justify-between">
                            <div>
                                <span class="px-3 py-1 bg-dynamic/20 text-dynamic text-xs font-bold rounded-full mb-3 inline-block border border-dynamic/30 uppercase tracking-wider">Top Rated Guide</span>
                                <h1 class="text-3xl md:text-4xl font-bold font-serif text-white mb-2">
                                    <span class="en-text">Welcome Back, Captain</span>
                                    <span class="ar-text">يا هلا بالكابتن</span>
                                </h1>
                                <p class="text-gray-300 max-w-xl">
                                    <span class="en-text">You have {{ count($upcomingTours) }} upcoming tours this week. Let's show them the real Jordan.</span>
                                    <span class="ar-text">عندك {{ count($upcomingTours) }} جولات قادمة هذا الأسبوع. خلينا نورجيهم الأردن الحقيقي.</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-white mb-6">
                    <span class="en-text">Upcoming Tours</span>
                    <span class="ar-text">الجولات القادمة</span>
                </h3>

                <div class="space-y-4">
                    @foreach($upcomingTours as $tour)
                    <div class="solid-panel p-5 border-l-4 border-dynamic rtl:border-l-0 rtl:border-r-4 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-colors hover:bg-white/5 bg-dynamic-sidebar">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-lg bg-dynamic-main border border-gray-700 flex flex-col items-center justify-center text-center shadow-inner">
                                <span class="text-xs text-dynamic font-bold uppercase">{{ $tour->month_short }}</span>
                                <span class="text-xl text-white font-bold leading-none">{{ $tour->day_num }}</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white mb-1">
                                    <span class="en-text">{{ $tour->route_name }}</span>
                                    <span class="ar-text">{{ $tour->route_name_ar }}</span>
                                </h4>
                                <div class="text-sm text-gray-400 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $tour->time }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-6">
                            <div class="text-right rtl:text-left">
                                <div class="text-sm text-white font-medium">Tourist: {{ $tour->tourist_name }}</div>
                                <div class="text-xs text-dynamic font-bold">Group of {{ $tour->group_size }}</div>
                            </div>
                            <button @click="viewTourDetails('{{ addslashes($tour->route_name) }}')" class="px-4 py-2 bg-dynamic-main hover:bg-white/10 border border-gray-700 text-white text-sm font-bold rounded-lg transition-colors cursor-pointer shadow-md">
                                <span class="en-text">View Details</span>
                                <span class="ar-text">التفاصيل</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-show="activeTab === 'availability'" x-transition x-cloak>
                <div class="solid-panel p-6 md:p-10 max-w-4xl mx-auto rounded-2xl border-t-4 border-dynamic shadow-[0_10px_40px_rgba(0,0,0,0.5)] bg-dynamic-sidebar">
                    <h3 class="text-2xl font-bold font-serif text-white mb-6">
                        <span class="en-text">Open New Slot</span>
                        <span class="ar-text">فتح موعد جديد</span>
                    </h3>

                    <form @submit.prevent="saveAvailability" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <span class="en-text">Select Date</span>
                                    <span class="ar-text">اختر التاريخ</span>
                                </label>
                                <input type="date" x-model="slotForm.date" required class="glass-input-premium w-full bg-dynamic-main border border-gray-700 text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <span class="en-text">Shift</span>
                                    <span class="ar-text">الفترة</span>
                                </label>
                                <select x-model="slotForm.shift" required class="glass-input-premium w-full bg-dynamic-main border border-gray-700 text-white">
                                    <option value="morning">Morning / صباحي</option>
                                    <option value="afternoon">Afternoon / مسائي</option>
                                    <option value="full_day">Full Day / يوم كامل</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                <span class="en-text">Max Capacity (Tourists)</span>
                                <span class="ar-text">الحد الأقصى للسياح</span>
                            </label>
                            <input type="number" x-model="slotForm.capacity" min="1" max="20" required class="glass-input-premium w-full md:w-1/2 bg-dynamic-main border border-gray-700 text-white" placeholder="4">
                        </div>

                        <div class="pt-4 border-t border-gray-800 mt-6">
                            <button type="submit" class="w-full md:w-auto px-8 py-3 btn-dynamic text-lg font-bold rounded-xl transition-all shadow-lg border-none cursor-pointer">
                                <span class="en-text">Open Availability</span>
                                <span class="ar-text">حفظ الأوقات</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
