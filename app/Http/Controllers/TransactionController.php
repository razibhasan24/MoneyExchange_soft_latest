<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Agent;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('id','DESC')->paginate(10);
        return view('pages.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $customers = \App\Models\Customer::all();
        $agents = \App\Models\Agent::all();

        return view('pages.transactions.create', [
            'mode' => 'create',
            'transaction' => new Transaction(),
            'customers' => $customers,
            'agents' => $agents,

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        Transaction::create($data);
        return redirect()->route('transactions.index')->with('success', 'Successfully created!');
    }

    public function show(Transaction $transaction)
    {
        return view('pages.transactions.view', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $customers = \App\Models\Customer::all();
        $agents = \App\Models\Agent::all();

        return view('pages.transactions.edit', [
            'mode' => 'edit',
            'transaction' => $transaction,
            'customers' => $customers,
            'agents' => $agents,

        ]);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $transaction->update($data);
        return redirect()->route('transactions.index')->with('success', 'Successfully updated!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Successfully deleted!');
    }
}