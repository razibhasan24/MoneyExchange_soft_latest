@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Supplier_name</label>
    <input type="text" name="supplier_name" value="{{ old('supplier_name', $purchase->supplier_name ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Purchase_date</label>
    <input type="date" name="purchase_date" value="{{ old('purchase_date', $purchase->purchase_date ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Total_amount</label>
    <input type="text" name="total_amount" value="{{ old('total_amount', $purchase->total_amount ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Status</label>
    <input type="text" name="status" value="{{ old('status', $purchase->status ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>