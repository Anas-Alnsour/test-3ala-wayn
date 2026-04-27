@php
    $cities = \App\Models\City::all();
    $myContributions = \App\Models\Attraction::with('city')->where('submitter_id', auth()->id())->latest()->get();
    
    // Simulated Local Deals
    $localDeals = [
        ['title' => 'Aqaba Scuba Diving', 'title_ar' => 'غوص في العقبة', 'discount' => '40% OFF', 'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=600&q=80'],
        ['title' => 'Wadi Rum Jeep Tour', 'title_ar' => 'جولة جيب في وادي رم', 'discount' => '25% OFF', 'image' => 'https://images.unsplash.com/photo-1540202404-b71180fb78d8?auto=format&fit=crop&w=600&q=80'],
        ['title' => 'Amman Citadel Guided Tour', 'title_ar' => 'جولة في جبل القلعة', 'discount' => 'FREE for Locals', 'image' => 'https://images.unsplash.com/photo-1579705745136-1c888bf1213f?auto=format&fit=crop&w=600&q=80'],
        ['title' => 'Dead Sea Mud Spa', 'title_ar' => 'طين البحر الميت', 'discount' => '30% OFF', 'image' => 'https://images.unsplash.com/photo-1582293041079-7814c2712be1?auto=format&fit=crop&w=600&q=80'],
    ];
@endphp
@extends('layouts.dashboard')

@section('content')
<div class="flex h-screen w-full bg-gray-900" x-data="{ 
    activeTab: 'overview', 
    sidebarOpen: false,
    gemForm: { name: '', region: '', type: 'historical', description: '' },
    submitGem() {
        fetch('{{ route('local.hidden-gems.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify(this.gemForm)
        }).then(res => res.json()).then(data => {
            this.showToast(data.message, data.message);
            this.gemForm = { name: '', region: '', type: 'historical', description: '' };
            this.activeTab = 'contributions';
            setTimeout(() => window.location.reload(), 1500);
        });
    }
}">

    <aside class="w-72 bg-[#1a1513] border-r border-gray-800 flex-shrink-0 hidden md:flex flex-col z-20" :class="{'block absolute inset-y-0 left-0': sidebarOpen, 'hidden': !sidebarOpen}">
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
                    :class="activeTab === 'overview' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                <span class="font-medium en-text">Local Deals</span>
                <span class="font-medium ar-text">عروض محلية</span>
            </button>
            <button @click="activeTab = 'submit_gem'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'submit_gem' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span class="font-medium en-text">Submit a Gem</span>
                <span class="font-medium ar-text">أضف مكان سري</span>
            </button>
            <button @click="activeTab = 'contributions'" 
                    class="w-full flex items-center gap-3 p-3 rounded-xl transition-all border-none cursor-pointer ltr:text-left rtl:text-right"
                    :class="activeTab === 'contributions' ? 'sidebar-active' : 'text-gray-400 hover:bg-gray-800 hover:text-white bg-transparent'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
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

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <header class="h-20 bg-[#1a1513]/80 backdrop-blur-md border-b border-gray-800 flex items-center justify-between px-6 z-10 sticky top-0">
             <button @click="sidebarOpen = true" class="md:hidden text-gray-400 hover:text-white bg-transparent border-none cursor-pointer">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
             </button>
             
             <div class="flex-1"></div>
             
             <div class="flex items-center gap-4 sm:gap-6">
                <!-- Language Toggle -->
                <button @click="toggleLang()" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-600 bg-gray-800 hover:bg-gray-700 transition-colors text-sm font-bold text-gray-200 cursor-pointer">
                    <span class="en-text font-arabic">ع</span>
                    <span class="ar-text">EN</span>
                </button>

                <!-- Profile Dropdown -->
                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 focus:outline-none bg-transparent border-none p-0 cursor-pointer">
                        <div class="w-10 h-10 rounded-full bg-dynamic border border-white/20 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ substr(Auth::user()->name ?? 'L', 0, 1) }}
                        </div>
                        <div class="hidden md:block ltr:text-left rtl:text-right">
                            <div class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name ?? 'Local User' }}</div>
                            <div class="text-xs text-dynamic capitalize leading-tight">Local</div>
                        </div>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute top-full mt-2 ltr:right-0 rtl:left-0 w-48 bg-gray-800 rounded-xl border border-gray-700 shadow-2xl py-2 z-50" x-transition.opacity style="display: none;">
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
                    <span class="en-text">Welcome, Son of the Country</span>
                    <span class="ar-text">يا هلا بابن البلد</span>
                </h1>
                <p class="text-gray-400">
                    <span class="en-text">Share the real Jordan with the world and enjoy your exclusive benefits.</span>
                    <span class="ar-text">شارك الأردن الحقيقي مع العالم واستمتع بعروضك الحصرية.</span>
                </p>
            </div>

            <div x-show="activeTab === 'overview'" x-transition x-cloak>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    @foreach($localDeals as $deal)
                    <div class="solid-panel rounded-2xl overflow-hidden group cursor-pointer border border-gray-800 hover:border-dynamic transition-colors">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $deal['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $deal['title'] }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#111827] to-transparent"></div>
                            <div class="absolute bottom-4 ltr:left-4 rtl:right-4">
                                <span class="px-3 py-1 bg-dynamic text-white text-xs font-bold rounded-full uppercase tracking-wider">{{ $deal['discount'] }}</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-white mb-2">
                                <span class="en-text">{{ $deal['title'] }}</span>
                                <span class="ar-text">{{ $deal['title_ar'] }}</span>
                            </h3>
                            <button class="w-full mt-4 py-2 bg-gray-800 hover:bg-gray-700 text-dynamic font-bold rounded-lg transition-colors border border-gray-700 text-sm cursor-pointer">
                                <span class="en-text">Claim Deal</span>
                                <span class="ar-text">احصل على العرض</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-show="activeTab === 'submit_gem'" x-transition x-cloak>
                <div class="solid-panel p-6 md:p-10 max-w-4xl mx-auto rounded-2xl border-t-4 border-dynamic shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                    <h2 class="text-2xl font-bold font-serif text-white mb-6">
                        <span class="en-text">Submit a Hidden Gem</span>
                        <span class="ar-text">أضف مكان سري</span>
                    </h2>
                    
                    <form @submit.prevent="submitGem" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <span class="en-text">Name of the Place</span>
                                    <span class="ar-text">اسم المكان</span>
                                </label>
                                <input type="text" x-model="gemForm.name" required class="glass-input-premium w-full" placeholder="e.g. Abu Jbara Falafel">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">
                                    <span class="en-text">City/Region</span>
                                    <span class="ar-text">المدينة/المنطقة</span>
                                </label>
                                <select x-model="gemForm.region" required class="glass-input-premium w-full">
                                    <option value="" disabled selected>Select a city</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }} / {{ $city->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                <span class="en-text">Category</span>
                                <span class="ar-text">التصنيف</span>
                            </label>
                            <select x-model="gemForm.type" required class="glass-input-premium w-full md:w-1/2">
                                <option value="historical">Historical & Cultural / تاريخي وثقافي</option>
                                <option value="nature">Nature & Hiking / طبيعة ومسارات</option>
                                <option value="food">Local Food & Cafe / مطاعم ومقاهي</option>
                                <option value="experience">Unique Experience / تجربة فريدة</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                <span class="en-text">Why is this a hidden gem?</span>
                                <span class="ar-text">ليش هذا المكان مميز ومخفي؟</span>
                            </label>
                            <textarea x-model="gemForm.description" required rows="4" class="glass-input-premium w-full resize-none" placeholder="Describe what makes this place special..."></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full py-4 btn-dynamic text-lg font-bold rounded-xl transition-all shadow-lg">
                                <span class="en-text">Submit for Approval</span>
                                <span class="ar-text">إرسال للموافقة</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div x-show="activeTab === 'contributions'" x-transition x-cloak>
                <div class="solid-panel overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-800 bg-[#1F2937]">
                        <h3 class="text-lg font-bold text-white">
                            <span class="en-text">My Submissions</span>
                            <span class="ar-text">اقتراحاتي</span>
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="users-table">
                            <thead>
                                <tr>
                                    <th><span class="en-text">Name</span><span class="ar-text">الاسم</span></th>
                                    <th><span class="en-text">City</span><span class="ar-text">المدينة</span></th>
                                    <th><span class="en-text">Category</span><span class="ar-text">التصنيف</span></th>
                                    <th><span class="en-text">Status</span><span class="ar-text">الحالة</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($myContributions as $gem)
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="font-medium text-white">
                                        <span class="en-text">{{ $gem->name }}</span>
                                        <span class="ar-text">{{ $gem->name_ar ?? $gem->name }}</span>
                                    </td>
                                    <td class="text-gray-300">{{ $gem->city->name ?? 'N/A' }}</td>
                                    <td class="text-gray-400 capitalize">{{ str_replace('_', ' ', $gem->type) }}</td>
                                    <td>
                                        @if($gem->status === 'approved')
                                            <span class="px-2 py-1 rounded bg-emerald-500/20 text-emerald-400 text-xs font-bold uppercase border border-emerald-500/30">Approved</span>
                                        @elseif($gem->status === 'rejected')
                                            <span class="px-2 py-1 rounded bg-red-500/20 text-red-400 text-xs font-bold uppercase border border-red-500/30">Rejected</span>
                                        @else
                                            <span class="px-2 py-1 rounded bg-yellow-500/20 text-yellow-400 text-xs font-bold uppercase border border-yellow-500/30">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-8 text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 mb-3 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                            <span class="en-text">You haven't submitted any gems yet.</span>
                                            <span class="ar-text">لم تقم بإضافة أي أماكن بعد.</span>
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
