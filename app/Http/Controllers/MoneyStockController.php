<?php

namespace App\Http\Controllers;

use App\Models\MoneyStock;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Agent;


class MoneyStockController extends Controller
{
    public function index()
    {
        $money_stocks = MoneyStock::orderBy('id','DESC')->paginate(10);
        return view('pages.money_stocks.index', compact('money_stocks'));
    }

    public function create()
    {
        $customers = \App\Models\Customer::all();
        $agents = \App\Models\Agent::all();

        return view('pages.money_stocks.create', [
            'mode' => 'create',
            'moneyStock' => new MoneyStock(),
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
        MoneyStock::create($data);
        return redirect()->route('money_stocks.index')->with('success', 'Successfully created!');
    }

    public function show(MoneyStock $moneyStock)
    {
        return view('pages.money_stocks.view', compact('moneyStock'));
    }

    public function edit(MoneyStock $moneyStock)
    {
        $customers = \App\Models\Customer::all();
        $agents = \App\Models\Agent::all();

        return view('pages.money_stocks.edit', [
            'mode' => 'edit',
            'moneyStock' => $moneyStock,
            'customers' => $customers,
            'agents' => $agents,

        ]);
    }

    public function update(Request $request, MoneyStock $moneyStock)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $moneyStock->update($data);
        return redirect()->route('money_stocks.index')->with('success', 'Successfully updated!');
    }

    public function destroy(MoneyStock $moneyStock)
    {
        $moneyStock->delete();
        return redirect()->route('money_stocks.index')->with('success', 'Successfully deleted!');
    }
}