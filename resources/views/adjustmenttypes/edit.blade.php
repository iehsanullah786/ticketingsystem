@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Edit adjustmenttype</h5>
    <form method="POST" action="{{ route('AdjustmentTypes.update', $adjustmenttype->id) }}" class="card-body">
      @csrf
      @method('PUT')

       <!-- Name -->
       <div class="mt-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name"  value="{{ old('name', $adjustmenttype->name) }}" class="form-control"  autofocus autocomplete="first_name" />
        @error('name')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Submit</button>
        <a href="{{ route('AdjustmentTypes.index') }}" class="btn btn-secondary">Cancel</a>
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
