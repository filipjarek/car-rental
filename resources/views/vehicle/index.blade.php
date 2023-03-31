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
                            <a class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-gray-100">
                                {{ __('Vehicle List') }}
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
                <div class="p-6 sm:px-20 bg-slate-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 ">
    
            
    <div class="mt-0 text-2xl">
        <div>
            <div>
                <div>

    <div class="container">
        <div class="col=auto">
        @can('isAdmin')
        <div class=" inline-flex place-items-center px-4 py-4">               
            <a class="float-right" href="{{ route('vehicle.create') }}">
                <button type="button" class="transform motion-safe:hover:scale-110 shadow overflow-hidden inline-flex items-center px-4 py-3 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-200 hover:text-white dark:hover:text-black disabled:opacity-25 transition duration-700 ease-in-out"> {{ __('Add') }}
                </button>
            </a>
        </div>   
        @endcan    
    </div>
    
        <div class="rounded-md shadow overflow-hidden">
            <table class="rounded-md min-w-full divide-y divide-gray-200 dark:divide-gray-800 w-full border border-gray-300 dark:border-gray-500">
                <thead>
                    <tr>
                        <th scope="col" width="50" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                           {{ __('id') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                           {{ __('name') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                           {{ __('Category') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                            {{ __('Color') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                            {{ __('Year') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                            {{ __('Capacity') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                            {{ __('Power') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                            {{ __('Status') }}
                        </th>
        
                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium uppercase tracking-wider">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-800">
                    @forelse ($vehicles as $vehicle)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $vehicle->id }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $vehicle->name }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">                                                
                            @if ($vehicle->category  == 'car')
                                <span class="px-2 inline-flex leading-5 font-semibold rounded-md bg-amber-200 dark:bg-amber-600">{{ __('car') }}</span>
                            @else
                                <span class="px-2 inline-flex leading-5 font-semibold rounded-md bg-cyan-200 dark:bg-cyan-600">{{ __('motorcycle') }}</span>
                            @endif
                        </td> 

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">                                                
                            {{ $vehicle->color }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">                                                  
                            {{ $vehicle->year }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">                                                  
                            {{ $vehicle->capacity }} cm3
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">                                                  
                            {{ $vehicle->power }} KM
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            @if ($vehicle->status == 'Y')
                                    <span class="px-2 inline-flex leading-5 font-semibold rounded-md bg-green-200 dark:bg-green-600">{{ __('Available') }}</span>
                            @else
                                    <span class="px-2 inline-flex leading-5 font-semibold rounded-md bg-red-200 dark:bg-red-600">{{ __('Inaccessible') }}</span>
                            @endif                                              
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700 font-medium">
                                                                                      
                            <div class="flex item-center justify-center">
                                <a href="{{ route('vehicle.show', $vehicle->id) }}"> 
                                    <button type="button" class="w-6 mr-2 transform text-gray-400 hover:text-yellow-600 hover:scale-110">
                                        <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                                    </button>
                                </a>
                                @can('isAdmin')            
                                <a href="{{ route('vehicle.edit', $vehicle->id) }}">
                                    <button type="button" class="w-6 mr-2 transform text-gray-400 hover:text-purple-600 hover:scale-110">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </button>
                                </a>
                                                
                                <form action="{{ route('vehicle.destroy', $vehicle) }}" method="POST" class="form-hidden">
                                @csrf
                                    <button type="submit" class="w-6 mr-2 transform text-gray-400 hover:text-red-600 hover:scale-110">
                                        <i class="fa-regular fa-trash-can fa-lg"></i>
                                    </button>                                                   
                                </form>
                                @endcan
                                @empty
                    @endforelse   
                    </tr>                                 
                </tbody>               
            </table>
                                               
                    <div class="px-6 py-4 whitespace-nowrap text-sm divide-y divide-gray-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                        {{ $vehicles->links() }} 
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

</x-app-layout>
