@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Add Canned Reply</h5>
    <form method="POST" action="{{ route('canned-replies.store') }}" class="card-body">
      @csrf

        <!-- Name -->
      <div class="mt-4">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title')}}" class="form-control"  autofocus autocomplete="title" />
        @error('title')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Email -->
      <div class="mt-4">
        <label for="body" class="form-label">Body</label>
        <textarea id="body" name="body" value="{{ old('body')}}" class="form-control"  autocomplete="body"></textarea>
        @error('body')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>




      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Submit</button>
        <a href="{{ route('canned-replies.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
    </div>
    </div>

 @endsection


