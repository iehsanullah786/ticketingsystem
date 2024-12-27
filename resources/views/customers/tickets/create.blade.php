@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Add Canned Reply</h5>
    <form method="POST" action="{{ route('customer.ticket.store') }}" class="card-body">
      @csrf

        <!-- Name -->
      <div class="mt-4">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" id="subject" name="subject" value="{{ old('subject')}}" class="form-control"  autofocus autocomplete="subject" />
        @error('subject')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- summary -->
      <div class="mt-4">
        <label for="summary" class="form-label">Summary</label>
        <textarea id="summary" name="summary" value="{{ old('summary')}}" class="form-control"  autocomplete="summary"></textarea>
        @error('summary')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Submit</button>
        <a href="{{ route('customer.ticket.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
    </div>
    </div>

 @endsection


