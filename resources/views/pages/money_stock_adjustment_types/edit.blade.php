@extends('layouts.master')
@section('page-title', 'Edit MoneyStockAdjustmentType')
@section('pages')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="card bg-info mb-3 p-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-item-center ">
                    <h3 class=" card-title text-white d-flex align-items-center  m-0">Edit MoneyStockAdjustmentType</h3>
                    <a href="{{ route('money_stock_adjustment_types.index') }}" class="btn btn-light btn-sm" title="Back">
                        <i class="fa fa-arrow-left mr-1"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card p-4">
            <form action="{{ route('money_stock_adjustment_types.update', $moneyStockAdjustmentType->id) }}" method="POST" enctype="multipart/form-data">
                @include('pages.money_stock_adjustment_types._form', ['mode' => 'edit', 'moneyStockAdjustmentType' => $moneyStockAdjustmentType])
            </form>
        </div>
    </div>
@endsection