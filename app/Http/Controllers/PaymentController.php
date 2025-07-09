<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Transaction;


class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('id','DESC')->paginate(10);
        return view('pages.payments.index', compact('payments'));
    }

    public function create()
    {
        $transactions = \App\Models\Transaction::all();

        return view('pages.payments.create', [
            'mode' => 'create',
            'payment' => new Payment(),
            'transactions' => $transactions,

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        Payment::create($data);
        return redirect()->route('payments.index')->with('success', 'Successfully created!');
    }

    public function show(Payment $payment)
    {
        return view('pages.payments.view', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $transactions = \App\Models\Transaction::all();

        return view('pages.payments.edit', [
            'mode' => 'edit',
            'payment' => $payment,
            'transactions' => $transactions,

        ]);
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $payment->update($data);
        return redirect()->route('payments.index')->with('success', 'Successfully updated!');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Successfully deleted!');
    }
}