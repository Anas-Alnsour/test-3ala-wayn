<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column; gap: 1.25rem;">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">
                <span class="en-text">Full Name</span>
                <span class="ar-text">الاسم الكامل</span>
            </label>
            <input id="name" class="glass-input-strict" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">
                <span class="en-text">Email Address</span>
                <span class="ar-text">البريد الإلكتروني</span>
            </label>
            <input id="email" class="glass-input-strict" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <!-- Password -->
            <div>
                <label for="password" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">
                    <span class="en-text">Password</span>
                    <span class="ar-text">كلمة المرور</span>
                </label>
                <input id="password" class="glass-input-strict" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">
                    <span class="en-text">Confirm</span>
                    <span class="ar-text">التأكيد</span>
                </label>
                <input id="password_confirmation" class="glass-input-strict" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
            </div>
        </div>

        <!-- Role Selection -->
        <div>
            <label for="role" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">
                <span class="en-text">Account Type</span>
                <span class="ar-text">نوع الحساب</span>
            </label>
            <div style="position: relative;">
                <select id="role" name="role" class="glass-input-strict" required style="cursor: pointer; appearance: auto; padding-right: 2rem;">
                    <option value="" disabled selected hidden>
                        <span class="en-text">Select your role...</span>
                        <span class="ar-text">اختر دورك...</span>
                    </option>
                    <option value="tourist">Tourist / سائح دولي</option>
                    <option value="local">Local / مواطن أردني</option>
                    <option value="restaurant">Restaurant Partner / شريك مطعم</option>
                    <option value="hotel">Hotel Partner / شريك فندق</option>
                    <option value="assistant">Tour Assistant / دليل سياحي</option>
                </select>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.2rem; margin-top: 1rem;">
            <button class="btn-primary ripple" style="width: 100%; text-align: center; font-size: 1.05rem;">
                <span class="en-text">Create Account</span>
                <span class="ar-text">إنشاء الحساب</span>
            </button>
            
            <div style="text-align: center; font-size: 0.95rem;">
                <a href="{{ route('login') }}" style="color: var(--text-secondary); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='var(--text-secondary)'">
                    <span class="en-text">Already registered? Log in</span>
                    <span class="ar-text">عندك حساب؟ تسجيل الدخول</span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
