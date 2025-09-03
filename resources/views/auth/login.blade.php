<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md p-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center text-indigo-700 dark:text-indigo-400 mb-2">Welcome Back</h2>
            <p class="text-center text-gray-600 dark:text-gray-300 mb-6">Sign in to your account</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600" name="remember">
                    <label for="remember_me" class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</label>
                </div>

                <div class="flex items-center justify-between mb-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('register') }}"
                   class="text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">
                    Don’t have an account? <span class="font-semibold">Register here</span>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
