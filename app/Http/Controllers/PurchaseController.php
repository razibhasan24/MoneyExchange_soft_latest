<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Currency;
use App\Models\Purchase;
use App\Models\Status;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $suppliers=Supplier::all();
        $currencies=Currency::all();


        
        return view('pages.purchases.create', [
            'mode' => 'create',
            'purchase' => new Purchase(),
            'statuses'=>$statuses,
            'suppliers'=>$suppliers,
            'currencies'=>$currencies,

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
        $supplier=Supplier::find($purchase->supplier_id);
        $agent=Agent::find($purchase->agent_id);
        $details=DB::table('');
        return view('pages.purchases.view', compact('purchase','supplier','agent'));
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
