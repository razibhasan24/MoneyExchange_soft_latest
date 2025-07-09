@extends('layouts.master')
@section('page-title', 'Create MoneyStock')
@section('pages')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="card bg-info mb-3 p-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-item-center ">
                    <h3 class=" card-title text-white d-flex align-items-center  m-0">Create MoneyStock</h3>
                    <a href="{{ route('money_stocks.index') }}" class="btn btn-light btn-sm" title="Back">
                        <i class="fa fa-arrow-left mr-1"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card p-4">
            <form action="{{ route('money_stocks.store') }}" method="POST" enctype="multipart/form-data">
                @include('pages.money_stocks._form', ['mode' => 'create', 'moneyStock' => new App\Models\MoneyStock])
            </form>
        </div>
    </div>
@endsection