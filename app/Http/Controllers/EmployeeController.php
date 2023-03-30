<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("employee.index", [
            'employees' => employee::paginate(5),
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee)
    {
        return view("employee.create", [
            'employees' => Employee::all(),
            'employee' => $employee
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        Alert::toast(__('Employee Added Successfully'), 'success')->autoClose(3000);
        return redirect(route('employee.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee): View
    {
        return view("employee.show", [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view("employee.edit", [
            'employees' => Employee::all(),
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->fullname = $request->fullname;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->zip_code = $request->zip_code;
        $employee->employment_date = $request->employment_date;
        $employee->dismissal_date = $request->dismissal_date;
        $employee->save();

        Alert::toast(__('Employee Updated Successfully'), 'success')->autoClose(3000);
        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        Alert::toast(__('Employee Deleted Successfully'), 'success')->autoClose(3000);
        return redirect(route('employee.index'));
    }
}
