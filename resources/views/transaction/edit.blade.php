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
                            <a href="{{ route('customer.index') }}" class="ml-1 text-sm font-medium text-gray-400 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Transaction List') }}
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <i class="fa-solid fa-angle-right fa-sm text-gray-400"></i>
                            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-gray-100">
                                {{ __('Transaction Information') }}
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
            
    <div class="dark:bg-slate-800 border border-gray-300 dark:border-gray-700 rounded-lg bg-slate-100 shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="p-2 -mx-3 md:flex underline ">
        {{ __('Customer Information') }}
    </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="fullname">
                    {{ __('Fullname') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="fullname" value="{{ $transaction->customer->fullname }}" disabled type="text" class="form-control" name="fullname">
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="date_of_birth">
                    {{ __('Date of birth') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest"  
                id="date_of_birth" value="{{ $transaction->customer->date_of_birth }}" disabled type="text" class="form-control" name="date_of_birth">
            </div>

            <div class="md:w-1/4 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="gender">
                    {{ __('Gender') }}
                </label>
                    <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest"   
                    id="gender" value="{{ $transaction->customer->gender }}" disabled type="text" class="form-control" name="gender">      
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="idcard">
                    {{ __('Id Card') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest"  
                id="idcard" value="{{ $transaction->customer->idcard }}" disabled type="text" class="form-control" name="idcard">           
            </div>

            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="phone">
                    {{ __('Phone') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest"  
                id="phone" value="{{ $transaction->customer->phone }}" disabled type="text" class="form-control" name="phone" class="form-control">           
            </div>   
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address">
                    {{ __('Address') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="address" value="{{ $transaction->customer->address}}" disabled type="text" class="form-control" name="address" class="form-control">         
            </div>

            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="zip_code">
                    {{ __('Zip Code') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="zip_code" value="{{ $transaction->customer->zip_code}}" disabled type="text" class="form-control" name="zip_code" class="form-control">        
            </div>   
        </div>

        <div class="p-2 -mx-3 md:flex underline">
            {{ __('Vehicle Information') }}
        </div>
        
        <div class="-mx-3 md:flex mb-6">   
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                    {{ __('name') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest"  
                id="name" value="{{ $transaction->vehicle->name }}" disabled type="text" class="form-control" name="name" >       
            </div>

            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="category">
                    {{ __('Category') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="category" type="text" class="form-control" name="category" class="form-control" disabled
                value="{{ $transaction->vehicle->category }}">
            </div> 
        </div>

        <div class="-mx-3 md:flex mb-2">
            <div class="md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="color">
                    {{ __('Color') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="color" type="text" class="form-control" name="color" class="form-control" disabled
                value="{{ $transaction->vehicle->color }}">      
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="year">
                    {{ __('Year') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="year" value="{{ $transaction->vehicle->year }}" disabled  type="text" class="form-control" name="year" class="form-control">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-2">
            <div class="md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="capacity">
                    {{ __('Capacity') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="capacity" type="text" class="form-control" name="capacity" class="form-control" disabled
                value="{{ $transaction->vehicle->capacity }} cm3">      
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="power">
                    {{ __('Power') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="power" value="{{ $transaction->vehicle->power }} KM" disabled type="text" class="form-control" name="power" class="form-control">
            </div>
        </div>

        <div class="p-2 -mx-3 md:flex underline">
            {{ __('Transaction Information') }}
        </div>

        <div class="-mx-3 md:flex mb-2">
            <div class="md:w-1/2 px-3 mb-6">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="rent_date">
                    {{ __('Rent Date') }}
                </label>    
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest" 
                id="rent_date" value="{{ $transaction->rent_date->format('d-m-Y') }}" disabled type="text" class="form-control" name="rent_date" class="form-control">
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="return_date">
                    {{ __('Return Date') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest"  
                id="return_date" value="{{ $transaction->return_date->format('d-m-Y') }}" disabled type="text" class="form-control" name="return_date" class="form-control">
            </div>
        </div>
    </div>

        <div class="rounded-lg shadow overflow-hidden">
            <table class=" rounded-lg shadow min-w-full divide-y divide-gray-200 w-full">
                @if ($transaction->rent_status == 'Y')
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        {{ __('Status') }}:
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        <span class="px-2 inline-flex leading-5 font-semibold rounded-md bg-green-200 dark:bg-green-600">
                            {{ __('Completed') }}
                        </span>
                    </td>     
                </tr>
      
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        {{ __('Returned On') }}:
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        <b>{{ $transaction->return_day->format('d-m-Y') }}</b>
                    </td>           
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        {{ __('Rent Price per day') }}:
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        <b>{{ $transaction->price }} PLN</b>
                    </td>         
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        {{ __('Price Fine per day') }}:
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        <b>{{ $transaction->finee }} PLN</b>
                    </td>          
                </tr>

                <tr>
                    @if ($transaction->return_day->format('d-m-Y') > $transaction->return_date->format('d-m-Y'))
                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        {{ __('Fine') }}:
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                            
                    @php  
                        $sum = $diff * ($transaction->finee)
                    @endphp
       
                        <b>{{number_format ($sum, 2)}} PLN</b>
    
                    </td>

                    @else ($transaction->return_day->format('d-m-Y') < $transaction->return_date->format('d-m-Y'))
                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        {{ __('Fine') }}:
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-gray-700">
                        <b>{{ 0 }} PLN</b>
                    </td>
                </tr>
                    @endif                             
                @endif
            </table>
        </div> 

            <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">    
                <a href="{{ route('transaction.index') }}">
                    <button type="button" class="shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                        {{ __('Close') }}
                    </button>
                </a>
                   
                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">  
                    @if ($transaction->rent_status == 'N')
                    <form action="{{ route('transaction.update', $transaction->id) }}" method="post" autocomplete="off">
                    @csrf
                        <button type="submit" name='save' class="shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out">
                            {{ __('Update') }}
                        </button>
                    </form>
                    @endif

                </div>
            </div>

        <div class="mt-0 text-2xl">
            
                <div>
            </div>
        </div>
    </div>
</div>
    
</x-app-layout>
