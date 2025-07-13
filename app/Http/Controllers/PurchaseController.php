<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Status;
use Illuminate\Http\Request;


class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('id','DESC')->paginate(10);
        return view('pages.purchases.index', compact('purchases'));
    }

    public function create()
    {

        $statuses=Status::all();
        return view('pages.purchases.create', [
            'mode' => 'create',
            'purchase' => new Purchase(),
            'statuses'=>$statuses,

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        Purchase::create($data);
        return redirect()->route('purchases.index')->with('success', 'Successfully created!');
    }

    public function show(Purchase $purchase)
    {
        return view('pages.purchases.view', compact('purchase'));
    }

    public function edit(Purchase $purchase)
    {

        return view('pages.purchases.edit', [
            'mode' => 'edit',
            'purchase' => $purchase,

        ]);
    }

    public function update(Request $request, Purchase $purchase)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $purchase->update($data);
        return redirect()->route('purchases.index')->with('success', 'Successfully updated!');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', 'Successfully deleted!');
    }
}
