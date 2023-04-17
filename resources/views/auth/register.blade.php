<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf

        <h1 class="text-center mb-6" style="font-size: 28px; font-weight: 500; ">DAFTAR ROKET MINI MOTO</h1>
        <img src="{{ url('assets/server-side/img/auth/undraw_dev_focus_re_6iwt.svg') }}" alt="Undraw Images SVG" style="border-radius: 20%; width: 40%; margin: auto;">
        <!-- Name -->
        <div class="mt-6">
            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus />
            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

        <div class="mt-6">
            <x-input-label for="no_telp" :value="__('No Telepon')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" required/>
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="role" />
            <x-text-input id="role" class="block mt-1 w-full" type="hidden" name="role" value="Customer"/>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                Sudah punya akun? Ayo <strong>Login</strong>
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
