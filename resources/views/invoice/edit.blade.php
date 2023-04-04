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
                            <a href="{{ route('invoice.index') }}" class="ml-1 text-sm font-medium text-gray-400 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Invoice List') }}
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <i class="fa-solid fa-angle-right fa-sm text-gray-400"></i>
                            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-gray-100">
                                {{ __('Invoice Edit') }}
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
            
    <form method="POST" action="{{ route('invoice.update', $invoice->id) }}" enctype="multipart/form-data">
    @csrf
  
    <div class="dark:bg-slate-800 border border-gray-300 dark:border-gray-700 rounded-lg bg-slate-100 shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="number_invoice">
                    {{ __('Invoice Number') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="number_invoice" type="text" maxlength="20" class="form-control" class="form-control" @error('number_invoice') is-invalid @enderror" name="number_invoice" value="{{ $invoice->number_invoice }}" autocomplete="number_invoice">
                        @error('number_invoice') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="invoice_date">
                    {{ __('Date of issue') }}
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="invoice_date" type="date" class="form-control" class="form-control" @error('invoice_date') is-invalid @enderror" name="invoice_date" value="{{ $invoice->invoice_date }}" autocomplete="invoice_date">
                        @error('invoice_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="transaction_id">
                    {{ __('Transaction ID') }} 
                </label>
                <select class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="transaction_id" class="form-control" @error('transaction_id') is-invalid @enderror" name="transaction_id" value="{{ $invoice->transaction_id}}">
                        @foreach($transactions as $transaction)
                            <option value="{{ $transaction->id }}" @if($invoice->isSelectedTransaction($transaction->id)) selected @endif>{{ $transaction->id }} </option>
                        @endforeach     
                </select>
                        @error('transaction_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="company_id">
                    {{ __('Company ID') }} 
                </label>
                <select class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="company_id" class="form-control" @error('company_id') is-invalid @enderror" name="company_id" value="{{ $invoice->company_id}}">   
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" @if($invoice->isSelectedCompany($company->id)) selected @endif>{{ $company->id }} </option>
                        @endforeach     
                </select>
                        @error('company_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="buyer">
                    {{ __('Buyer') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                id="buyer" type="text" maxlength="30" class="form-control" class="form-control" @error('buyer') is-invalid @enderror" name="buyer" value="{{ $invoice->buyer }}" autocomplete="buyer">
                        @error('buyer') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        
            <div class="md:w-1/2 px-3 ">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="NIP">
                    {{ __('NIP') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="NIP" type="text" maxlength="10" class="form-control" class="form-control" @error('NIP') is-invalid @enderror" name="NIP" value="{{ $invoice->NIP }}" autocomplete="NIP">
                        @error('NIP') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address">
                    {{ __('Address') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="address" type="text" maxlength="50" class="form-control" class="form-control" @error('name') is-invalid @enderror" name="address" value="{{ $invoice->address }}" autocomplete="address">
                        @error('address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="payment_method">
                    {{ __('Payment method') }} 
                </label>
                <select class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="payment_method" class="form-control" @error('payment_method') is-invalid @enderror" name="payment_method" value="{{ $invoice->payment_method }}" required autocomplete="payment_method">                     
                       
                        <option value="transfer" <?= $invoice->payment_method === 'transfer' ? 'selected' : '' ?>>{{ __('transfer') }}</option>
                        <option value="cash" <?= $invoice->payment_method === 'cash' ? 'selected' : '' ?>>{{ __('cash') }}</option>

                </select>
                        @error('payment_method') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                           
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="service">
                    {{ __('Service') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="service" type="text" maxlength="50" class="form-control" class="form-control" @error('service') is-invalid @enderror" name="service" value="{{ $invoice->service }}" autocomplete="service">
                        @error('service') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="VAT">
                    {{ __('VAT') }} 
                </label>
                <input class="appearance-none block w-full bg-slate-200 dark:bg-gray-800 border border-gray-300  dark:border-gray-700 rounded-md font-semibold text-base dark:text-white tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 disabled:opacity-25 transition duration-700 ease-in-out" 
                    id="VAT" type="text" maxlength="2" class="form-control" class="form-control" @error('VAT') is-invalid @enderror" name="VAT" value="{{ $invoice->VAT }}" autocomplete="VAT">
                        @error('VAT') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        </div>
    </div>
        
        <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">    
            <a href="{{ route('invoice.index') }}">
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
