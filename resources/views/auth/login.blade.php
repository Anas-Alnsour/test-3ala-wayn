<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label">
                <span class="en-text">Email Address</span>
                <span class="ar-text">البريد الإلكتروني</span>
            </label>
            <input id="email" class="glass-input-premium" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="form-label">
                <span class="en-text">Password</span>
                <span class="ar-text">كلمة المرور</span>
            </label>
            <input id="password" class="glass-input-premium" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Remember Me -->
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-top: 0.5rem;">
            <input id="remember_me" type="checkbox" name="remember" style="accent-color: var(--primary-accent); width: 18px; height: 18px; cursor: pointer;">
            <label for="remember_me" style="color: #a3a3a3; cursor: pointer; font-size: 0.95rem;">
                <span class="en-text">Remember me</span>
                <span class="ar-text">تذكرني</span>
            </label>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.5rem; margin-top: 1rem;">
            <button class="btn-premium">
                <span class="en-text">Log In</span>
                <span class="ar-text">تسجيل الدخول</span>
            </button>
            
            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.95rem;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--primary-accent); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--secondary-accent)'" onmouseout="this.style.color='var(--primary-accent)'">
                        <span class="en-text">Forgot password?</span>
                        <span class="ar-text">نسيت كلمة المرور؟</span>
                    </a>
                @endif
                <a href="{{ route('register') }}" style="color: #a3a3a3; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#a3a3a3'">
                    <span class="en-text">Create account</span>
                    <span class="ar-text">إنشاء حساب</span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
