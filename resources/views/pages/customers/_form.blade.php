@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $customer->name ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Id_type</label>
    <input type="text" name="id_type" value="{{ old('id_type', $customer->id_type ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Id_number</label>
    <input type="text" name="id_number" value="{{ old('id_number', $customer->id_number ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Address</label>
    <input type="text" name="address" value="{{ old('address', $customer->address ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Id_proof_document</label>
    <input type="text" name="id_proof_document" value="{{ old('id_proof_document', $customer->id_proof_document ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>