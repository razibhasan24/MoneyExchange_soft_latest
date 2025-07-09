@extends('layouts.master')
@section('page-title', 'Edit InvoiceDetail')
@section('pages')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="card bg-info mb-3 p-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-item-center ">
                    <h3 class=" card-title text-white d-flex align-items-center  m-0">Edit InvoiceDetail</h3>
                    <a href="{{ route('invoice_details.index') }}" class="btn btn-light btn-sm" title="Back">
                        <i class="fa fa-arrow-left mr-1"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card p-4">
            <form action="{{ route('invoice_details.update', $invoiceDetail->id) }}" method="POST" enctype="multipart/form-data">
                @include('pages.invoice_details._form', ['mode' => 'edit', 'invoiceDetail' => $invoiceDetail])
            </form>
        </div>
    </div>
@endsection