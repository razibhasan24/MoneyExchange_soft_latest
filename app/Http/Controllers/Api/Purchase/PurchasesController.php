<?php

namespace App\Http\Controllers\Api\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $purchase=new Purchase();
       $purchase->supplier_id=$request->supplier_id;
       $purchase->purchase_date=$request->purchase_date;
       $purchase->total_amount=$request->total_amount;
       $purchase->status=$request->status;
       $purchase->save();

       $items=$request->items;
       foreach ($items as $item) {
        $details=new PurchaseDetail();
        $details->purchase_id=$purchase->id;
        $details->item_description=$item['item_description'];
        $details->quantity=$item['quantity'];
        $details->unit_price=$item['unit_price'];
        $details->total_price=$item['total_price'];
        $details->save();
       }

       return response()->json($purchase);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
