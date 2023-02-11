<nav x-data="{ open: false }" class=" border-b border-gray-300 dark:border-gray-600 bg-slate-100 dark:bg-gray-800 text-black  dark:text-white">
    <!-- Primary Navigation Menu -->
    
    <div class="max-w-6xl mx-auto px- sm:px-10 lg:px-26 ">
        <div class="flex justify-between h-16">
            <div class="flex">
                
                <!-- Navigation Links -->
                <div class="hidden space-x-8  sm:ml-10 sm:flex ">

                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <b>{{ __('Dashboard') }}</b>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('transaction.index') }}" :active="request()->routeIs('transaction.index')">
                    <b>{{ __('Transactions') }}</b>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('invoice.index') }}" :active="request()->routeIs('invoice.index')">
                    <b>{{ __('Invoices') }}</b>
                    </x-jet-nav-link>
                    
                    <x-jet-nav-link href="{{ route('vehicle.index') }}" :active="request()->routeIs('vehicle.index')">
                    <b>{{ __('Vehicles') }}</b>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('customer.index') }}" :active="request()->routeIs('customer.index')">
                    <b>{{ __('Customers') }}</b>
                    </x-jet-nav-link>

                    @can('isAdmin')
                    
                    <x-jet-nav-link href="{{ route('user.index') }}" :active="request()->routeIs('user.index')">
                    <b>{{ __('Users') }}</b>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('employee.index') }}" :active="request()->routeIs('employee.index')">
                    <b>{{ __('Employees') }}</b>
                    </x-jet-nav-link>

                    @endcan


                </div>
            </div>
                
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    
                    
  
                <div x-data="{'darkMode': false}"x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">
                    <div :class="{'dark': darkMode === true}"> 
                        <div class="flex justify-end items-center space-x-2">
                            
                <span class="text-sm text-gray-800 dark:text-gray-400">{{ __('Light') }}</span>
                    <label for="toggle" class="w-9 h05 flex items-center bg-gray-300 rounded-full p-1 cursor-pointer duration-300 ease-in-out dark:bg-gray-700">
                        <div class="toggle-dot w-4 h-4 bg-white rounded-full shadow-md transform duration-300 ease-in-out dark:translate-x-3"></div>             
                    </label>
                <span class="text-sm text-gray-400 dark:text-gray-50">{{ __('Dark') }}</span>
                    <input id="toggle" type="checkbox" class="hidden" :value="darkMode" @change="darkMode = !darkMode" />
                        </div>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300  dark:border-gray-500 text-sm leading-4 font-medium rounded-md  bg-slate-50 dark:bg-slate-700 dark:text-white focus:outline-none transition">
                                       <div> {{ Auth::user()->name }} | <b>{{ Auth::user()->role }}</b></div>

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
        
                        </x-slot>

                        <x-slot name="content">
                            
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())  
                            <x-jet-dropdown-link href="{{ route('lang.switch', $lang) }}"> 
                            <b>{{ Config::get('languages')[App::getLocale()] }}</b> > {{$language}}
                                @endif           
                            </x-jet-dropdown-link>                     
                            @endforeach 

                            <div class="border-t   border-gray-300  dark:border-gray-700"></div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}           
                            </x-jet-dropdown-link>    
                            
                            @can('isAdmin')

                            <div class="border-t   border-gray-300  dark:border-gray-700"></div>  

                    
                            <x-jet-dropdown-link href="{{   route('company.index') }}">
                                {{ __('Company') }}           
                            </x-jet-dropdown-link>
                         
                            
                            
                            @endcan
                            
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t   border-gray-300  dark:border-gray-700"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                         <div class="text-red-500 dark:text-red-500"><b> {{ __('Sign out') }}</b> </div>
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

    
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">

                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

            </div>
        </div>
    </div>
</nav>