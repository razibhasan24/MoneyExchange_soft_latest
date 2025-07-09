@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Customer</label>
    <select name="customer_id" class="form-select">
        <option value="">--- Select Customer ---</option>
        @foreach ($customers as $option)
            <option value="{{ $option->id }}" {{ old('customer_id', $invoice->customer_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Invoice_date</label>
    <input type="date" name="invoice_date" value="{{ old('invoice_date', $invoice->invoice_date ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Total_amount</label>
    <input type="text" name="total_amount" value="{{ old('total_amount', $invoice->total_amount ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Status</label>
    <input type="text" name="status" value="{{ old('status', $invoice->status ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>