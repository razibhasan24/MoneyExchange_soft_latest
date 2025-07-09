@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Adjustment_type</label>
    <select name="adjustment_type_id" class="form-select">
        <option value="">--- Select Adjustment_type ---</option>
        @foreach ($adjustmentTypes as $option)
            <option value="{{ $option->id }}" {{ old('adjustment_type_id', $moneyStockAdjustment->adjustment_type_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Adjustment_date</label>
    <input type="date" name="adjustment_date" value="{{ old('adjustment_date', $moneyStockAdjustment->adjustment_date ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Remarks</label>
    <input type="text" name="remarks" value="{{ old('remarks', $moneyStockAdjustment->remarks ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>