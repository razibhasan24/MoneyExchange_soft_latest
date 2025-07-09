<?php

namespace App\Http\Controllers;

use App\Models\MoneyStockAdjustment;
use Illuminate\Http\Request;
use App\Models\AdjustmentType;


class MoneyStockAdjustmentController extends Controller
{
    public function index()
    {
        $money_stock_adjustments = MoneyStockAdjustment::orderBy('id','DESC')->paginate(10);
        return view('pages.money_stock_adjustments.index', compact('money_stock_adjustments'));
    }

    public function create()
    {
        $adjustmentTypes = \App\Models\AdjustmentType::all();

        return view('pages.money_stock_adjustments.create', [
            'mode' => 'create',
            'moneyStockAdjustment' => new MoneyStockAdjustment(),
            'adjustmentTypes' => $adjustmentTypes,

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        MoneyStockAdjustment::create($data);
        return redirect()->route('money_stock_adjustments.index')->with('success', 'Successfully created!');
    }

    public function show(MoneyStockAdjustment $moneyStockAdjustment)
    {
        return view('pages.money_stock_adjustments.view', compact('moneyStockAdjustment'));
    }

    public function edit(MoneyStockAdjustment $moneyStockAdjustment)
    {
        $adjustmentTypes = \App\Models\AdjustmentType::all();

        return view('pages.money_stock_adjustments.edit', [
            'mode' => 'edit',
            'moneyStockAdjustment' => $moneyStockAdjustment,
            'adjustmentTypes' => $adjustmentTypes,

        ]);
    }

    public function update(Request $request, MoneyStockAdjustment $moneyStockAdjustment)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $moneyStockAdjustment->update($data);
        return redirect()->route('money_stock_adjustments.index')->with('success', 'Successfully updated!');
    }

    public function destroy(MoneyStockAdjustment $moneyStockAdjustment)
    {
        $moneyStockAdjustment->delete();
        return redirect()->route('money_stock_adjustments.index')->with('success', 'Successfully deleted!');
    }
}