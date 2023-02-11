<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Contracts\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;

class CompanyController extends Controller
{

    public function index()
    {
        return view("company.index", [

            'companies' => Company::paginate(5)

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  
     * @return View
     */
    public function create(Company $company): View
    {
        return view("company.create", [

            'companies' => Company::all(),
            'company' => $company

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        Company::create($request->validated());
        Alert::toast(__('Company Added Successfully'), 'success')->autoClose(3000);
        return redirect(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  
     * @return View
     */
    public function show(Company $company): View
    {
        return view("company.show", [

            'company' => $company

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company 
     * @return View
     */
    public function edit(Company $company): View
    {
        return view('company.edit', [

            'company' => $company
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->NIP = $request->NIP;
        $company->phone = $request->phone;
        $company->street = $request->street;
        $company->zip_code = $request->zip_code;
        $company->city = $request->city;
        $company->bank_number = $request->bank_number;
        $company->save();


        Alert::toast(__('Company Updated Successfully'), 'success')->autoClose(3000);
        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response  
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        Alert::toast(__('Company Deleted Successfully'), 'success')->autoClose(3000);
        return redirect(route('company.index'));
    }
}
