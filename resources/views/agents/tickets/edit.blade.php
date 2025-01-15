@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Add Ticket Details</h5>
    <form  method="POST" action="{{ route('agent.ticket.update-details', parameters: $id) }}" class="card-body">
      @csrf

      <!-- Statuses -->
      <div class="mt-4">
        <label for="status" class="form-label">Select Status</label>
        <select name="status" class="form-control">
            @foreach ($statuses as $status)
            <option
                value="{{ $status->id }}"
                {{ old('status', $currentStatusId) == $status->id ? 'selected' : '' }}>
                {{ \App\StatusesEnum::from($status->name) }}
            </option>
            @endforeach
        </select>
        @error('status')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>






      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Submit</button>
        <a href="{{ route('agent.ticket.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
    </div>
    </div>

 @endsection


