@extends('layouts.dashboard')

@section('content')
<div class="admin-panel">
    <div class="admin-header-bar" style="background: linear-gradient(135deg, rgba(140, 158, 108, 0.1), rgba(193, 117, 81, 0.1));">
        <div>
            <h2 class="admin-title" style="color: var(--highlight);">
                <span class="en-text">Ya Hala, Local Partner</span>
                <span class="ar-text">يا هلا بابن البلد</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 5px;">
                <span class="en-text">Share the real Jordan with the world.</span>
                <span class="ar-text">شارك الأردن الحقيقي مع العالم.</span>
            </p>
        </div>
    </div>

    <div class="admin-body">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <!-- Local Deals Grid -->
            <div>
                <h3 style="margin-bottom: 20px; color: var(--secondary-accent); display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        <span class="en-text">Exclusive Local Deals</span>
                        <span class="ar-text">عروض محلية حصرية لك</span>
                    </span>
                    <button class="btn-secondary" style="padding: 5px 15px; font-size: 12px; border-radius: 20px;">View All</button>
                </h3>
                <div class="food-grid" style="grid-template-columns: 1fr; gap: 20px;">
                    <div class="food-card" style="display: flex; height: 120px;">
                        <div class="food-image" style="width: 120px; height: 100%;"><img src="https://images.unsplash.com/photo-1541518763669-27fef04b14ea?w=400&q=80" alt="Coffee" style="border-radius: 0;"></div>
                        <div class="food-body" style="padding: 15px; flex: 1; display: flex; flex-direction: column; justify-content: center;">
                            <h4 class="food-name" style="font-size: 18px; margin-bottom: 5px;">Abu Ali Coffee</h4>
                            <p class="food-desc" style="font-size: 13px;">50% off Turkish Coffee for verified locals in Downtown Amman.</p>
                        </div>
                    </div>
                    <div class="food-card" style="display: flex; height: 120px;">
                        <div class="food-image" style="width: 120px; height: 100%;"><img src="https://images.unsplash.com/photo-1595856461947-2e1d7eb6f212?w=400&q=80" alt="Shawarma" style="border-radius: 0;"></div>
                        <div class="food-body" style="padding: 15px; flex: 1; display: flex; flex-direction: column; justify-content: center;">
                            <h4 class="food-name" style="font-size: 18px; margin-bottom: 5px;">Reem Shawarma</h4>
                            <p class="food-desc" style="font-size: 13px;">Buy 2 get 1 free after 10 PM. Show your Local ID on Wayn.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Community Hidden Gems -->
            <div>
                <h3 style="margin-bottom: 20px; color: var(--primary-accent); display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        <span class="en-text">Community Hidden Gems</span>
                        <span class="ar-text">جواهر مخفية من المجتمع</span>
                    </span>
                    <button class="btn-primary" style="padding: 5px 15px; font-size: 12px; border-radius: 20px; border: none;">+ Add Gem</button>
                </h3>
                
                <div class="places-grid" style="grid-template-columns: 1fr;">
                    <div class="place-card">
                        <div class="place-icon"><img src="https://images.unsplash.com/photo-1580060935547-2287957d605c?w=400&q=80" alt="Wadi"></div>
                        <div>
                            <div class="place-name">Wadi Bin Hammad Hot Springs</div>
                            <div class="place-meta">A beautiful wadi with warm water in Karak. Perfect for a Friday trip.</div>
                            <div style="margin-top: 5px; color: var(--highlight); font-size: 12px;">Added by: Omar K.</div>
                        </div>
                    </div>
                    <div class="place-card">
                        <div class="place-icon"><img src="https://images.unsplash.com/photo-1605652619934-8c017ef6542c?w=400&q=80" alt="View"></div>
                        <div>
                            <div class="place-name">Salt Panorama Viewpoint</div>
                            <div class="place-meta">Best spot to watch the sunset over the old yellow stone houses.</div>
                            <div style="margin-top: 5px; color: var(--highlight); font-size: 12px;">Added by: Salma A.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
