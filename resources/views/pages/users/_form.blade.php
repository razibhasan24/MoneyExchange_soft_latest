@csrf
@if ($mode === 'edit')
    @method('PUT')
@endif

<div class="mb-2">
    <label>Username</label>
    <input type="text" name="username" value="{{ old('username', $user->username ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Password_hash</label>
    <input type="password" name="password_hash" value="{{ old('password_hash', $user->password_hash ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Full_name</label>
    <input type="text" name="full_name" value="{{ old('full_name', $user->full_name ?? '') }}" class="form-control">
</div>
<div class="mb-2">
    <label>Role</label>
    <input type="text" name="role" value="{{ old('role', $user->role ?? '') }}" class="form-control">
</div>
<button class="btn btn-info">{{ $mode === 'edit' ? 'Update' : 'Create' }}</button>