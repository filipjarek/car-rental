<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div>
             
              <div x-data="{'darkMode': false}" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">
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
                
                <x-jet-label for="name" value="{{ __('User Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="jkowal"  :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="email@gmail.com" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="********" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="********" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-white" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Sign up') }}
                </x-jet-button>

            </div>
        </div>
    
    <footer class="text-center lg:text-center text-gray-400 dark:text-gray-600">
        <div class="flex justify-center items-center lg:justify-between p-6 border-b border-gray-300 dark:border-gray-700">
            <span><strong>© 2023 {{ __('Design by') }} - Filip Jarek</strong></span>    
        </div>
    </footer>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>
