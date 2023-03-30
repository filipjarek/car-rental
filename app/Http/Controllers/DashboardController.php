<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Employee;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $availablevehicle = Vehicle::where("status", 'Y')->count();
        $vehicle = Vehicle::count();
        $invoices = Invoice::count();
        $customers = Customer::count();
        $employees = Employee::count();
        $transactions =  Transaction::count();
        $completedtransaction = Transaction::where("rent_status", 'Y')->count();

        return view('dashboard', compact('availablevehicle', 'vehicle', 'customers', 'transactions', 'completedtransaction', 'employees', 'invoices'));
    }
}
