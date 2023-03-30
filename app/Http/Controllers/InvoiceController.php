<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("invoice.index", [
            'invoices' => Invoice::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoice)
    {
        return view("invoice.create", [
            'transactions' => Transaction::latest()->get(),
            'companies' => Company::latest()->get(),
            'invoices' => Invoice::all(),
            'invoice' => $invoice
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        Invoice::create($request->validated());
        Alert::toast(__('Invoice Added Successfully'), 'success')->autoClose(3000);
        return redirect(route('invoice.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return View
     */
    public function show(Invoice $invoice): View
    {
        return view("invoice.show", [
            'invoice' => $invoice,
            'transactions' => Transaction::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Invoice 
     * @return View
     */
    public function edit(Invoice $invoice): View
    {
        return view("invoice.edit", [
            'transactions' => Transaction::all(),
            'companies' => Company::all(),
            'invoices' => Invoice::all(),
            'invoice' => $invoice
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  Invoice  $invoice
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice->number_invoice = $request->number_invoice;
        $invoice->transaction_id = $request->transaction_id;
        $invoice->company_id = $request->company_id;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->buyer = $request->buyer;
        $invoice->NIP = $request->NIP;
        $invoice->address = $request->address;
        $invoice->payment_method = $request->payment_method;
        $invoice->service = $request->service;
        $invoice->VAT = $request->VAT;
        $invoice->save();

        Alert::toast(__('Invoice Updated Successfully'), 'success')->autoClose(3000);
        return redirect(route('invoice.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        Alert::toast(__('Invoice Deleted Successfully'), 'success')->autoClose(3000);
        return redirect(route('invoice.index'));
    }

    public function generate($invoice_id)
    {
        if (Invoice::where('id', $invoice_id)->exists()) {
            $invoices = Invoice::find($invoice_id);

            $data = [
                'invoices' => $invoices,
            ];

            $pdf = PDF::loadView('invoice.generate', $data);

            return $pdf->stream();
        } 
        else {
            return redirect()->back() - with('status', __('No Invoice Found'));
        }
    }
}
