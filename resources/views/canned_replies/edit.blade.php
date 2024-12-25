@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Edit Canned Reply</h5>
    <form method="POST" action="{{ route('canned-replies.update', $cannedReply->id) }}" class="card-body">
      @csrf
      @method('PUT')

       <!-- Name -->
       <div class="mt-4">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $cannedReply->title) }}" class="form-control"  autofocus autocomplete="title" />
        @error('title')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

       <!-- Body -->
       <div class="mt-4">
        <label for="body" class="form-label">Body</label>
        <input type="text" id="body" name="body" value="{{ old('body', $cannedReply->body) }}" class="form-control"  autofocus autocomplete="body" />
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


