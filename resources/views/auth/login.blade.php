<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">Email / البريد الإلكتروني</label>
            <input id="email" class="glass-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--glass-border);" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">Password / كلمة المرور</label>
            <input id="password" class="glass-input" type="password" name="password" required autocomplete="current-password" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--glass-border);" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Remember Me -->
        <div style="display: flex; align-items: center; gap: 0.5rem;">
            <input id="remember_me" type="checkbox" name="remember" style="accent-color: var(--primary-accent); width: 16px; height: 16px;">
            <label for="remember_me" style="color: var(--text-secondary); cursor: pointer; font-size: 0.9rem;">Remember me / تذكرني</label>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 1rem;">
            <button class="btn-primary ripple" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: var(--primary-accent); color: white; border: none; font-weight: 600; cursor: pointer; transition: background 0.3s ease;">
                Log in / دخول
            </button>
            
            <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.9rem;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--primary-accent); text-decoration: none;">
                        Forgot password?
                    </a>
                @endif
                <a href="{{ route('register') }}" style="color: var(--text-secondary); text-decoration: none;">
                    Create account / سجل
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
