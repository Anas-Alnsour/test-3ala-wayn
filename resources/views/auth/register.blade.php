<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column; gap: 1.25rem;">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">Name / الاسم</label>
            <input id="name" class="glass-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--glass-border);" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">Email / البريد الإلكتروني</label>
            <input id="email" class="glass-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--glass-border);" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">Password / كلمة المرور</label>
            <input id="password" class="glass-input" type="password" name="password" required autocomplete="new-password" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--glass-border);" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">Confirm Password / تأكيد كلمة المرور</label>
            <input id="password_confirmation" class="glass-input" type="password" name="password_confirmation" required autocomplete="new-password" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--glass-border);" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <!-- Role Selection -->
        <div>
            <label for="role" style="display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 500;">Account Type / نوع الحساب</label>
            <select id="role" name="role" class="glass-input" required style="width: 100%; padding: 0.75rem; border-radius: 8px; background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--glass-border); appearance: none; cursor: pointer;">
                <option value="tourist" style="background: var(--bg-dark); color: var(--text-main);">Tourist / سائح</option>
                <option value="local" style="background: var(--bg-dark); color: var(--text-main);">Local / ابن البلد</option>
                <option value="restaurant" style="background: var(--bg-dark); color: var(--text-main);">Restaurant / مطعم</option>
                <option value="hotel" style="background: var(--bg-dark); color: var(--text-main);">Hotel / فندق</option>
                <option value="assistant" style="background: var(--bg-dark); color: var(--text-main);">Assistant / مساعد أثري</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" style="color: #ff6b6b; font-size: 0.85rem;" />
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 1rem;">
            <button class="btn-primary ripple" style="width: 100%; padding: 0.75rem; border-radius: 8px; background: var(--primary-accent); color: white; border: none; font-weight: 600; cursor: pointer; transition: background 0.3s ease;">
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
