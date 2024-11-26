@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Site Admin Creation Form</h5>
    <form method="POST" action="{{ route('employees.store') }}" class="card-body">
      @csrf

        <!-- Name -->
      <div class="mt-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name')}}" class="form-control"  autofocus autocomplete="first_name" />
        @error('name')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>





      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Submit</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
    </div>
    </div>

 @endsection
 @push('scripts')
 <script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
@endpush

