<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            <nav class="flex px-5 py-3 text-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <i class="fa-solid fa-house fa-sm mr-2"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                </ol>
            </nav>
        </h2>        
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-slate-400 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-slate-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
    
    <div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-34">
        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full">
                <div class="widget w-full p-4 rounded-lg bg-slate-50 dark:bg-slate-700 border-y-4 border-yellow-600 shadow-xl">
                    <div class="flex items-center">
                        
                        <div class="flex-col justify-center">
                            <div class="text-3xl dark:text-white mr-3">
                                {{$vehicle}}
                            </div>
                            <div class="text-xs overline text-gray-400">
                                {{ __('VEHICLES') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="widget w-full p-4 rounded-lg bg-slate-50 dark:bg-slate-700 border-y-4 border-red-600 shadow-xl">
                    <div class="flex items-center">                       
                        <div class="flex flex-col justify-center">
                            <div class="text-3xl">
                                {{$availablevehicle}} / {{$vehicle}}  
                            </div>
                            <div class="text-xs overline text-gray-400">
                                {{ __('AVAILABLE VEHICLES') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="widget w-full p-4 rounded-lg bg-slate-50 dark:bg-slate-700 border-y-4 border-green-600 shadow-xl">
                    <div class="flex items-center">
                        <div class="flex flex-col justify-center">
                            <div class="text-3xl">
                                {{$customers}}
                            </div>
                            <div class="text-xs overline text-gray-400">
                                {{ __('CUSTOMERS') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="widget w-full p-4 rounded-lg bg-slate-50 dark:bg-slate-700 border-y-4 border-violet-600 shadow-xl">
                    <div class="flex items-center">                 
                        <div class="flex flex-col justify-center">
                            <div class="text-3xl">
                                {{$transactions}}
                            </div>
                            <div class="text-xs overline text-gray-400">
                                {{ __('TRANSACTIONS') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="widget w-full p-4 rounded-lg bg-slate-50 dark:bg-slate-700 border-y-4 border-blue-600 shadow-xl">
                    <div class="flex items-center">                 
                        <div class="flex flex-col justify-center">
                            <div class="text-3xl">
                                {{$employees}}
                                </div>
                            <div class="text-xs overline text-gray-400">
                                {{ __('EMPLOYEES') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="widget w-full p-4 rounded-lg bg-slate-50 dark:bg-slate-700 border-y-4 border-teal-600 shadow-xl">
                    <div class="flex items-center">                 
                        <div class="flex flex-col justify-center">
                            <div class="text-3xl">
                                {{$invoices}}
                            </div>
                            <div class="text-xs overline text-gray-400">
                                {{ __('INVOICES') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-0 text-2xl">
                <div class="container bg:slate-100 dark:bg-gray-800">
                    <div class="col=auto">     
                        
                        </div>    
                    </div>                         
                </div>    
            </div>    
        </div>
    </div>
</div>
                                             
</x-app-layout>
