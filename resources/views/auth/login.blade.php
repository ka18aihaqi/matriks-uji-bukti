<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username"
                        class="block mt-1 w-full"
                        type="number"
                        name="username"
                        :value="old('username')"
                        required
                        maxlength="9"
                        pattern="\d{9}"
                        title="Masukkan 9 digit angka"
                        autofocus
                        autocomplete="username" 
                        placeholder="Masukkan NIP"/>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Register -->
        <div class="block mt-4">
            @if (Route::has('register'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('register') }}">
                    {{ __('Don\'t have an account? Sign up here.') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">


            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
