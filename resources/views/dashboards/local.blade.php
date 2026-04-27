@extends('layouts.dashboard')

@section('content')
<div class="admin-panel" style="padding: 2rem; max-width: 1400px; margin: 0 auto;">
    
    <!-- Header -->
    <div style="margin-bottom: 3rem; text-align: center; background: linear-gradient(135deg, rgba(140, 158, 108, 0.1), rgba(193, 117, 81, 0.1)); padding: 3rem; border-radius: 24px; border: 1px solid rgba(193, 117, 81, 0.2);">
        <h1 style="color: var(--highlight); margin-bottom: 0.5rem; font-size: 3rem;">
            <span class="en-text">Welcome back!</span>
            <span class="ar-text">يا هلا بابن البلد!</span>
        </h1>
        <p style="color: var(--text-secondary); font-size: 1.2rem;">
            <span class="en-text">Share the real Jordan with the world. Discover local deals curated just for you.</span>
            <span class="ar-text">شارك الأردن الأصيل مع الدنيا. واكتشف عروض توفيرية على كيفك.</span>
        </p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;">
        <!-- Share a Hidden Gem Form -->
        <div>
            <h3 style="color: var(--primary-accent); margin-bottom: 1.5rem; font-size: 1.8rem;">
                <span class="en-text">Share a Hidden Gem</span>
                <span class="ar-text">ضيف مكان مخفي</span>
            </h3>
            <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 2.5rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">
                <form style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div>
                        <label class="form-label">
                            <span class="en-text">Location Name</span>
                            <span class="ar-text">اسم المكان</span>
                        </label>
                        <input type="text" class="glass-input-premium" placeholder="..." />
                    </div>
                    <div>
                        <label class="form-label">
                            <span class="en-text">Why is it special?</span>
                            <span class="ar-text">ليش هالمكان مميز؟</span>
                        </label>
                        <textarea class="glass-input-premium" rows="4" placeholder="..."></textarea>
                    </div>
                    <button type="button" class="btn-premium">
                        <span class="en-text">Submit Recommendation</span>
                        <span class="ar-text">أرسل التوصية</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Local Deals Grid -->
        <div>
            <h3 style="color: var(--highlight); margin-bottom: 1.5rem; font-size: 1.8rem; display: flex; justify-content: space-between; align-items: center;">
                <span>
                    <span class="en-text">Local Deals</span>
                    <span class="ar-text">عروض بتوفر عليك</span>
                </span>
                <span style="font-size: 1rem; color: var(--text-secondary); cursor: pointer;">
                    <span class="en-text">View All &rarr;</span>
                    <span class="ar-text">شوف الكل &larr;</span>
                </span>
            </h3>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <!-- Deal Card 1 -->
                <div style="display: flex; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; overflow: hidden; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">
                    <div style="width: 150px; background-image: url('https://images.unsplash.com/photo-1541518763669-27fef04b14ea?w=400&q=80'); background-size: cover; background-position: center;"></div>
                    <div style="padding: 1.5rem; flex: 1;">
                        <h4 style="color: #fff; font-size: 1.4rem; margin-bottom: 0.5rem;">Abu Ali Coffee</h4>
                        <p style="color: #a3a3a3; font-size: 0.95rem; margin-bottom: 1rem;">
                            <span class="en-text">50% off Turkish Coffee for verified locals in Downtown Amman.</span>
                            <span class="ar-text">خصم 50% على القهوة التركي لأبناء البلد بوسط البلد.</span>
                        </p>
                        <span style="background: var(--primary-accent); color: #fff; padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                            <span class="en-text">Claim Deal</span>
                            <span class="ar-text">احصل على العرض</span>
                        </span>
                    </div>
                </div>

                <!-- Deal Card 2 -->
                <div style="display: flex; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; overflow: hidden; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">
                    <div style="width: 150px; background-image: url('https://images.unsplash.com/photo-1595856461947-2e1d7eb6f212?w=400&q=80'); background-size: cover; background-position: center;"></div>
                    <div style="padding: 1.5rem; flex: 1;">
                        <h4 style="color: #fff; font-size: 1.4rem; margin-bottom: 0.5rem;">Reem Shawarma</h4>
                        <p style="color: #a3a3a3; font-size: 0.95rem; margin-bottom: 1rem;">
                            <span class="en-text">Buy 2 get 1 free after 10 PM. Show your Local ID on Wayn.</span>
                            <span class="ar-text">اشتري شاورمتين وخد التالتة مجاناً بعد الساعة 10 بالليل. فرجيهم هويتك عالتطبيق.</span>
                        </p>
                        <span style="background: var(--primary-accent); color: #fff; padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold;">
                            <span class="en-text">Claim Deal</span>
                            <span class="ar-text">احصل على العرض</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
