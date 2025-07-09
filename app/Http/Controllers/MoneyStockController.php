<?php

namespace App\Http\Controllers;

use App\Models\MoneyStock;
use Illuminate\Http\Request;
use App\Models\Currency;


class MoneyStockController extends Controller
{
    public function index()
    {
        $money_stocks = MoneyStock::orderBy('id','DESC')->paginate(10);
        return view('pages.money_stocks.index', compact('money_stocks'));
    }

    public function create()
    {
        $currencies = \App\Models\Currency::all();

        return view('pages.money_stocks.create', [
            'mode' => 'create',
            'moneyStock' => new MoneyStock(),
            'currencies' => $currencies,

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
        $currencies = \App\Models\Currency::all();

        return view('pages.money_stocks.edit', [
            'mode' => 'edit',
            'moneyStock' => $moneyStock,
            'currencies' => $currencies,

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