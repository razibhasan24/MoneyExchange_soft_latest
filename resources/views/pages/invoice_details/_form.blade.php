@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Invoice</label>
    <select name="invoice_id" class="form-select">
        <option value="">--- Select Invoice ---</option>
        @foreach ($invoices as $option)
            <option value="{{ $option->id }}" {{ old('invoice_id', $invoiceDetail->invoice_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Description</label>
    <input type="text" name="description" value="{{ old('description', $invoiceDetail->description ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Quantity</label>
    <input type="text" name="quantity" value="{{ old('quantity', $invoiceDetail->quantity ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Unit_price</label>
    <input type="text" name="unit_price" value="{{ old('unit_price', $invoiceDetail->unit_price ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Total_price</label>
    <input type="text" name="total_price" value="{{ old('total_price', $invoiceDetail->total_price ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>