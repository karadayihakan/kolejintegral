<x-guest-layout>
    <div class="mb-6 text-center space-y-1 text-white">
        <h1 class="text-2xl font-semibold">Şifremi Unuttum</h1>
        <p class="text-sm text-white/80">Şifrenizi mi unuttunuz? Sorun değil. E-posta adresinizi bize bildirin, size yeni bir şifre belirlemenize olanak tanıyacak bir şifre sıfırlama bağlantısı gönderelim.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('E-posta')" class="text-sm font-medium text-white" />
            <x-text-input id="email" class="block w-full rounded-lg border-[#c5b7d0] focus:border-[#51223a] focus:ring-[#51223a] h-11 text-gray-900 placeholder-gray-400" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="text-sm" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit"
                    style="background:#51223a"
                    class="w-full inline-flex justify-center items-center gap-2 rounded-lg text-white font-semibold text-base py-4 shadow-lg transition hover:bg-[#6b2d4a] focus:outline-none focus:ring-2 focus:ring-[#c9a5b3] focus:ring-offset-2 focus:ring-offset-white">
                {{ __('Şifre Sıfırlama Bağlantısı Gönder') }}
            </button>
        </div>
    </form>
</x-guest-layout>
