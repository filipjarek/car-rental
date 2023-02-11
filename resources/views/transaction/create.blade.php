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
                                <a href="{{ route('transaction.index') }}" class="ml-1 text-sm font-medium text-gray-400 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Transaction List') }}
                                </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-gray-100">{{ __('Transaction Add') }}</span>
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
            
    <form method="POST" action="{{ route('transaction.store') }}" enctype="multipart/form-data">
    @csrf
  
    <div class=" dark:bg-slate-800 border border-gray-300  dark:border-gray-700 rounded-lg bg-slate-100 shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

    <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="employee_id">
                    {{ __('ID') }} | {{ __('Employee') }} *
                </label>
                    <select class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="employee_id" class="form-control" @error('employee_id') is-invalid @enderror" name="employee_id" value="{{ old('employee_id') }}" required autocomplete="employee_id">                    
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">#{{ $employee->id  }} {{ $employee->fullname  }}</option>
                            
                        @endforeach     
                    </select>
                        @error('employee_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please select an option') }}.</p>
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="transaction_date">
                    {{ __('Transaction Date') }} *
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="transaction_date" type="date" class="form-control" @error('transaction_date') is-invalid @enderror" name="transaction_date" value="{{ old('transaction_date') }}" required autocomplete="transaction_date"> 
                        @error('transaction_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please select an option') }}.</p>
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="price">
                    {{ __('Rent Price per day') }} *
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="price" type="number" min="0" class="form-control" class="form-control" @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" placeholder="200.00 PLN" >
                        @error('price') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="finee">
                    {{ __('Price Finee per day') }} *
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="finee" type="number" min="0" class="form-control" class="form-control" @error('finee') is-invalid @enderror" name="finee" value="{{ old('finee') }}" required autocomplete="price" placeholder="200.00 PLN" >
                        @error('finee') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please fill out this field') }}.</p>
            </div>

        </div>

        <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="customer_id">
                    {{ __('ID') }} | {{ __('Customers') }} *
                </label>
                    <select class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="customer_id" class="form-control" @error('customer_id') is-invalid @enderror" name="customer_id" value="{{ old('customer_id') }}" required autocomplete="customer_id">                    
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">#{{ $customer->id  }} {{ $customer->fullname  }}</option>
                            
                        @endforeach     
                    </select>
                        @error('customer_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please select an option') }}.</p>
            </div>


        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="vehicle_id">
                {{ __('ID') }} | {{ __('Vehicles') }} *
                </label>
                    <select class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="vehicle_id" class="form-control" @error('vehicle_id') is-invalid @enderror" name="vehicle_id" value="{{ old('vehicle_id') }}" required autocomplete="vehicle_id">                  
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">#{{ $vehicle->id }} {{ $vehicle->name }}</option>
                        @endforeach                                   
                    </select>
                        @error('vehicle_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please select an option') }}.</p>
            </div>
        </div>


        <div class="-mx-3 md:flex mb-6 ">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="rent_date">
                    {{ __('Rent Date') }} *
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="rent_date" type="date" class="form-control" @error('rent_date') is-invalid @enderror" name="rent_date" value="{{ old('rent_date') }}" required autocomplete="rent_date">
                        @error('rent_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please select an option') }}.</p>
            </div>

            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="return_date">
                    {{ __('Return Date') }} *
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white   tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="return_date" type="date" class="form-control" @error('return_date') is-invalid @enderror" name="return_date" value="{{ old('return_date') }}" required autocomplete="return_date">
                        @error('return_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            <p class="text-red text-xs italic py-2">{{ __('Please select an option') }}.</p>
            </div>
            
    </div>
</div>

    {{ __('Required fields are marked with an asterisk') }}.

        <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6">    
            <a href="{{ route('transaction.index') }}">
                <button type="button" class=" shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                    {{ __('Cancel') }}
                </button>
            </a>

            <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6">
                <button type="submit" class=" shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                    {{ __('Add') }}
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
