@extends('layouts.master')
@section('page-title', 'Edit Purchase')
@section('pages')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="card bg-info mb-3 p-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-item-center ">
                    <h3 class=" card-title text-white d-flex align-items-center  m-0">Edit Purchase</h3>
                    <a href="{{ route('purchases.index') }}" class="btn btn-light btn-sm" title="Back">
                        <i class="fa fa-arrow-left mr-1"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card p-4">
            <form action="{{ route('purchases.update', $purchase->id) }}" method="POST" enctype="multipart/form-data">
                @include('pages.purchases._form', ['mode' => 'edit', 'purchase' => $purchase])
            </form>
        </div>
    </div>
@endsection