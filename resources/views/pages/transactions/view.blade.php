@extends('layouts.master')
@section('page-title', 'Transaction Details')
@section('pages')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="card bg-info mb-3 p-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-white d-flex align-items-center m-0">
                         Transaction Details
                    </h3>
                    <div>
                        <a href="{{ route('transactions.index') }}" class="btn btn-light btn-sm" title="Back">
                            <i class="fa fa-arrow-left mr-1"></i> Back
                        </a>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm" title="Edit">
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
                    <td>{{ $transaction->id ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Customer id</th>
                    <td>{{ $transaction->customer->name ?? $transaction->customer_id }}</td>
                </tr>                <tr>
                    <th>Currency from</th>
                    <td>{{ $transaction->currency_from ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Currency to</th>
                    <td>{{ $transaction->currency_to ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Amount from</th>
                    <td>{{ $transaction->amount_from ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Amount to</th>
                    <td>{{ $transaction->amount_to ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Rate</th>
                    <td>{{ $transaction->rate ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Transaction date</th>
                    <td>{{ $transaction->transaction_date ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Agent id</th>
                    <td>{{ $transaction->agent->name ?? $transaction->agent_id }}</td>
                </tr>                <tr>
                    <th>Remarks</th>
                    <td>{{ $transaction->remarks ?? 'N/A' }}</td>
                </tr>                <tr>
                    <th>Receipt document</th>
                    <td>{{ $transaction->receipt_document ?? 'N/A' }}</td>
                </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </form>

                    @if(isset($transaction->status))
                        <span class="badge
                            @if($transaction->status == 'active') bg-success @endif
                            @if($transaction->status == 'inactive') bg-danger @endif
                            @if($transaction->status == 'pending') bg-warning @endif">
                            {{ ucfirst($transaction->status) }}
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