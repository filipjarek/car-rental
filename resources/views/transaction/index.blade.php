<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">          
            <nav class="flex px-5 py-3 text-gray-400  rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300  dark:border-gray-700" aria-label="Breadcrumb">
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
                                <a class="ml-1 text-sm font-medium text-gray-900  md:ml-2 dark:text-gray-100">
                                {{ __('Transaction List') }}
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </h2>     
    </x-slot>
   
    @if(session('succes_message'))
        <div class="alert alert-success">
            {{ session('succes-message')}}
        </div>
    @endif

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-slate-400 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-slate-100 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 ">
               
    <div class="mt-0 text-2xl ">
        <div>
            <div>
                <div>

    <div class="container">
         <div class="col=auto">

         <div class=" inline-flex place-items-center px-4 py-4  ">               
            <a class="float-right" href="{{ route('transaction.create') }}">
                <button type="button"  class="  transform motion-safe:hover:scale-110 shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out" > {{ __('Add') }}
                </button>
            </a>
        </div>       
    </div>
         
        <div class=" rounded-md shadow overflow-hidden  ">
            <table class=" rounded-md min-w-full divide-y divide-gray-200 dark:divide-gray-800 w-full border border-gray-300  dark:border-gray-500">
                <thead>
                    <tr>
                        <th scope="col" width="50" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('ID') }}
                        </th>

                        <th scope="col" width="50" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('ID') }} {{ __('Employee') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                            {{ __('Date') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Customer') }} / {{ __('Vehicle') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Rent') }} / {{ __('Return') }}
                        </th>
                                  
                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Rent Price per day') }}
                        </th>   

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Status') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white  divide-y divide-gray-200 dark:divide-gray-800">
                        @foreach ($transactions as $transaction)
                    <tr '@if (date('Y-m-d') > $transaction->return_date->format('d-m-Y') && $transaction->rent_status == 'N') ) background:rgba(255,0,0,0.2) @endif'>
                                       
                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $transaction->id }}
                        </td>         
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                        #{{ $transaction->employee->id }} | @if($transaction->hasEmployee()){{ $transaction->employee->fullname }}@endif
                        </td> 

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                        {{ $transaction->transaction_date->format('d-m-Y') }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $transaction->customer->fullname }} <div>
                             {{ $transaction->vehicle->name }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $transaction->rent_date->format('d-m-Y') }}<div>
                            {{ $transaction->return_date->format('d-m-Y') }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $transaction->price }} PLN
                        </td>   
                         
                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            @if ($transaction->rent_status == 'Y')
                                <span class="px-2 inline-flex  leading-5 font-semibold rounded-md  bg-green-200  dark:bg-green-600">{{ __('Completed') }}</span>
                            @else
                                <span class="px-2 inline-flex  leading-5 font-semibold rounded-md  bg-red-200  dark:bg-red-600">{{ __('Rented') }}</span>
                            @endif                                                
                        </td>


                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700 font-medium">

                            <div class="flex item-center justify-center">                                                                              
                                <a href="{{ route('transaction.edit' , $transaction->id) }}">
                                    <button type="button"  class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </a>
                                                
                                <form action="{{ route('transaction.destroy', $transaction) }}" method="post" class="form-hidden">
                                @csrf   
                                    <button type="submit"class="w-6 mr-2 transform hover:text-red-500 hover:scale-110"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                
                            </form>

                        </td>                       
                    </tr>
                    @endforeach
                                    
                </tbody>
            </table>
 
                    <div class="px-6 py-4 whitespace-nowrap text-sm  divide-y divide-gray-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700">
                        {{ $transactions->links() }} 
                    </div>
                        
                    <div>                                  
                        </div>                          
                             </div>               
                        </div>           
                    </div>      
                </div>
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
