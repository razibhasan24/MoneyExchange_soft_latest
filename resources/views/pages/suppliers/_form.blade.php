@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Supplier_name</label>
    <input type="text" name="supplier_name" value="{{ old('supplier_name', $supplier->supplier_name ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Contact_person</label>
    <input type="text" name="contact_person" value="{{ old('contact_person', $supplier->contact_person ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Phone_number</label>
    <input type="text" name="phone_number" value="{{ old('phone_number', $supplier->phone_number ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $supplier->email ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Address</label>
    <input type="text" name="address" value="{{ old('address', $supplier->address ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Country</label>
    <input type="text" name="country" value="{{ old('country', $supplier->country ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>