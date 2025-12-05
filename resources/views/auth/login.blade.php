<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-6 space-y-1 text-white">
        <h1 class="text-2xl font-semibold">Yönetim Paneli Girişi</h1>
        <p class="text-sm text-white/80">Lütfen bilgilerinizi girin</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('E-posta')" class="text-sm font-medium text-white" />
            <x-text-input id="email" class="block w-full rounded-lg border-[#c5b7d0] focus:border-[#51223a] focus:ring-[#51223a] h-11 text-gray-900 placeholder-gray-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="text-sm" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <x-input-label for="password" :value="__('Şifre')" class="text-sm font-medium text-white" />
            <x-text-input id="password" class="block w-full rounded-lg border-[#c5b7d0] focus:border-[#51223a] focus:ring-[#51223a] h-11 text-gray-900 placeholder-gray-400"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between text-sm text-white">
            <label for="remember_me" class="inline-flex items-center gap-2">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#51223a] shadow-sm focus:ring-[#51223a] h-4 w-4" name="remember">
                <span class="font-medium">{{ __('Beni Hatırla') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-white hover:text-[#f5eef2] font-semibold" href="{{ route('password.request') }}">
                    {{ __('Şifremi unuttum?') }}
                </a>
            @endif
        </div>

        <button type="submit"
                style="background:#51223a"
                class="w-full inline-flex justify-center items-center gap-2 rounded-lg text-white font-semibold text-base py-4 shadow-lg transition hover:bg-[#6b2d4a] focus:outline-none focus:ring-2 focus:ring-[#c9a5b3] focus:ring-offset-2 focus:ring-offset-white">
            {{ __('Giriş Yap') }}
        </button>
    </form>
</x-guest-layout>
