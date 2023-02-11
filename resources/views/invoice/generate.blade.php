<!DOCTYPE html>
    <html lang="pl">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <title> {{ __('Invoice') }}</title>
    <style>
        body{
            background-color: #FFFFFF; 
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
            
            
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
            
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
            
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="">
                <div class="">
                <h2 class="heading"> {{ __('INVOICE VAT NR') }} {{ $invoices->number_invoice }}</h2>
                </div>
                <div class="body-section">

        <div class="row">
                <div class="col-6">          
                <p>{{ __('Date of issue:') }} <strong>{{ $invoices->invoice_date }}</strong></p>
                <p>{{ __('Vehicle rental date:') }} <strong>{{ $invoices->transaction->rent_date->format('d-m-Y') }}
                        {{ __('to') }} {{ $invoices->transaction->return_date->format('d-m-Y') }}</strong></p>
                <p>{{ __('Vehicle return date:') }} <strong>{{ $invoices->transaction->return_day->format('d-m-Y') }}</strong></p>
                <p>{{ __('Payment method:') }} <strong>{{ $invoices->payment_method }}</strong></p>
                <p>{{ __('Date of payment:') }} <strong>

                    

                    @php
                            
                           
                           
                            $stara_data = date(  $invoices->transaction->return_day->format('d-m-Y') );
                            $nowa_data = date( ('d-m-Y'), strtotime( $stara_data .' +7 day' ));
                        @endphp
                
                            {{$nowa_data}} 

                </strong></p>
                <p >{{ __('Site:') }} <strong>1/1</strong></p>
                </div>
            </div>
        </div>
    </div>

        <br>

        <div class="body-section">
        <div class="row">
                <div class="col-6">

                    <div class="heading"><h5>{{ __('ISSUER') }}</h5></div>
                   
                    <p>{{ __('Company name:') }} <strong>{{ $invoices->company->name }}</strong></p>
                    <p>{{ __('Bank account number:') }} <strong>{{ $invoices->company->bank_number }}</strong></p>
                    <p>{{ __('Adress:') }} <strong>{{ $invoices->company->street }} {{ $invoices->company->zip_code }} {{ $invoices->company->city }}</strong></p>
                    <p>{{ __('NIP:') }} <strong>{{ $invoices->company->NIP }}</strong></p>
                    <p>{{ __('Phone:') }} <strong>{{ $invoices->company->phone }}</strong></p>
                    
                   
                    <br>

                    <div class="heading"><h5>{{ __('BUYER') }}</h5></div>

                    <p>{{ __('Fullname:') }} <strong>{{ $invoices->buyer }}</strong></p>
                    <p>{{ __('Adress:') }} <strong>{{ $invoices->address }}</strong></p>
                    <p>{{ __('NIP:') }} <strong>{{ $invoices->NIP }}</strong></p>
                    
                </div>
            </div>
        </div>

                    <br>
        
       
                <div class="col-4">
                <table>
                    <thead>
                            <tr>
                                <th>
                                    Lp.
                                </th>
                              
                                <th>
                                    {{ __('The name of the service:') }}
                                 </th>

                                <th>
                                    {{ __('Amount:') }}
                                </th>

                                <th>
                                    {{ __('Per unit:') }}
                                </th>

                                <th>
                                    {{ __('Price per unit:') }}
                                </th>

                                <th>
                                    {{ __('VAT:') }}
                                </th>

                                <th>
                                    {{ __('Net price:') }}
                                </th>

                                <th>
                                    {{ __('VAT Value:') }}
                                </th>
                       
                                <th>
                                    {{ __('Gross price:') }}
                                </th>
                            </tr>
                    </thead>
    
                    <tbody>
                    
                            <tr>
                                <td>
                                    1.
                                </td>

                                <td>
                                    {{ $invoices->service }} {{ $invoices->transaction->vehicle->name }}. 
                                    {{ __('in days') }} {{ $invoices->transaction->rent_date->format('d-m-Y') }}
                                    {{ __('to') }} {{ $invoices->transaction->return_date->format('d-m-Y') }}
                                </td>

                                <td>

                                    @php

                                        $earlier = new DateTime($invoices->transaction->rent_date->format('d-m-Y'));
                                        $later = new DateTime($invoices->transaction->return_date->format('d-m-Y'));
                                        $diff = $later->diff($earlier)->format("%a"); 
                                
                                    @endphp
                        
                                        {{$diff}} 
                                </td>

                                <td>
                                {{ __('day') }}
                                </td>

                                <td>
                                    {{ $invoices->transaction->price }}  
                                </td>

                                <td>
                                    {{ $invoices->VAT }} %   
                                </td>


                                <td>

                                    @php
                            
                                        $suma_price = $diff * ($invoices->transaction->price) 

                                    @endphp

                                        {{number_format ($suma_price, 2)}}  
                                </td>
                    
                                <td>

                                    @if(isset($invoices->VAT))

                                    @php

                                        $VAT = $invoices->VAT;
                                        $VAT_total_price = ($suma_price * $invoices->VAT)/100;

                                    @endphp

                                        {{number_format ($VAT_total_price, 2)}}  

                                    @else
                                    0
                                    @endif

                                </td>

                                <td>
                                    @if(isset($invoices->VAT))

                                    @php
                            
                                        $grandtotal_price = $VAT_total_price + $suma_price

                                    @endphp

                                    @endif
                                        {{number_format ($grandtotal_price, 2)}}  
                                </td>
                            </tr>

                            <tr>

                                <td colspan="0" class="text-left">
                                    2.
                                </td>

                                <td> 
                                {{ __('Overpayment for exceeding the rental period') }}
                                    
                       
                                </td>

                                <td> 

                                @php
                            
                                    $earlier = new DateTime($invoices->transaction->return_date->format('d-m-Y'));
                                    $later = new DateTime($invoices->transaction->return_day->format('d-m-Y'));
                                    $diff = $later->diff($earlier)->format("%a"); 
                                
                                @endphp
                        
                                    {{$diff}} 

                                </td>

                                <td> 
                                {{ __('day') }}
                                   

                                </td>

                                <td> 
                           
                                @php
                            
                                    $suma = $diff * ($invoices->transaction->finee)

                                @endphp
                           
                                    {{$invoices->transaction->finee}} 

                                </td>

                                <td> 

                                    {{ $invoices->VAT }} %  

                                </td>

                                <td> 

                                @php
                            
                                    $suma_finee = $diff * ($invoices->transaction->finee)

                                @endphp

                                    {{number_format ($suma_finee, 2)}} 

                                </td>

                                <td> 

                            
                                @if(isset($invoices->VAT))

                                @php

                                    $VAT = $invoices->VAT;
                                    $VAT_total_finee = $suma_finee * $invoices->VAT/100;

                                @endphp

                                    {{number_format ($VAT_total_finee, 2)}}  

                                @else
                                0
                                @endif

                                </td>

                                <td> 

                            
                                @if(isset($invoices->VAT))

                                @php
                            
                                    $grandtotal_finee = $VAT_total_finee +  $suma_finee

                                @endphp

                                @endif
                                    {{number_format ($grandtotal_finee, 2)}} 

                                </td>

                            </tr>

                            <tr>

                                <td colspan="5" class="text-right">
                                   {{ __('Together to pay:') }}
                                </td>

                                <td>
                        
                                </td>

                                <td> 

                                @php
                            
                                    $suma_end = $suma_price + $suma_finee

                                @endphp

                                    {{number_format ($suma_end, 2)}}  

                                </td> 

                                <td> 
                                @if(isset($invoices->VAT))

                                @php
                        
                                    $suma_vat = $VAT_total_finee + $VAT_total_price

                                @endphp

                                @endif
                           
                                    {{number_format ($suma_vat, 2)}}  
                        
                        
                                </td> 

                                <td> 

                                @php
                                    $suma_total = $grandtotal_finee + $grandtotal_price

                                @endphp

                                    {{number_format ($suma_total, 2)}}   
                                </td> 

                            </tr>

                            <tr>


                                <td colspan="5" class="text-right">
                                   {{ __('Including tax:') }}
                                </td>

                                <td> 
                                    {{ $invoices->VAT }} %  
                                </td> 

                                <td> 

                                @php
                            
                                    $suma_end = $suma_price + $suma_finee

                                @endphp
                        
                                    {{number_format ($suma_end, 2)}}   

                                </td> 

                                <td> 

                                @if(isset($invoices->VAT))

                                @php
                        
                                $suma_vat = $VAT_total_finee + $VAT_total_price

                                @endphp

                                @endif
                           
                                    {{number_format ($suma_vat, 2)}}    

                                </td> 

                                <td> 

                                @php

                                    $suma_total = $grandtotal_finee + $grandtotal_price

                                @endphp
                        
                                    {{number_format ($suma_total, 2)}} 

                                </td> 

                                
                            </tr>

                           
                            <tr>
                            <td colspan="8" class="text-right">
                                {{ __('To pay:') }}
                            </td>

                            <td> 

                                @php

                                    $suma_total = $grandtotal_finee + $grandtotal_price

                                @endphp

                                        {{number_format ($suma_total, 2)}} zł
                            </td> 

                        </tr>

                    <tbody>                       
                </table>
        
            </div>
        </div>      

    </body>
</html>