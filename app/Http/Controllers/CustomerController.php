<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("customer.index", [

            'customers' => customer::paginate(5)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        return view("customer.create", [

            'customers' => Customer::all(),
            'customer' => $customer

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->validated());
        Alert::toast(__('Customer Added Successfully'), 'success')->autoClose(3000);
        return redirect(route('customer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer): View
    {
        return view("customer.show", [

            'customer' => $customer

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view("customer.edit", [

            'customers' => Customer::all(),
            'customer' => $customer
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->fullname = $request->fullname;
        $customer->date_of_birth = $request->date_of_birth;
        $customer->gender = $request->gender;
        $customer->idcard = $request->idcard;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->zip_code = $request->zip_code;
        $customer->save();

        Alert::toast(__('Customer Updated Successfully'), 'success')->autoClose(3000);
        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Customer::find($id)->delete();
        Alert::toast(__('Customer Deleted Successfully'), 'success')->autoClose(3000);
        return redirect(route('customer.index'));
    }
}
