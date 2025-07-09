<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;


class ExchangeRateController extends Controller
{
    public function index()
    {
        $exchange_rates = ExchangeRate::orderBy('id','DESC')->paginate(10);
        return view('pages.exchange_rates.index', compact('exchange_rates'));
    }

    public function create()
    {

        return view('pages.exchange_rates.create', [
            'mode' => 'create',
            'exchangeRate' => new ExchangeRate(),

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        ExchangeRate::create($data);
        return redirect()->route('exchange_rates.index')->with('success', 'Successfully created!');
    }

    public function show(ExchangeRate $exchangeRate)
    {
        return view('pages.exchange_rates.view', compact('exchangeRate'));
    }

    public function edit(ExchangeRate $exchangeRate)
    {

        return view('pages.exchange_rates.edit', [
            'mode' => 'edit',
            'exchangeRate' => $exchangeRate,

        ]);
    }

    public function update(Request $request, ExchangeRate $exchangeRate)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $exchangeRate->update($data);
        return redirect()->route('exchange_rates.index')->with('success', 'Successfully updated!');
    }

    public function destroy(ExchangeRate $exchangeRate)
    {
        $exchangeRate->delete();
        return redirect()->route('exchange_rates.index')->with('success', 'Successfully deleted!');
    }
}