<?php

namespace App\Http\Controllers;

use App\Models\MoneyReceipt;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Agent;


class MoneyReceiptController extends Controller
{
    public function index()
    {
        $money_receipts = MoneyReceipt::orderBy('id','DESC')->paginate(10);
        return view('pages.money_receipts.index', compact('money_receipts'));
    }

    public function create()
    {
        $transactions = \App\Models\Transaction::all();
        $customers = \App\Models\Customer::all();
        // $agents = \App\Models\Agent::all();
        $currencies= \App\Models\Currency::all();

        return view('pages.money_receipts.create', [
            'mode' => 'create',
            'moneyReceipt' => new MoneyReceipt(),
            'transactions' => $transactions,
            'customers' => $customers,
            'currencies' => $currencies,

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        MoneyReceipt::create($data);
        return redirect()->route('money_receipts.index')->with('success', 'Successfully created!');
    }

    public function show(MoneyReceipt $moneyReceipt)
    {
        return view('pages.money_receipts.view', compact('moneyReceipt'));
    }

    public function edit(MoneyReceipt $moneyReceipt)
    {
        $transactions = \App\Models\Transaction::all();
        $customers = \App\Models\Customer::all();
        $agents = \App\Models\Agent::all();

        return view('pages.money_receipts.edit', [
            'mode' => 'edit',
            'moneyReceipt' => $moneyReceipt,
            'transactions' => $transactions,
            'customers' => $customers,
            'agents' => $agents,

        ]);
    }

    public function update(Request $request, MoneyReceipt $moneyReceipt)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $moneyReceipt->update($data);
        return redirect()->route('money_receipts.index')->with('success', 'Successfully updated!');
    }

    public function destroy(MoneyReceipt $moneyReceipt)
    {
        $moneyReceipt->delete();
        return redirect()->route('money_receipts.index')->with('success', 'Successfully deleted!');
    }
}