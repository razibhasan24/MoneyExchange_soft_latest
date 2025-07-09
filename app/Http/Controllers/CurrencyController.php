<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;


class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::orderBy('id','DESC')->paginate(10);
        return view('pages.currencies.index', compact('currencies'));
    }

    public function create()
    {

        return view('pages.currencies.create', [
            'mode' => 'create',
            'currency' => new Currency(),

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        Currency::create($data);
        return redirect()->route('currencies.index')->with('success', 'Successfully created!');
    }

    public function show(Currency $currency)
    {
        return view('pages.currencies.view', compact('currency'));
    }

    public function edit(Currency $currency)
    {

        return view('pages.currencies.edit', [
            'mode' => 'edit',
            'currency' => $currency,

        ]);
    }

    public function update(Request $request, Currency $currency)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $currency->update($data);
        return redirect()->route('currencies.index')->with('success', 'Successfully updated!');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currencies.index')->with('success', 'Successfully deleted!');
    }
}