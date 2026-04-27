<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary);">Name / الاسم</label>
            <input id="name" class="glass-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary);">Email / البريد الإلكتروني</label>
            <input id="email" class="glass-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary);">Password / كلمة المرور</label>
            <input id="password" class="glass-input" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary);">Confirm Password / تأكيد كلمة المرور</label>
            <input id="password_confirmation" class="glass-input" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 1rem;">
            <button class="btn-primary ripple" style="width: 100%;">
                Register / تسجيل
            </button>
            
            <div style="text-align: center; font-size: 0.9rem;">
                <a href="{{ route('login') }}" style="color: var(--text-secondary); text-decoration: none;">
                    Already registered? / عندك حساب؟
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
