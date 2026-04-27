<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="form-label">
                <span class="en-text">Full Name</span>
                <span class="ar-text">الاسم الكامل</span>
            </label>
            <input id="name" class="glass-input-premium" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label">
                <span class="en-text">Email Address</span>
                <span class="ar-text">البريد الإلكتروني</span>
            </label>
            <input id="email" class="glass-input-premium" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <!-- Password -->
            <div>
                <label for="password" class="form-label">
                    <span class="en-text">Password</span>
                    <span class="ar-text">كلمة المرور</span>
                </label>
                <input id="password" class="glass-input-premium" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="form-label">
                    <span class="en-text">Confirm</span>
                    <span class="ar-text">التأكيد</span>
                </label>
                <input id="password_confirmation" class="glass-input-premium" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
            </div>
        </div>

        <!-- Role Selection -->
        <div>
            <label for="role" class="form-label">
                <span class="en-text">Account Type</span>
                <span class="ar-text">نوع الحساب</span>
            </label>
            <select id="role" name="role" class="glass-input-premium" required style="cursor: pointer;">
                <option value="" disabled selected hidden>Select your role / اختر دورك...</option>
                <option value="tourist" style="color:#000;">Tourist / سائح دولي</option>
                <option value="local" style="color:#000;">Local / مواطن أردني</option>
                <option value="restaurant" style="color:#000;">Restaurant / صاحب مطعم</option>
                <option value="hotel" style="color:#000;">Hotel / إدارة فندق</option>
                <option value="assistant" style="color:#000;">Assistant / مساعد سياحي</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.5rem; margin-top: 1rem;">
            <button class="btn-premium">
                <span class="en-text">Create Account</span>
                <span class="ar-text">إنشاء الحساب</span>
            </button>
            
            <div style="text-align: center; font-size: 0.95rem;">
                <a href="{{ route('login') }}" style="color: #a3a3a3; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#a3a3a3'">
                    <span class="en-text">Already registered? Log in</span>
                    <span class="ar-text">عندك حساب؟ تسجيل الدخول</span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
