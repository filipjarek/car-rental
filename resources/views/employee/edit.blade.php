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
                                <a href="{{ route('employee.index') }}" class="ml-1 text-sm font-medium text-gray-400 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Employee List') }}
                                </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-gray-100">{{ __('Employee Edit') }}</span>
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
            
    <form method="POST" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
    @csrf

            
    <div class=" dark:bg-slate-800 border border-gray-300  dark:border-gray-700 rounded-lg bg-slate-100 shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

    <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="fullname">
                    {{ __('Fullname') }} *
                    </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="fullname" type="text" maxlength="50"  class="form-control" class="form-control" @error('fullname') is-invalid @enderror" name="fullname" value="{{ $employee->fullname }}" required autocomplete="fullname" >
                        @error('fullname') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        
            <div class="md:w-1/2 px-3 ">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                    {{ __('Email') }} 
                    </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="email" type="email" maxlength="255"  class="form-control" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ $employee->email }}"  autocomplete="email" >
                        @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

        
        </div>

        <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="gender">
                    {{ __('Gender') }} 
                    </label>
                    <select class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700  rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="gender" class="form-control" @error('gender') is-invalid @enderror" name="gender" value="{{ $employee->gender }}"  required autocomplete="gender">                     
                       
                    <option value="male" <?= $employee->gender === 'male' ? 'selected' : '' ?>>{{ __('male') }}</option>
                    <option value="female" <?= $employee->gender === 'female' ? 'selected' : '' ?>>{{ __('female') }}</option>
                       
                    </select>
                        @error('gender') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        
            <div class="md:w-1/2 px-3 ">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="phone">
                    {{ __('Phone') }} 
                    </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="phone" type="text" maxlength="9"  class="form-control" class="form-control" @error('phone') is-invalid @enderror" name="phone" value="{{ $employee->phone }}" autocomplete="phone" >
                        @error('phone') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

        
        </div>

        <div class="-mx-3 md:flex mb-6 ">
        <div class="md:w-1/2 px-3 ">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address">
                    {{ __('Address') }} 
                    </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="address" type="text" maxlength="50"  class="form-control" class="form-control" @error('address') is-invalid @enderror" name="address" value="{{ $employee->address }}" required autocomplete="address" >
                        @error('address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-1/2 px-3 ">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="zip_code">
                    {{ __('Zip Code') }} 
                    </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="zip_code" type="text" maxlength="6"  class="form-control" class="form-control" @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ $employee->zip_code }}" required autocomplete="code" >
                        @error('zip_code') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        </div>
   

        <div class="-mx-3 md:flex mb-2 ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="employment_date">
                    {{ __('Employment date') }} 
                    </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="employment_date" type="date" class="form-control" class="form-control" @error('employment_date') is-invalid @enderror" name="employment_date" value="{{ $employee->employment_date }}" required autocomplete="employment_date" >
                        @error('employment_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-1/2 px-3 ">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="dismissal_date">
                    {{ __('Dismissal date') }} 
                    </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="dismissal_date" type="date" class="form-control" class="form-control" @error('dismissal_date') is-invalid @enderror" name="dismissal_date" value="{{ $employee->dismissal_date }}"  autocomplete="fullname" >
                        @error('dismissal_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

            </div>
        </div>
    </div>

            <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6">  
                <a href="{{ route('customer.index') }}">
                    <button type="button" class=" shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                        {{ __('Cancel') }}
                    </button>
                </a>

                <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6"> 
                    <button type="submit" class=" shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                        {{ __('Edit') }}
                    </button>
                </div>
            </div>

    </form>

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
