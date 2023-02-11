<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">         
            <nav class="flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300  dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>                           
                                {{ __('Dashboard') }}
                        </a>
                    </li>                    
                     <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('customer.index') }}" class="ml-1 text-sm font-medium text-gray-400 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Customer List') }}
                                </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-gray-100">{{ __('Customer Information') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h2>
    </x-slot>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-slate-400 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-slate-100 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 ">
            
    
    <div class=" dark:bg-slate-800 border border-gray-300  dark:border-gray-700 rounded-lg bg-slate-100 shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

    <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="fullname">
                    {{ __('Fullname') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest" id="fullname"  type="text"  class="form-control" name="fullname" class="form-control" disabled value="{{ $customer->fullname}}">
            </div>

        <div class="md:w-1/2 px-3 ">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="date_of_birth">
                    {{ __('Date of birth') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest" id="date_of_birth"  type="text"  class="form-control" name="date_of_birth" class="form-control" disabled value="{{ $customer->date_of_birth}}">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="gender">
                    {{ __('Gender') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest"  id="gender"  type="text"  class="form-control" name="gender" class="form-control" 
                    disabled value="@if ($employee->gender  == 'male') {{ __('male') }} @else {{ __('female') }} @endif">
            </div>

        <div class="md:w-1/2 px-3 ">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="idcard">
                    {{ __('Id Card') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest" id="idcard"  type="text"  class="form-control" name="idcard" class="form-control" disabled value="{{ $customer->idcard}}">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6 ">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="phone">
                    {{ __('Phone') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest" id="phone"  type="text"  class="form-control" name="phone" class="form-control" disabled value="{{ $customer->phone}}">
            </div>

        <div class="md:w-1/2 px-3 ">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address">
                    {{ __('Address') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest" id="address"  type="text"  class="form-control" name="address" class="form-control" disabled value="{{ $customer->address}}">
            </div>

            <div class="md:w-1/2 px-3 ">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="zip_code">
                    {{ __('Zip Code') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest" id="zip_code"  type="text"  class="form-control" name="zip_code" class="form-control" disabled value="{{ $customer->zip_code}}">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="created_at">
                    {{ __('Created') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" id="created_at"  type="text"  class="form-control" name="created_at" class="form-control" disabled value="{{ $customer->created_at}}">
            </div>

        <div class="md:w-1/2 px-3 ">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="updated_at">
                {{ __('Updated') }}
            </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   
                tracking-widest" id="updated_at"  type="text"  class="form-control" name="updated_at" class="form-control" disabled value="{{ $customer->updated_at}}">

            </div>
        </div>
    </div>

        <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6">  
        <a href="{{ route('customer.index') }}">
        <button type="button" class=" shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
            {{ __('Close') }}
        </button>
        </a>
        
    </div>

        <div class="mt-0 text-2xl ">
            <div>
        

                </div>
            </div>
        </div>
    </div>
    
<footer class="text-center lg:text-center  text-gray-400 dark:text-gray-600">
    <div class="flex justify-center items-center lg:justify-between p-6 border-b border-gray-300 dark:border-gray-700">
        <span><strong>© 2023 {{ __('Design by') }} - Filip Jarek</strong></span>    
    </div>
</footer> 
</x-app-layout>
