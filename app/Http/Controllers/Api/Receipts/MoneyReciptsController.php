<?php

namespace App\Http\Controllers\api\Receipts;

use App\Http\Controllers\Controller;
use App\Models\MoneyReceipt;
use App\Models\MoneyReceiptDetail;
use Illuminate\Http\Request;

class MoneyReciptsController extends Controller
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
        $mr = new MoneyReceipt();
        // $purchase->supplier_name=$request->supplier_name;
        $mr->receipt_number=$request->receipt_number;
        $mr->transaction_id=$request->transaction_id;
        $mr->customer_id=$request->customer_id;
        $mr->agent_id=$request->agent_id;
        $mr->total_amount=$request->total_amount;
        $mr->payment_method=$request->payment_method;
        $mr->status=$request->status;
        $mr->issued_by=$request->issued_by;
        $mr->issued_date=$request->issued_date;
        $mr->notes=$request->notes;
        $mr-> save();

        $items=$request->item;
    foreach ($items as $item) {
        $details=new MoneyReceiptDetail();
        $details->receipt_id= $mr->id;
        $details->currency_code=$item['currency_code'];
        $details->amount=$item['amount'];
        $details->exchange_rate=$item['exchange_rate'];
        $details->equivalent_amount=$item['equivalent_amount'];
        $details->fee=$item['fee'];
        $details->save();

        return response()->json($mr);


    }


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
