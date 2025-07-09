@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Currency</label>
    <select name="currency_id" class="form-select">
        <option value="">--- Select Currency ---</option>
        @foreach ($currencies as $option)
            <option value="{{ $option->id }}" {{ old('currency_id', $moneyStock->currency_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Quantity</label>
    <input type="text" name="quantity" value="{{ old('quantity', $moneyStock->quantity ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>