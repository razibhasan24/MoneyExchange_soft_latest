@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Customer</label>
    <select name="customer_id" class="form-select">
        <option value="">--- Select Customer ---</option>
        @foreach ($customers as $option)
            <option value="{{ $option->id }}" {{ old('customer_id', $moneyStock->customer_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Agent</label>
    <select name="agent_id" class="form-select">
        <option value="">--- Select Agent ---</option>
        @foreach ($agents as $option)
            <option value="{{ $option->id }}" {{ old('agent_id', $moneyStock->agent_id ?? '') == $option->id ? 'selected' : '' }}>{{ $option->name ?? $option->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2">
    <label>Currency_code</label>
    <input type="text" name="currency_code" value="{{ old('currency_code', $moneyStock->currency_code ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Currency_name</label>
    <input type="text" name="currency_name" value="{{ old('currency_name', $moneyStock->currency_name ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Availabel_amount</label>
    <input type="text" name="availabel_amount" value="{{ old('availabel_amount', $moneyStock->availabel_amount ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Transaction_type</label>
    <input type="text" name="transaction_type" value="{{ old('transaction_type', $moneyStock->transaction_type ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Payment_method</label>
    <input type="text" name="payment_method" value="{{ old('payment_method', $moneyStock->payment_method ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Remarks</label>
    <input type="text" name="remarks" value="{{ old('remarks', $moneyStock->remarks ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>