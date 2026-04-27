<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">
                <span class="en-text">Email Address</span>
                <span class="ar-text">البريد الإلكتروني</span>
            </label>
            <input id="email" class="glass-input-strict" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">
                <span class="en-text">Password</span>
                <span class="ar-text">كلمة المرور</span>
            </label>
            <input id="password" class="glass-input-strict" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Remember Me -->
        <div style="display: flex; align-items: center; gap: 0.5rem;">
            <input id="remember_me" type="checkbox" name="remember" style="accent-color: var(--primary-accent); width: 16px; height: 16px; cursor: pointer;">
            <label for="remember_me" style="color: var(--text-secondary); cursor: pointer; font-size: 0.95rem;">
                <span class="en-text">Remember me</span>
                <span class="ar-text">تذكرني</span>
            </label>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.2rem; margin-top: 1rem;">
            <button class="btn-primary ripple" style="width: 100%; text-align: center; font-size: 1.05rem;">
                <span class="en-text">Log in</span>
                <span class="ar-text">تسجيل الدخول</span>
            </button>
            
            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.95rem;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--primary-accent); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--highlight)'" onmouseout="this.style.color='var(--primary-accent)'">
                        <span class="en-text">Forgot password?</span>
                        <span class="ar-text">نسيت كلمة المرور؟</span>
                    </a>
                @endif
                <a href="{{ route('register') }}" style="color: var(--text-secondary); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='var(--text-secondary)'">
                    <span class="en-text">Create account</span>
                    <span class="ar-text">إنشاء حساب</span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
