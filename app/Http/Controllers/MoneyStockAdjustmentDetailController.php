<?php

namespace App\Http\Controllers;

use App\Models\MoneyStockAdjustmentDetail;
use Illuminate\Http\Request;
use App\Models\Adjustment;
use App\Models\Currency;


class MoneyStockAdjustmentDetailController extends Controller
{
    public function index()
    {
        $money_stock_adjustment_details = MoneyStockAdjustmentDetail::orderBy('id','DESC')->paginate(10);
        return view('pages.money_stock_adjustment_details.index', compact('money_stock_adjustment_details'));
    }

    public function create()
    {
        $adjustments = \App\Models\Adjustment::all();
        $currencies = \App\Models\Currency::all();

        return view('pages.money_stock_adjustment_details.create', [
            'mode' => 'create',
            'moneyStockAdjustmentDetail' => new MoneyStockAdjustmentDetail(),
            'adjustments' => $adjustments,
            'currencies' => $currencies,

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        MoneyStockAdjustmentDetail::create($data);
        return redirect()->route('money_stock_adjustment_details.index')->with('success', 'Successfully created!');
    }

    public function show(MoneyStockAdjustmentDetail $moneyStockAdjustmentDetail)
    {
        return view('pages.money_stock_adjustment_details.view', compact('moneyStockAdjustmentDetail'));
    }

    public function edit(MoneyStockAdjustmentDetail $moneyStockAdjustmentDetail)
    {
        $adjustments = \App\Models\Adjustment::all();
        $currencies = \App\Models\Currency::all();

        return view('pages.money_stock_adjustment_details.edit', [
            'mode' => 'edit',
            'moneyStockAdjustmentDetail' => $moneyStockAdjustmentDetail,
            'adjustments' => $adjustments,
            'currencies' => $currencies,

        ]);
    }

    public function update(Request $request, MoneyStockAdjustmentDetail $moneyStockAdjustmentDetail)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $moneyStockAdjustmentDetail->update($data);
        return redirect()->route('money_stock_adjustment_details.index')->with('success', 'Successfully updated!');
    }

    public function destroy(MoneyStockAdjustmentDetail $moneyStockAdjustmentDetail)
    {
        $moneyStockAdjustmentDetail->delete();
        return redirect()->route('money_stock_adjustment_details.index')->with('success', 'Successfully deleted!');
    }
}