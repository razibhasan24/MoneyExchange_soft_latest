@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Transaction</label>
    <select name="transaction_id" class="form-select">
        <option value="">--- Select Transaction ---</option>
        @foreach ($transactions as $option)
            <option value="{{ $option->id }}" {{ old('transaction_id', $payment->transaction_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Payment_method</label>
    <input type="text" name="payment_method" value="{{ old('payment_method', $payment->payment_method ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Payment_reference</label>
    <input type="text" name="payment_reference" value="{{ old('payment_reference', $payment->payment_reference ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Payment_date</label>
    <input type="date" name="payment_date" value="{{ old('payment_date', $payment->payment_date ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Payment_document</label>
    <input type="text" name="payment_document" value="{{ old('payment_document', $payment->payment_document ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>