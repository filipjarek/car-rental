<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">          
            <nav class="flex px-5 py-3 text-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <i class="fa-solid fa-house fa-sm mr-2"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <i class="fa-solid fa-angle-right fa-sm text-gray-400"></i>
                            <a href="{{ route('vehicle.index') }}" class="ml-1 text-sm font-medium text-gray-400 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Company List') }}
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <i class="fa-solid fa-angle-right fa-sm text-gray-400"></i>
                            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-gray-100">
                                {{ __('Company Add') }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h2>
    </x-slot>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-slate-400 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-slate-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
            
    <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
    @csrf
 
    <div class="dark:bg-slate-800 border border-gray-300 dark:border-gray-700 rounded-lg bg-slate-100 shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                    {{ __('name') }} *
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="name" type="text" maxlength="255" class="form-control" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nazwa Firmy">

                        @error('name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>

            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="nip">
                    {{ __('NIP') }} *
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="NIP" type="text" maxlength="10" class="form-control" class="form-control" @error('NIP') is-invalid @enderror" name="NIP" value="{{ old('NIP') }}" autocomplete="NIP" autofocus placeholder="NIP">

                        @error('NIP') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="phone">
                    {{ __('Phone') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="phone" type="text" maxlength="9" class="form-control" class="form-control" @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus placeholder="XXXXXXXXX">

                        @error('phone') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>

            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="street">
                    {{ __('Street') }} *
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="street" type="text" maxlength="50" class="form-control" class="form-control" @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="color" autofocus placeholder="krakowska">

                        @error('street') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="zip_code">
                    {{ __('Zip Code') }} *
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="zip_code" type="text" maxlength="6" class="form-control" class="form-control" @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus placeholder="35-858">

                        @error('zip_code') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>

            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="city">
                    {{ __('City') }} *
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="city" type="text" maxlength="50" class="form-control" class="form-control" @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="Lublin">

                        @error('city') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="bank_number">
                    {{ __('Bank account number') }} *
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="bank_number" type="text" maxlength="255" class="form-control" @error('bank_number') is-invalid @enderror" name="bank_number" value="{{ old('bank_number') }}" required autocomplete="bank_number" autofocus placeholder="51 1240 2135 8232 7412 9976 4766">

                        @error('bank_number') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>
        </div>
    </div>

    {{ __('Required fields are marked with an asterisk') }}.

                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">              
                    <button type="submit" class="shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                        {{ __('Add') }}
                    </button>
                </div>
            </div>

    </form>

        <div class="mt-0 text-2xl">
                
                <div>
            </div>
        </div>
    </div>

</x-app-layout>
