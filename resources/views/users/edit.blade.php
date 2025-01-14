@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Edit Admin</h5>
    <form method="POST" action="{{ route('users.update', $user->id) }}" class="card-body">
      @csrf
      @method('PUT')

      <!--Name -->
      <div class="mt-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required autofocus />
        @error('name')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>



      <!-- Email -->
      <div class="mt-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required />
        @error('email')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>
      <!-- Role -->
      <div class="mt-4">
        <label for="role" class="form-label">Select Role</label>
        <select name="role" class="form-control">
            @foreach ($roles as $role)
            <option value="{{$role->id}}">{{ \App\RolesEnum::from($role->name)->label() }}</option>
            @endforeach
        </select>
        @error('role')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>
      <!-- Password (optional) -->
      <div class="mt-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" autocomplete="new-password" />
        @error('password')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password" />
        @error('password_confirmation')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection


