<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                
                <div x-data="{'darkMode': false}"x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">
                    <div :class="{'dark': darkMode === true}"> 
                        <div class="flex justify-end items-center space-x-2">

                <a href="{{ route('lang.switch', 'en') }}">
                    <span class="flag-icon flag-icon-us"></span>
                </a> 
                <a href="{{ route('lang.switch', 'pl') }}">
                    <span class="flag-icon flag-icon-pl"></span>
                </a>
                
                <span class="text-sm text-gray-800 dark:text-gray-400"><i class="fa-solid fa-sun"></i></span>
                    <label for="toggle" class="w-9 h05 flex items-center bg-gray-300 rounded-full p-1 cursor-pointer duration-300 ease-in-out dark:bg-gray-700">
                        <div class="toggle-dot w-4 h-4 bg-white rounded-full shadow-md transform duration-300 ease-in-out dark:translate-x-3"></div>
                
                    </label>
                <span class="text-sm text-gray-400 dark:text-gray-50"><i class="fa-solid fa-moon"></i></span>
                    <input id="toggle" type="checkbox" class="hidden" :value="darkMode" @change="darkMode = !darkMode" />
                        </div>
                    </div>
                </div>

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="address@gmail.com" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">

            <a class="text-sm ml-4 text-gray-600 hover:text-gray-900 dark:text-white" href="{{ route('login') }}">
                <button type="button" class="shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out"> {{ __('Cancel') }}
                </button>
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Send') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
