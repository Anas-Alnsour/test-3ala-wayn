@extends('layouts.dashboard')

@section('sidebar_links')
    <a href="#" @click.prevent="activeTab = 'overview'" class="nav-link" :class="{ 'active': activeTab === 'overview' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        <span class="en-text">Upcoming Tours</span>
        <span class="ar-text">جولاتي الجاية</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'availability'" class="nav-link" :class="{ 'active': activeTab === 'availability' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        <span class="en-text">Set Availability</span>
        <span class="ar-text">أوقات الفراغ</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'routes'" class="nav-link" :class="{ 'active': activeTab === 'routes' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
        <span class="en-text">Hiking Routes</span>
        <span class="ar-text">المسارات</span>
    </a>
@endsection

@section('content')
<div x-data="{ activeTab: 'overview' }">

    <!-- Overview Tab (Cinematic Blended Header) -->
    <div x-show="activeTab === 'overview'" x-transition.opacity.duration.300ms>
        
        <!-- Cinematic Header -->
        <div class="relative h-64 md:h-80 rounded-2xl overflow-hidden mb-8 border border-white/10 shadow-2xl">
            <img src="https://images.unsplash.com/photo-1542401886-65d6c61db217?q=80&w=1200&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover" alt="Wadi Rum Guide">
            <div class="absolute inset-0 bg-gradient-to-t from-[#111827] via-[#111827]/70 to-transparent"></div>
            
            <div class="absolute bottom-0 left-0 right-0 p-8">
                <div class="flex items-end justify-between">
                    <div>
                        <span class="px-3 py-1 bg-amber-500/20 text-amber-500 text-xs font-bold rounded-full mb-3 inline-block border border-amber-500/30 uppercase tracking-wider">Top Rated Guide</span>
                        <h1 class="text-3xl md:text-4xl font-bold font-serif text-white mb-2">
                            <span class="en-text">Welcome Back, Captain</span>
                            <span class="ar-text">يا هلا بالكابتن</span>
                        </h1>
                        <p class="text-gray-300 max-w-xl">
                            <span class="en-text">You have 3 upcoming tours this week. Let's show them the real Jordan.</span>
                            <span class="ar-text">عندك 3 جولات قادمة هذا الأسبوع. خلينا نورجيهم الأردن الحقيقي.</span>
                        </p>
                    </div>
                    
                    <div class="hidden md:flex gap-4">
                        <div class="text-center px-4 border-r border-white/20 rtl:border-r-0 rtl:border-l">
                            <div class="text-3xl font-bold text-white">4.9</div>
                            <div class="text-xs text-amber-500 flex gap-1 justify-center mt-1">
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            </div>
                        </div>
                        <div class="text-center px-4">
                            <div class="text-3xl font-bold text-white">42</div>
                            <div class="text-xs text-gray-400 mt-1 uppercase tracking-wider">Tours Done</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-xl font-bold text-white mb-6">
            <span class="en-text">Upcoming Tours</span>
            <span class="ar-text">الجولات القادمة</span>
        </h3>

        <div class="space-y-4">
            <!-- Tour Card -->
            <div class="solid-panel p-5 border-l-4 border-l-amber-500 rtl:border-l-0 rtl:border-r-4 rtl:border-r-amber-500 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-lg bg-gray-800 border border-white/10 flex flex-col items-center justify-center text-center">
                        <span class="text-xs text-amber-500 font-bold uppercase">Oct</span>
                        <span class="text-xl text-white font-bold leading-none">28</span>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white mb-1">Wadi Mujib Siq Trail</h4>
                        <div class="text-sm text-gray-400 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            08:00 AM - 12:00 PM
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center gap-6">
                    <div class="text-right rtl:text-left">
                        <div class="text-sm text-white font-medium">Group of 4</div>
                        <div class="text-xs text-gray-400">Lead: Sarah Jenkins</div>
                    </div>
                    <button class="px-4 py-2 bg-white/5 hover:bg-white/10 border border-white/10 text-white text-sm font-bold rounded-lg transition-colors">
                        <span class="en-text">View Details</span>
                        <span class="ar-text">التفاصيل</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Availability Tab -->
    <div x-show="activeTab === 'availability'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="solid-panel p-6 max-w-4xl mx-auto">
            <h3 class="text-xl font-bold text-white mb-6">
                <span class="en-text">Set Availability</span>
                <span class="ar-text">تحديد أوقات الفراغ</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Simple toggle list for days -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 border border-white/10 rounded-lg bg-gray-800/50 hover:bg-gray-800 transition-colors">
                        <div class="font-bold text-white">Sunday / الأحد</div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 border border-emerald-500/30 rounded-lg bg-emerald-900/10">
                        <div class="font-bold text-white">Monday / الإثنين</div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between p-4 border border-white/10 rounded-lg bg-gray-800/50 hover:bg-gray-800 transition-colors">
                        <div class="font-bold text-white">Tuesday / الثلاثاء</div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                        </label>
                    </div>
                </div>

                <div class="border-l border-white/10 rtl:border-l-0 rtl:border-r md:pl-8 md:rtl:pr-8">
                    <h4 class="font-bold text-white mb-4">Monday Time Slots</h4>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 text-gray-300 cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 rounded border-gray-600 text-amber-500 focus:ring-amber-500 bg-gray-700">
                            08:00 AM - 12:00 PM (Morning)
                        </label>
                        <label class="flex items-center gap-3 text-gray-300 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-600 text-amber-500 focus:ring-amber-500 bg-gray-700">
                            01:00 PM - 05:00 PM (Afternoon)
                        </label>
                        <label class="flex items-center gap-3 text-gray-300 cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 rounded border-gray-600 text-amber-500 focus:ring-amber-500 bg-gray-700">
                            06:00 PM - 10:00 PM (Evening/Night)
                        </label>
                    </div>
                    
                    <button class="mt-8 w-full py-2 bg-amber-600 hover:bg-amber-500 text-white font-bold rounded transition-colors shadow-[0_0_15px_rgba(217,119,6,0.3)]">
                        Save Availability
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Routes Tab -->
    <div x-show="activeTab === 'routes'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="solid-panel p-6 lg:p-10 max-w-4xl mx-auto border-t-4 border-t-amber-500">
            <h3 class="text-2xl font-bold text-white mb-6">
                <span class="en-text">Define New Hiking Route</span>
                <span class="ar-text">إضافة مسار جديد</span>
            </h3>
            
            <form class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Route Name</span><span class="ar-text">اسم المسار</span>
                    </label>
                    <input type="text" class="glass-input-premium" placeholder="e.g. Dana to Feynan Trail">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Difficulty</span><span class="ar-text">الصعوبة</span>
                        </label>
                        <select class="glass-input-premium">
                            <option>Easy / سهل</option>
                            <option>Moderate / متوسط</option>
                            <option>Hard / صعب</option>
                            <option>Extreme / شديد الصعوبة</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Duration (Hours)</span><span class="ar-text">المدة (ساعات)</span>
                        </label>
                        <input type="number" class="glass-input-premium" placeholder="4">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Price (JOD)</span><span class="ar-text">السعر (دينار)</span>
                        </label>
                        <input type="number" class="glass-input-premium" placeholder="25">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Description</span><span class="ar-text">الوصف</span>
                    </label>
                    <textarea class="glass-input-premium h-32 resize-none" placeholder="Describe the terrain, what they need to bring, etc."></textarea>
                </div>

                <div class="pt-4">
                    <button type="button" class="w-full py-3 bg-gradient-to-r from-amber-600 to-amber-800 hover:from-amber-500 hover:to-amber-700 text-white font-bold rounded-lg transition-all shadow-lg shadow-amber-900/20">
                        <span class="en-text">Submit Route for Approval</span>
                        <span class="ar-text">إرسال المسار للموافقة</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
