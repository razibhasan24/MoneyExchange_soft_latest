@extends('layouts.master')
@section('page-title', 'Purchase Details')
@section('pages')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="card bg-info mb-3 p-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-white d-flex align-items-center m-0">
                         Purchase Details
                    </h3>
                    <div>
                        <a href="{{ route('purchases.index') }}" class="btn btn-light btn-sm" title="Back">
                            <i class="fa fa-arrow-left mr-1"></i> Back
                        </a>
                        <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fa fa-edit mr-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tbody>
                                            <tr>
                    <th>Id</th>
                    <td>{{ $purchase->id ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Supplier name</th>
                    <td>{{ $purchase->supplier_name ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Purchase date</th>
                    <td>{{ $purchase->purchase_date ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Total amount</th>
                    <td>{{ $purchase->total_amount ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Status</th>
                    <td>{{ $purchase->status ?? 'N/A' }}</td>
                </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </form>

                    @if(isset($purchase->status))
                        <span class="badge
                            @if($purchase->status == 'active') bg-success @endif
                            @if($purchase->status == 'inactive') bg-danger @endif
                            @if($purchase->status == 'pending') bg-warning @endif">
                            {{ ucfirst($purchase->status) }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .table th {
        width: 30%;
        background-color: #f8f9fa;
    }
    .img-thumbnail {
        max-height: 200px;
        object-fit: contain;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }
    .badge {
        font-size: 0.85rem;
        padding: 0.5rem 0.75rem;
    }
    .bg-success {
        background-color: #28a745 !important;
    }
    .bg-danger {
        background-color: #dc3545 !important;
    }
    .bg-warning {
        background-color: #ffc107 !important;
        color: #212529;
    }
</style>
@endpush