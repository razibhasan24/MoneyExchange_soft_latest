<?php

namespace App\Http\Controllers;

use App\Models\MoneyStockAdjustmentType;
use Illuminate\Http\Request;


class MoneyStockAdjustmentTypeController extends Controller
{
    public function index()
    {
        $money_stock_adjustment_types = MoneyStockAdjustmentType::orderBy('id','DESC')->paginate(10);
        return view('pages.money_stock_adjustment_types.index', compact('money_stock_adjustment_types'));
    }

    public function create()
    {

        return view('pages.money_stock_adjustment_types.create', [
            'mode' => 'create',
            'moneyStockAdjustmentType' => new MoneyStockAdjustmentType(),

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        MoneyStockAdjustmentType::create($data);
        return redirect()->route('money_stock_adjustment_types.index')->with('success', 'Successfully created!');
    }

    public function show(MoneyStockAdjustmentType $moneyStockAdjustmentType)
    {
        return view('pages.money_stock_adjustment_types.view', compact('moneyStockAdjustmentType'));
    }

    public function edit(MoneyStockAdjustmentType $moneyStockAdjustmentType)
    {

        return view('pages.money_stock_adjustment_types.edit', [
            'mode' => 'edit',
            'moneyStockAdjustmentType' => $moneyStockAdjustmentType,

        ]);
    }

    public function update(Request $request, MoneyStockAdjustmentType $moneyStockAdjustmentType)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $moneyStockAdjustmentType->update($data);
        return redirect()->route('money_stock_adjustment_types.index')->with('success', 'Successfully updated!');
    }

    public function destroy(MoneyStockAdjustmentType $moneyStockAdjustmentType)
    {
        $moneyStockAdjustmentType->delete();
        return redirect()->route('money_stock_adjustment_types.index')->with('success', 'Successfully deleted!');
    }
}