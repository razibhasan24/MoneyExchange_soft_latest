@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Customer</label>
    <select name="customer_id" class="form-select">
        <option value="">--- Select Customer ---</option>
        @foreach ($customers as $option)
            <option value="{{ $option->id }}" {{ old('customer_id', $transaction->customer_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Currency_from</label>
    <input type="text" name="currency_from" value="{{ old('currency_from', $transaction->currency_from ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Currency_to</label>
    <input type="text" name="currency_to" value="{{ old('currency_to', $transaction->currency_to ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Amount_from</label>
    <input type="text" name="amount_from" value="{{ old('amount_from', $transaction->amount_from ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Amount_to</label>
    <input type="text" name="amount_to" value="{{ old('amount_to', $transaction->amount_to ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Rate</label>
    <input type="text" name="rate" value="{{ old('rate', $transaction->rate ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Transaction_date</label>
    <input type="date" name="transaction_date" value="{{ old('transaction_date', $transaction->transaction_date ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Agent</label>
    <select name="agent_id" class="form-select">
        <option value="">--- Select Agent ---</option>
        @foreach ($agents as $option)
            <option value="{{ $option->id }}" {{ old('agent_id', $transaction->agent_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Remarks</label>
    <input type="text" name="remarks" value="{{ old('remarks', $transaction->remarks ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Receipt_document</label>
    <input type="text" name="receipt_document" value="{{ old('receipt_document', $transaction->receipt_document ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>