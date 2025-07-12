@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Receipt_number</label>
    <input type="text" name="receipt_number" value="{{ old('receipt_number', $moneyReceipt->receipt_number ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Transaction</label>
    <select name="transaction_id" class="form-select">
        <option value="">--- Select Transaction ---</option>
        @foreach ($transactions as $option)
            <option value="{{ $option->id }}" {{ old('transaction_id', $moneyReceipt->transaction_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Customer</label>
    <select name="customer_id" class="form-select">
        <option value="">--- Select Customer ---</option>
        @foreach ($customers as $option)
            <option value="{{ $option->id }}" {{ old('customer_id', $moneyReceipt->customer_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Agent</label>
    <select name="agent_id" class="form-select">
        <option value="">--- Select Agent ---</option>
        @foreach ($agents as $option)
            <option value="{{ $option->id }}" {{ old('agent_id', $moneyReceipt->agent_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Total_amount</label>
    <input type="text" name="total_amount" value="{{ old('total_amount', $moneyReceipt->total_amount ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Payment_method</label>
    <input type="text" name="payment_method" value="{{ old('payment_method', $moneyReceipt->payment_method ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Status</label>
    <input type="text" name="status" value="{{ old('status', $moneyReceipt->status ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Issued_by</label>
    <input type="text" name="issued_by" value="{{ old('issued_by', $moneyReceipt->issued_by ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Issued_date</label>
    <input type="date" name="issued_date" value="{{ old('issued_date', $moneyReceipt->issued_date ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Notes</label>
    <input type="text" name="notes" value="{{ old('notes', $moneyReceipt->notes ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>