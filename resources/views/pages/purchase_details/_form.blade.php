@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Purchase</label>
    <select name="purchase_id" class="form-select">
        <option value="">--- Select Purchase ---</option>
        @foreach ($purchases as $option)
            <option value="{{ $option->id }}" {{ old('purchase_id', $purchaseDetail->purchase_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Item_description</label>
    <input type="text" name="item_description" value="{{ old('item_description', $purchaseDetail->item_description ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Quantity</label>
    <input type="text" name="quantity" value="{{ old('quantity', $purchaseDetail->quantity ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Unit_price</label>
    <input type="text" name="unit_price" value="{{ old('unit_price', $purchaseDetail->unit_price ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Total_price</label>
    <input type="text" name="total_price" value="{{ old('total_price', $purchaseDetail->total_price ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>