@extends('layouts.master')
@section('page-title', 'MoneyStock Page')
@section('pages')
<div class="page-inner">
    <!-- Page Header -->
    <div class="card bg-info mb-3 p-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-item-center ">
                <h3 class=" card-title text-white d-flex align-items-center  m-0">MoneyStock List</h3>
                <a href="{{ route('money_stocks.create') }}" class="btn btn-light btn-sm" title="Create New Product">
                    <i class="fa fa-plus mr-1"></i> Create New MoneyStock
                </a>
            </div>
        </div>
    </div>
    <!-- Filter Section -->
    <div class="card mb-3 p-4">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- Search Input with Icon -->
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text px-2 bg-info text-white">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="search" placeholder="Search product by name">
                        </div>
                    </div>

                    <!-- Filter by Category -->
                    <div class="col-md-3 d-flex">
                        <select class="form-select" id="filterCategory">
                            <option value="">Filter by Category</option>
                            <option value="">option-1</option>
                            <option value="">option-2</option>
                            <option value="">option-3</option>
                            <option value="">option-4</option>
                        </select>
                    </div>

                    <!-- Apply Filters Button -->
                    <div class="col-md-2">
                        <button class="btn btn-info btn-block">Apply Filters</button>
                    </div>

                    <!-- Reset Filters Button -->
                    <div class="col-md-2">
                        <button class="btn btn-outline-danger btn-block">Reset Filters</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end filter section -->

    <!-- Table section -->
    <div class="card mb-3">
        <!-- Table -->
        <div class="table-responsive rounded-3">
            <table class="table table-hover">
                <thead class="table-primary"><tr><th>Id</th><th>Customer id</th><th>Agent id</th><th>Currency code</th><th>Currency name</th><th>Availabel amount</th><th>Transaction type</th><th>Payment method</th><th>Remarks</th><th>Created at</th><th>Updated at</th><th>Actions</th></tr></thead>
                <tbody>
                @foreach ($money_stocks as $item)
                    <tr><td>{{ $item->id }}</td><td>{{ optional($item->customer)->name ?? $item->customer_id }}</td><td>{{ optional($item->agent)->name ?? $item->agent_id }}</td><td>{{ $item->currency_code }}</td><td>{{ $item->currency_name }}</td><td>{{ $item->availabel_amount }}</td><td>{{ $item->transaction_type }}</td><td>{{ $item->payment_method }}</td><td>{{ $item->remarks }}</td><td>{{ $item->created_at }}</td><td>{{ $item->updated_at }}</td><td style="min-width:220px">
    <a href="{{ route('money_stocks.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
    <a href="{{ route('money_stocks.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{ route('money_stocks.destroy', $item->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</td></tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- End table section -->
</div>
@endsection