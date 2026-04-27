@php
    $menuScans = number_format(rand(1000, 3000));
    $platformReferrals = number_format(rand(200, 800));
    
    // Simulated active offers
    $activeOffers = [
        (object)[
            'name' => 'Mansaf Friday Special', 
            'name_ar' => 'عرض منسف يوم الجمعة', 
            'original_price' => 20.00, 
            'discount_price' => 14.00, 
            'valid_until' => '18:00', 
            'active' => true
        ],
        (object)[
            'name' => 'Authentic Mixed Grill', 
            'name_ar' => 'مشاوي مشكلة أصيلة', 
            'original_price' => 30.00, 
            'discount_price' => 22.00, 
            'valid_until' => '23:00', 
            'active' => false
        ],
        (object)[
            'name' => 'Kunafa & Turkish Coffee', 
            'name_ar' => 'كنافة وقهوة تركية', 
            'original_price' => 8.00, 
            'discount_price' => 5.00, 
            'valid_until' => '16:00', 
            'active' => true
        ],
    ];
@endphp
@extends('layouts.dashboard')

@section('sidebar_links')
    <a href="#" @click.prevent="activeTab = 'overview'" class="nav-link" :class="{ 'active': activeTab === 'overview' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
        <span class="en-text">Metrics</span>
        <span class="ar-text">الإحصائيات</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'post_offer'" class="nav-link" :class="{ 'active': activeTab === 'post_offer' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        <span class="en-text">Post Offer</span>
        <span class="ar-text">إضافة عرض</span>
    </a>
    <a href="#" @click.prevent="activeTab = 'active_offers'" class="nav-link" :class="{ 'active': activeTab === 'active_offers' }">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        <span class="en-text">Active Offers</span>
        <span class="ar-text">العروض النشطة</span>
    </a>
@endsection

@section('content')
<div x-data="{
    formOffer: { name: '', original: '', discount: '', time: '', audience: 'all' },
    offers: {{ json_encode($activeOffers) }},
    postOffer() {
        if (!this.formOffer.name || !this.formOffer.discount) {
            this.showToast('Please fill all required fields.', 'الرجاء تعبئة جميع الحقول المطلوبة.');
            return;
        }
        this.offers.unshift({
            name: this.formOffer.name,
            name_ar: this.formOffer.name,
            original_price: parseFloat(this.formOffer.original) || 0,
            discount_price: parseFloat(this.formOffer.discount) || 0,
            valid_until: this.formOffer.time || '23:59',
            active: true
        });
        this.showToast('Offer Published Successfully!', 'تم نشر العرض بنجاح!');
        this.formOffer = { name: '', original: '', discount: '', time: '', audience: 'all' };
        this.activeTab = 'active_offers';
    },
    toggleOffer(index) {
        this.offers[index].active = !this.offers[index].active;
        if(this.offers[index].active) {
            this.showToast('Offer Activated', 'تم تفعيل العرض');
        } else {
            this.showToast('Offer Paused', 'تم إيقاف العرض');
        }
    }
}">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold font-serif text-white mb-2">
            <span class="en-text">Restaurant Partner Center</span>
            <span class="ar-text">مركز شركاء المطاعم</span>
        </h1>
        <p class="text-gray-400">
            <span class="en-text">Drive food tourism via limited-time offers and analyze your performance.</span>
            <span class="ar-text">عزز السياحة الغذائية عبر عروض محدودة الوقت وحلل أداءك.</span>
        </p>
    </div>

    <!-- Overview Tab -->
    <div x-cloak x-show="activeTab === 'overview'" x-transition.opacity.duration.300ms>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="stat-card">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Menu Scans</span>
                    <span class="ar-text">مسحات المنيو</span>
                </div>
                <div class="text-4xl font-bold text-white mb-2">{{ $menuScans }}</div>
                <div class="text-emerald-500 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    <span>+24% <span class="en-text">this week</span><span class="ar-text">هذا الأسبوع</span></span>
                </div>
            </div>
            
            <div class="stat-card border-dynamic shadow-[0_0_15px_color-mix(in_srgb,var(--dynamic-primary)_20%,transparent)]">
                <div class="text-gray-400 text-sm font-medium mb-1">
                    <span class="en-text">Platform Referrals</span>
                    <span class="ar-text">زوار من وين؟</span>
                </div>
                <div class="text-4xl font-bold text-dynamic mb-2">{{ $platformReferrals }}</div>
                <div class="text-emerald-500 text-sm flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    <span>+12% <span class="en-text">this week</span><span class="ar-text">هذا الأسبوع</span></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Offer Tab -->
    <div x-cloak x-show="activeTab === 'post_offer'" x-transition.opacity.duration.300ms>
        <div class="solid-panel p-6 lg:p-10 max-w-4xl mx-auto border-t-4 border-dynamic">
            <h3 class="text-2xl font-bold text-white mb-6">
                <span class="en-text">Post Daily Offer</span>
                <span class="ar-text">نشر عرض يومي</span>
            </h3>
            
            <form class="space-y-6" @submit.prevent="postOffer">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        <span class="en-text">Meal / Offer Name</span><span class="ar-text">اسم الوجبة / العرض</span>
                    </label>
                    <input type="text" x-model="formOffer.name" required class="glass-input-premium" placeholder="e.g. Traditional Mansaf Experience / تجربة المنسف الأصيل">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Original Price (JOD)</span><span class="ar-text">السعر الأصلي (دينار)</span>
                        </label>
                        <input type="number" step="0.5" x-model="formOffer.original" required class="glass-input-premium" placeholder="15.00">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Discounted Price (JOD)</span><span class="ar-text">السعر بعد الخصم (دينار)</span>
                        </label>
                        <input type="number" step="0.5" x-model="formOffer.discount" required class="glass-input-premium border-dynamic" placeholder="10.00">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Valid Until</span><span class="ar-text">صالح حتى</span>
                        </label>
                        <input type="time" x-model="formOffer.time" required class="glass-input-premium">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="en-text">Target Audience</span><span class="ar-text">الجمهور المستهدف</span>
                        </label>
                        <select x-model="formOffer.audience" class="glass-input-premium">
                            <option value="all">Everyone / الجميع</option>
                            <option value="tourists">Tourists Only / السياح فقط</option>
                            <option value="locals">Locals Only / الأردنيين فقط</option>
                        </select>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-3 btn-dynamic text-lg font-bold rounded-lg transition-all shadow-lg">
                        <span class="en-text">Publish Offer</span>
                        <span class="ar-text">نشر العرض</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Active Offers Tab -->
    <div x-cloak x-show="activeTab === 'active_offers'" x-transition.opacity.duration.300ms>
        <div class="cities-grid">
            <template x-for="(offer, index) in offers" :key="index">
                <!-- Offer Card -->
                <div class="solid-panel p-5 relative overflow-hidden transition-colors" :class="offer.active ? 'border-dynamic' : 'border-transparent'">
                    <div class="absolute top-0 right-0 w-16 h-16 rounded-bl-full rtl:left-0 rtl:right-auto rtl:rounded-bl-none rtl:rounded-br-full z-0 transition-colors" :class="offer.active ? 'bg-dynamic/20' : 'bg-gray-600/20'"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-4">
                            <h4 class="text-lg font-bold text-white pr-8 rtl:pr-0 rtl:pl-8 leading-tight">
                                <span class="en-text" x-text="offer.name"></span>
                                <span class="ar-text" x-text="offer.name_ar"></span>
                            </h4>
                            <span x-show="offer.active" class="px-2 py-1 rounded bg-emerald-500/20 text-emerald-500 text-xs font-bold shrink-0">LIVE</span>
                            <span x-show="!offer.active" class="px-2 py-1 rounded bg-gray-500/20 text-gray-500 text-xs font-bold shrink-0" style="display:none">PAUSED</span>
                        </div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="text-gray-500 line-through text-sm"><span x-text="offer.original_price.toFixed(2)"></span> JOD</div>
                            <div class="text-2xl font-bold text-dynamic"><span x-text="offer.discount_price.toFixed(2)"></span> JOD</div>
                        </div>
                        <div class="flex items-center justify-between border-t border-white/10 pt-4">
                            <div class="text-xs text-gray-400">
                                Valid till: <span class="text-white font-medium" x-text="offer.valid_until"></span>
                            </div>
                            <button @click="toggleOffer(index)" class="text-xs font-bold px-3 py-1 rounded border transition-colors cursor-pointer bg-transparent" :class="offer.active ? 'border-red-500 text-red-500 hover:bg-red-500/10' : 'border-emerald-500 text-emerald-500 hover:bg-emerald-500/10'">
                                <span x-text="offer.active ? 'Deactivate' : 'Activate'"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </template>
            <div x-show="offers.length === 0" style="display:none" class="col-span-full text-center text-gray-500 py-10">No active offers.</div>
        </div>
    </div>

</div>
@endsection
