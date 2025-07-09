<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use App\Models\Invoice;


class InvoiceDetailController extends Controller
{
    public function index()
    {
        $invoice_details = InvoiceDetail::orderBy('id','DESC')->paginate(10);
        return view('pages.invoice_details.index', compact('invoice_details'));
    }

    public function create()
    {
        $invoices = \App\Models\Invoice::all();

        return view('pages.invoice_details.create', [
            'mode' => 'create',
            'invoiceDetail' => new InvoiceDetail(),
            'invoices' => $invoices,

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        InvoiceDetail::create($data);
        return redirect()->route('invoice_details.index')->with('success', 'Successfully created!');
    }

    public function show(InvoiceDetail $invoiceDetail)
    {
        return view('pages.invoice_details.view', compact('invoiceDetail'));
    }

    public function edit(InvoiceDetail $invoiceDetail)
    {
        $invoices = \App\Models\Invoice::all();

        return view('pages.invoice_details.edit', [
            'mode' => 'edit',
            'invoiceDetail' => $invoiceDetail,
            'invoices' => $invoices,

        ]);
    }

    public function update(Request $request, InvoiceDetail $invoiceDetail)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $invoiceDetail->update($data);
        return redirect()->route('invoice_details.index')->with('success', 'Successfully updated!');
    }

    public function destroy(InvoiceDetail $invoiceDetail)
    {
        $invoiceDetail->delete();
        return redirect()->route('invoice_details.index')->with('success', 'Successfully deleted!');
    }
}