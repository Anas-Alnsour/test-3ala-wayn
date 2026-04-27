@extends('layouts.dashboard')

@section('content')
<div class="admin-panel">
    <div class="admin-header-bar" style="background: linear-gradient(135deg, rgba(140, 158, 108, 0.2), rgba(18, 14, 12, 0.9));">
        <div>
            <h2 class="admin-title" style="color: var(--highlight);">
                <span class="en-text">Welcome, Tour Assistant</span>
                <span class="ar-text">حيّ الله خوينا المساعد</span>
            </h2>
            <p style="color: var(--text-secondary); margin-top: 5px;">
                <span class="en-text">You are the face of Jordanian hospitality. Manage your tours here.</span>
                <span class="ar-text">أنت وجه الضيافة الأردنية. أدر جولاتك من هنا.</span>
            </p>
        </div>
    </div>

    <div class="admin-body">
        <div style="display: grid; grid-template-columns: 1fr 300px; gap: 40px;">
            <!-- Upcoming Tours Schedule -->
            <div>
                <h3 style="margin-bottom: 20px; color: var(--text-main);">
                    <span class="en-text">Upcoming Tours Schedule</span>
                    <span class="ar-text">جدول الجولات القادمة</span>
                </h3>
                
                <div style="display: flex; flex-direction: column; gap: 15px;">
                    <div class="place-card" style="align-items: flex-start; background: rgba(140, 158, 108, 0.05); border-color: var(--highlight);">
                        <div style="width: 60px; text-align: center; border-right: 1px solid var(--glass-border); padding-right: 15px; margin-right: 5px;">
                            <div style="font-size: 24px; font-weight: bold; color: var(--highlight); line-height: 1;">12</div>
                            <div style="font-size: 12px; color: var(--text-secondary); text-transform: uppercase;">Oct</div>
                        </div>
                        <div style="flex: 1;">
                            <div class="place-name" style="margin-bottom: 2px;">Amman Citadel Historical Walk</div>
                            <div class="place-meta" style="margin-bottom: 10px;">09:00 AM - 12:00 PM • 4 Tourists (Family)</div>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn-primary" style="padding: 4px 12px; font-size: 12px; border: none;">View Details</button>
                                <button class="btn-secondary" style="padding: 4px 12px; font-size: 12px;">Message Group</button>
                            </div>
                        </div>
                    </div>

                    <div class="place-card" style="align-items: flex-start;">
                        <div style="width: 60px; text-align: center; border-right: 1px solid var(--glass-border); padding-right: 15px; margin-right: 5px;">
                            <div style="font-size: 24px; font-weight: bold; color: var(--secondary-accent); line-height: 1;">15</div>
                            <div style="font-size: 12px; color: var(--text-secondary); text-transform: uppercase;">Oct</div>
                        </div>
                        <div style="flex: 1;">
                            <div class="place-name" style="margin-bottom: 2px;">Wadi Mujib Siq Trail</div>
                            <div class="place-meta">08:00 AM - 02:00 PM • 8 Hikers (Group)</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Set Availability Toggle Card -->
            <div>
                <div style="background: var(--bg-card); padding: 30px; border-radius: 16px; border: 1px solid var(--glass-border); text-align: center;">
                    <h3 style="margin-bottom: 10px; color: var(--text-main);">
                        <span class="en-text">Status</span>
                        <span class="ar-text">الحالة</span>
                    </h3>
                    <p style="color: var(--text-secondary); font-size: 14px; margin-bottom: 20px;">
                        Set your availability so tourists can book your services instantly.
                    </p>
                    
                    <div style="display: inline-block; padding: 10px; border-radius: 40px; background: rgba(0,0,0,0.3); border: 1px solid var(--glass-border);">
                        <button class="btn-primary" style="border: none; padding: 10px 20px; border-radius: 30px; margin-right: 5px; background: var(--highlight);">Available</button>
                        <button class="btn-secondary" style="border: none; padding: 10px 20px; border-radius: 30px; background: transparent;">Busy</button>
                    </div>

                    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--glass-border); text-align: left;">
                        <h4 style="margin-bottom: 10px; color: var(--secondary-accent);">Quick Stats</h4>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <span style="color: var(--text-secondary);">Tours Completed:</span>
                            <strong style="color: var(--text-main);">34</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: var(--text-secondary);">Average Rating:</span>
                            <strong style="color: var(--highlight);">4.9 ⭐</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
