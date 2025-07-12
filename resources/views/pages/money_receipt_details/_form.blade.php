@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Receipt</label>
    <select name="receipt_id" class="form-select">
        <option value="">--- Select Receipt ---</option>
        @foreach ($receipts as $option)
            <option value="{{ $option->id }}" {{ old('receipt_id', $moneyReceiptDetail->receipt_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Currency_code</label>
    <input type="text" name="currency_code" value="{{ old('currency_code', $moneyReceiptDetail->currency_code ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Amount</label>
    <input type="text" name="amount" value="{{ old('amount', $moneyReceiptDetail->amount ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Exchange_rate</label>
    <input type="text" name="exchange_rate" value="{{ old('exchange_rate', $moneyReceiptDetail->exchange_rate ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Equivalent_amount</label>
    <input type="text" name="equivalent_amount" value="{{ old('equivalent_amount', $moneyReceiptDetail->equivalent_amount ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Fee</label>
    <input type="text" name="fee" value="{{ old('fee', $moneyReceiptDetail->fee ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Type</label>
    <input type="text" name="type" value="{{ old('type', $moneyReceiptDetail->type ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>