@extends('layouts.dashboard')

@section('sidebar_links')
    <a href="#" @click.prevent="activeTab = 'overview'" class="nav-link" :class="{ 'active': activeTab === 'overview' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
        <span class="en-text">Overview</span>
        <span class="ar-text">نظرة عامة</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'submit_gem'" class="nav-link" :class="{ 'active': activeTab === 'submit_gem' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <span class="en-text">Submit a Gem</span>
        <span class="ar-text">شارك مكان</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'contributions'" class="nav-link" :class="{ 'active': activeTab === 'contributions' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        <span class="en-text">My Contributions</span>
        <span class="ar-text">مساهماتي</span>
    </a>
@endsection

@section('content')
<div x-data="{ activeTab: 'overview' }">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold font-serif text-white mb-2">
            <span class="en-text">Welcome, Son of the Country</span>
            <span class="ar-text">يا هلا بابن البلد</span>
        </h1>
        <p class="text-gray-400">
            <span class="en-text">Share the real Jordan and unlock exclusive deals for locals.</span>
            <span class="ar-text">شارك الأردن الحقيقي واستمتع بعروض حصرية للأردنيين.</span>
        </p>
    </div>

    <!-- Overview Tab -->
    <div x-show="activeTab === 'overview'" x-transition.opacity.duration.300ms>
        <h3 class="text-xl font-bold text-amber-500 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="en-text">Exclusive Local Deals</span>
            <span class="ar-text">عروض حصرية للأردنيين</span>
        </h3>
        
        <div class="cities-grid">
            <!-- Deal Card -->
            <div class="solid-panel overflow-hidden group cursor-pointer relative">
                <div class="absolute top-4 right-4 z-10 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                    50% OFF
                </div>
                <div class="h-48 bg-gray-800 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542401886-65d6c61db217?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Wadi Rum">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1F2937] to-transparent"></div>
                </div>
                <div class="p-5 relative z-10">
                    <h4 class="text-lg font-bold text-white mb-1">
                        <span class="en-text">Wadi Rum Desert Camp</span>
                        <span class="ar-text">مخيم وادي رم الصحراوي</span>
                    </h4>
                    <p class="text-gray-400 text-sm mb-4">
                        <span class="en-text">Valid for Jordanian ID holders only.</span>
                        <span class="ar-text">صالح لحاملي الهوية الأردنية فقط.</span>
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <span class="text-gray-500 line-through text-xs">80 JD</span>
                            <span class="text-amber-500 font-bold text-lg ml-2">40 JD</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-600 hover:bg-amber-500 text-white text-sm font-bold rounded-lg transition-colors">
                            <span class="en-text">Claim Deal</span>
                            <span class="ar-text">احصل على العرض</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Deal Card -->
            <div class="solid-panel overflow-hidden group cursor-pointer relative">
                <div class="absolute top-4 right-4 z-10 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                    30% OFF
                </div>
                <div class="h-48 bg-gray-800 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1580834341580-8c17a3a63ebc?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Dead Sea Spa">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1F2937] to-transparent"></div>
                </div>
                <div class="p-5 relative z-10">
                    <h4 class="text-lg font-bold text-white mb-1">
                        <span class="en-text">Dead Sea Resort Day Pass</span>
                        <span class="ar-text">دخولية منتجع البحر الميت</span>
                    </h4>
                    <p class="text-gray-400 text-sm mb-4">
                        <span class="en-text">Includes lunch buffer and pool access.</span>
                        <span class="ar-text">يشمل بوفيه الغداء واستخدام المسابح.</span>
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <span class="text-gray-500 line-through text-xs">50 JD</span>
                            <span class="text-amber-500 font-bold text-lg ml-2">35 JD</span>
                        </div>
                        <button class="px-4 py-2 bg-amber-600 hover:bg-amber-500 text-white text-sm font-bold rounded-lg transition-colors">
                            <span class="en-text">Claim Deal</span>
                            <span class="ar-text">احصل على العرض</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Gem Tab -->
    <div x-show="activeTab === 'submit_gem'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="solid-panel p-6 lg:p-10 max-w-3xl mx-auto border-t-4 border-t-amber-600">
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-full bg-amber-500/20 text-amber-500 flex items-center justify-center mx-auto mb-4 border border-amber-500/50">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">
                    <span class="en-text">Share a Hidden Gem</span>
                    <span class="ar-text">شارك مكان مخفي</span>
                </h2>
                <p class="text-gray-400">
                    <span class="en-text">Know a place tourists don't usually see? Share it with the world.</span>
                    <span class="ar-text">بتعرف مكان السياح ما بيشوفوه؟ شاركه مع العالم.</span>
                </p>
            </div>

            <form class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Place Name</span><span class="ar-text">اسم المكان</span>
                    </label>
                    <input type="text" class="glass-input-premium" placeholder="e.g. Ain Qunya Waterfall / شلال عين قينيا">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Region / Governorate</span><span class="ar-text">المحافظة</span>
                        </label>
                        <select class="glass-input-premium">
                            <option value="">Select...</option>
                            <option value="amman">Amman</option>
                            <option value="ajloun">Ajloun</option>
                            <option value="salt">As-Salt</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">GPS Coordinates</span><span class="ar-text">إحداثيات GPS</span>
                        </label>
                        <div class="flex">
                            <input type="text" class="glass-input-premium rounded-r-none rtl:rounded-r-lg rtl:rounded-l-none" placeholder="32.0123, 35.8456">
                            <button type="button" class="bg-gray-700 px-4 rounded-r-lg rtl:rounded-r-none rtl:rounded-l-lg border border-l-0 rtl:border-l rtl:border-r-0 border-white/10 text-gray-300 hover:text-white transition-colors flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Description & Authentic Context</span><span class="ar-text">الوصف والسياق الأصيل</span>
                    </label>
                    <textarea class="glass-input-premium h-32 resize-none" placeholder="What makes this place special? / شو اللي بيميز هالمكان؟"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Upload Images</span><span class="ar-text">رفع الصور</span>
                    </label>
                    <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center hover:border-amber-500 transition-colors cursor-pointer bg-gray-800/50">
                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-gray-400 text-sm">
                            <span class="en-text">Click to upload or drag and drop</span><span class="ar-text">اضغط للرفع أو اسحب وأفلت</span>
                        </p>
                        <p class="text-gray-500 text-xs mt-1">PNG, JPG up to 10MB</p>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="button" class="w-full py-3 bg-gradient-to-r from-amber-600 to-amber-800 hover:from-amber-500 hover:to-amber-700 text-white font-bold rounded-lg transition-all shadow-lg shadow-amber-900/20">
                        <span class="en-text">Submit for Review</span>
                        <span class="ar-text">إرسال للمراجعة</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Contributions Tab -->
    <div x-show="activeTab === 'contributions'" style="display: none;" x-transition.opacity.duration.300ms>
        <div class="solid-panel overflow-hidden">
            <div class="px-6 py-4 border-b border-white/10">
                <h3 class="text-lg font-bold text-white">
                    <span class="en-text">Your Submitted Gems</span>
                    <span class="ar-text">الأماكن اللي شاركتها</span>
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th><span class="en-text">Place</span><span class="ar-text">المكان</span></th>
                            <th><span class="en-text">Date Submitted</span><span class="ar-text">تاريخ الإرسال</span></th>
                            <th><span class="en-text">Status</span><span class="ar-text">الحالة</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="font-medium text-white flex items-center gap-3">
                                <div class="w-10 h-10 rounded bg-gray-700 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1542401886-65d6c61db217?w=100&q=80" class="w-full h-full object-cover">
                                </div>
                                Wadi Bin Hammad Secret Trail
                            </td>
                            <td class="text-gray-400">Oct 24, 2023</td>
                            <td><span class="px-2 py-1 rounded-full bg-amber-500/20 text-amber-500 text-xs font-bold uppercase tracking-wider">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
