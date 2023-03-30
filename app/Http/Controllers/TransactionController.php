<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Invoice;
use App\Models\Employee;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("transaction.index", [
            'transactions' => Transaction::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("transaction.create", [
            'employees' => Employee::latest()->get(),
            'customers' => Customer::latest()->get(),
            'vehicles' => Vehicle::where('status', 'Y')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $transaction_date = date('Y-m-d');
        $rent_date = date('Y-m-d');
        $return_date = date('Y-m-d');
        $data = Transaction::create($request->validated() + [

            'transaction_date' => $transaction_date,
            'employee_id' => $request->employee_id,
            'customer_id' => $request->customer_id,
            'vehicle_id' => $request->vehicle_id,
            'rent_date' => $rent_date,
            'return_date' => $return_date,
            'price' => $request->price,
            'finee' => $request->finee,
            'rent_status' => 'N',

        ]);
        $data->save();
        $vehicle = Vehicle::find($request->vehicle_id);
        $vehicle->status = 'N';
        $vehicle->save();

        Alert::toast(__('Transaction Added Successfully'), 'success')->autoClose(3000);
        return redirect(route('transaction.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *@param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::where('id', $id)->get()->first();
        $first_date = date_create($transaction->return_date);
        $last_date = date_create($transaction->return_day);

        $diff = $last_date->diff($first_date)->format("%a");
        $sum = $diff * ($transaction->finee);

        return view('transaction.edit', [
            'transaction' => $transaction,
            'diff' => $diff,
            'sum' => $sum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  Transaction  $transaction
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->rent_status = 'Y';
        $transaction->return_day = now();
        $transaction->save();
        $vehicle = Vehicle::find($transaction->vehicle_id);
        $vehicle->status = 'Y';
        $vehicle->save();
        
        Alert::toast(__('Transaction Updated Successfully'), 'success')->autoClose(3000);
        return redirect(route('transaction.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Transaction  
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $vehicle = Vehicle::find($transaction->vehicle_id);
        $vehicle->status = 'Y';
        $vehicle->save();
        $transaction->delete();
        Alert::toast(__('Transaction Deleted Successfully'), 'success')->autoClose(3000);
        return redirect(route('transaction.index'));
    }
}
