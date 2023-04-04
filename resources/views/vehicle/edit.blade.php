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
                            <a href="{{ route('transaction.index') }}" class="ml-1 text-sm font-medium text-gray-400 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Vehicle List') }}
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <i class="fa-solid fa-angle-right fa-sm text-gray-400"></i>
                            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-gray-100">
                                {{ __('Vehicle Edit') }}
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
            
    <form method="POST" action="{{ route('vehicle.update', $vehicle->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="dark:bg-slate-800 border border-gray-300 dark:border-gray-700 rounded-lg bg-slate-100 shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                    {{ __('name') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="name" type="text" maxlength="50" class="form-control" class="form-control" @error('name') is-invalid @enderror" name="name" value="{{ $vehicle->name }}" autocomplete="name">
                        @error('name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                    {{ __('Category') }} 
                </label>
                <select class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="category" class="form-control" @error('category') is-invalid @enderror" name="category" value="{{ $vehicle->category }}" required autocomplete="category">                     
                       
                        <option value="car" <?= $vehicle->category === 'car' ? 'selected' : '' ?>>{{ __('car') }}</option>
                        <option value="motorcycle" <?= $vehicle->category === 'motorcycle' ? 'selected' : '' ?>>{{ __('motorcycle') }}</option>
                       
                </select>
                        @error('category') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            
            </div>
        </div>


        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="color">
                    {{ __('Color') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="color" type="text" maxlength="15" class="form-control" class="form-control" @error('color') is-invalid @enderror" name="color" value="{{ $vehicle->color }}" autocomplete="color" >
                        @error('color') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="year">
                    {{ __('Year') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="year" type="number" min="1950"  class="form-control" class="form-control" @error('year') is-invalid @enderror" name="year" value="{{ $vehicle->year }}" autocomplete="year" >
                        @error('year') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="capacity">
                    {{ __('Capacity') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="capacity" type="text" maxlength="5" class="form-control" class="form-control" @error('capacity') is-invalid @enderror" name="capacity" value="{{ $vehicle->capacity }}" autocomplete="capacity">
                        @error('capacity') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="power">
                    {{ __('Power') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="power" type="text" maxlength="5" class="form-control" class="form-control" @error('power') is-invalid @enderror" name="power" value="{{ $vehicle->power }}" autocomplete="power">
                        @error('power') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        </div>
    </div>

            <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">    
                <a href="{{ route('vehicle.index') }}">
                    <button type="button" class="shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                        {{ __('Cancel') }}
                    </button>
                </a>

                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">              
                    <button type="submit" class="shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                        {{ __('Edit') }}
                    </button>
                </div>
            </div>

    </form>

        <div class="mt-0 text-2xl">
                    
                    <div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
