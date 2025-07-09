@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Currency_from</label>
    <input type="text" name="currency_from" value="{{ old('currency_from', $exchangeRate->currency_from ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Currency_to</label>
    <input type="text" name="currency_to" value="{{ old('currency_to', $exchangeRate->currency_to ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Rate</label>
    <input type="text" name="rate" value="{{ old('rate', $exchangeRate->rate ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Effective_date</label>
    <input type="date" name="effective_date" value="{{ old('effective_date', $exchangeRate->effective_date ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>