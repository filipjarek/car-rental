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
                            <a class="ml-1 text-sm font-medium text-gray-900  md:ml-2 dark:text-gray-100">
                                {{ __('User List') }}
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
                <div class="p-6 sm:px-20 bg-slate-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
    
            
    <div class="mt-0 text-2xl">
        <div>
            <div>
                <div>

    <div class="container">
        <div class="col=auto">

        <div class=" rounded-md shadow overflow-hidden">
            <table class=" rounded-md min-w-full divide-y divide-gray-200 dark:divide-gray-800 w-full border border-gray-300  dark:border-gray-500">
                <thead>
                    <tr>
                        <th scope="col" width="50" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('ID') }}
                        </th>

                        <th scope="col" width="50" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Employee') }}
                        </th>

                        <th scope="col" width="50" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('User Name') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Email') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Role') }}
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Last Seen') }} / {{ __('Status') }}
                        </th>
                                       
                        <th scope="col" class="px-6 py-3 bg-gray-200 dark:bg-gray-800 text-left text-xs font-medium  uppercase tracking-wider">
                            {{ __('Actions') }}
                        </th>

                    </tr>
                </thead>

                <tbody class="bg-white  divide-y divide-gray-200 dark:divide-gray-800">
                        @foreach ($users as $user)
                    <tr>
                                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $user->id }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                              @if($user->hasEmployee()){{ $user->employee->fullname }}@endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $user->name }} 
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ $user->email }} 
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">                       
                            @if ($user->role  == 'admin')
                                <span class="px-2 inline-flex  leading-5 font-semibold rounded-md  bg-violet-200  dark:bg-violet-600">admin</span>
                            @else                                
                                <span class="px-2 inline-flex  leading-5 font-semibold rounded-md  bg-lime-200  dark:bg-lime-600">user</span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700">
                            {{ Carbon\Carbon::parse($user->status)->diffForHumans() }} |
                            @if(Cache::has('user-is-online-' . $user->id))
                                <span class=" text-green-500 dark:text-green-300"><b>Online</b></span>
                            @else
                                <span class="text-red-500 dark:text-red-300"><b>Offline</b></span>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm dark:bg-slate-700 font-medium">

                            <div class="flex item-center justify-center">
                                <a href="{{ route('user.show' , $user->id) }}"> 
                                    <button type="button" class="w-6 mr-2 transform text-gray-400 hover:text-yellow-600 hover:scale-110">
                                        <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                                    </button>
                                </a>
                                            
                                <a href="{{ route('user.edit' , $user->id) }}">
                                    <button type="button" class="w-6 mr-2 transform text-gray-400 hover:text-purple-600 hover:scale-110">
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </button>
                                </a>
                                                
                                <form action="{{ route('user.destroy', $user) }}" method="POST" class="form-hidden">
                                @csrf
                                    <button type="submit" class="w-6 mr-2 transform text-gray-400 hover:text-red-600 hover:scale-110">
                                        <i class="fa-regular fa-trash-can fa-lg"></i>
                                    </button>                                                
                                </form>         
                                @endforeach 
                    </tr>
                </tbody>
            </table>
                            
                    <div class="px-6 py-4 whitespace-nowrap text-sm  divide-y divide-gray-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700">
                        {{ $users->links() }} 
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
</div>

</x-app-layout>
