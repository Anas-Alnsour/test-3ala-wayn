@extends('layouts.dashboard')

@section('content')
<div class="admin-panel" style="padding: 2rem; max-width: 1400px; margin: 0 auto;">
    
    <!-- Header -->
    <div style="margin-bottom: 3rem; background: linear-gradient(90deg, rgba(30, 23, 21, 0.9), transparent), url('https://images.unsplash.com/photo-1541432901042-2d8bd64b4a9b?w=1200&q=80') no-repeat center right; background-size: cover; padding: 3rem; border-radius: 24px; border: 1px solid rgba(193, 117, 81, 0.3);">
        <h1 style="color: var(--highlight); margin-bottom: 0.5rem; font-size: 2.8rem;">
            <span class="en-text">Tour Guide Portal</span>
            <span class="ar-text">حيّ الله خوينا الدليل</span>
        </h1>
        <p style="color: #fff; font-size: 1.2rem; max-width: 600px; text-shadow: 0 2px 4px rgba(0,0,0,0.8);">
            <span class="en-text">Manage your upcoming tours and schedule availability. You are the face of Jordan.</span>
            <span class="ar-text">إدارة جولاتك الجاية وأوقات فراغك. أنت واجهة الأردن الحقيقية.</span>
        </p>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem;">
        
        <!-- Upcoming Tours -->
        <div>
            <h3 style="color: var(--primary-accent); margin-bottom: 1.5rem; font-size: 1.8rem;">
                <span class="en-text">Upcoming Tours</span>
                <span class="ar-text">جولاتي الجاية</span>
            </h3>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <!-- Tour 1 -->
                <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); border-left: 4px solid var(--primary-accent); padding: 2rem; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h4 style="color: #fff; font-size: 1.4rem; margin-bottom: 0.5rem;">
                            <span class="en-text">Petra Full Day Walk</span>
                            <span class="ar-text">جولة البترا كاملة</span>
                        </h4>
                        <div style="color: #a3a3a3; font-size: 1rem; display: flex; gap: 1.5rem;">
                            <span>📅 Oct 24, 2026</span>
                            <span>👥 4 Guests (Smith Family)</span>
                        </div>
                    </div>
                    <div>
                        <button class="btn-premium" style="padding: 0.5rem 1.5rem; font-size: 1rem; border-radius: 8px;">
                            <span class="en-text">Contact Client</span>
                            <span class="ar-text">تواصل مع العميل</span>
                        </button>
                    </div>
                </div>

                <!-- Tour 2 -->
                <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); border-left: 4px solid var(--highlight); padding: 2rem; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h4 style="color: #fff; font-size: 1.4rem; margin-bottom: 0.5rem;">
                            <span class="en-text">Amman Downtown Tour</span>
                            <span class="ar-text">جولة وسط البلد</span>
                        </h4>
                        <div style="color: #a3a3a3; font-size: 1rem; display: flex; gap: 1.5rem;">
                            <span>📅 Oct 26, 2026</span>
                            <span>👥 2 Guests (Couples Tour)</span>
                        </div>
                    </div>
                    <div>
                        <button class="btn-premium" style="padding: 0.5rem 1.5rem; font-size: 1rem; border-radius: 8px; background: rgba(0,0,0,0.5) !important; border: 1px solid rgba(255,255,255,0.2) !important;">
                            <span class="en-text">View Details</span>
                            <span class="ar-text">التفاصيل</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Availability -->
        <div>
            <div style="background: rgba(30, 23, 21, 0.7); backdrop-filter: blur(20px); border: 1px solid rgba(193, 117, 81, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); border-radius: 24px; padding: 2.5rem;">
                <h3 style="color: var(--highlight); margin-bottom: 1.5rem; font-size: 1.5rem;">
                    <span class="en-text">Update Availability</span>
                    <span class="ar-text">تحديث أوقات الفراغ</span>
                </h3>
                
                <form style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div>
                        <label class="form-label" style="color: var(--secondary-accent); display: block; margin-bottom: 0.5rem;">
                            <span class="en-text">Select Date</span>
                            <span class="ar-text">اختر التاريخ</span>
                        </label>
                        <input type="date" class="glass-input-premium" />
                    </div>
                    
                    <div>
                        <label class="form-label" style="color: var(--secondary-accent); display: block; margin-bottom: 0.5rem;">
                            <span class="en-text">Status</span>
                            <span class="ar-text">الحالة</span>
                        </label>
                        <select class="glass-input-premium">
                            <option value="available" style="color:#000;">Available / متوفر</option>
                            <option value="booked" style="color:#000;">Fully Booked / محجوز بالكامل</option>
                            <option value="off" style="color:#000;">Day Off / إجازة</option>
                        </select>
                    </div>

                    <button type="button" class="btn-premium" style="margin-top: 1rem;">
                        <span class="en-text">Save Schedule</span>
                        <span class="ar-text">حفظ الجدول</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
