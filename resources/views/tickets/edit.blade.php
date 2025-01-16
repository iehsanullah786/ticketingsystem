@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Add Ticket Details</h5>
    <form  method="POST" action="{{ route('admin.ticket.update-details', parameters: $id) }}" class="card-body">
      @csrf

      <!-- Statuses -->
      <div class="mt-4">
        <label for="status" class="form-label">Select Status</label>
        <select name="status" class="form-control">
            @foreach ($statuses as $status)
            <option
                value="{{ $status->id }}"
                {{ old('status', $currentStatusId) == $status->id ? 'selected' : '' }}>
                {{ \App\StatusesEnum::from($status->name) ?? ""}}
            </option>
            @endforeach
        </select>

        @error('status')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      @role('admin')
        <!-- Priority -->
        <div class="mt-4">
        <label for="priority" class="form-label">Select Priority</label>
        <select name="priority" class="form-control">
            @foreach ($priorities as $priority)
            <option
                value="{{ $priority->id }}"
                {{ old('priority', $currentPriorityId) == $priority->id ? 'selected' : '' }}>
                {{ \App\PrioritiesEnum::from($priority->name) ?? ""}}
            </option>
            @endforeach
        </select>

        @error('priority')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
        </div>


        <!-- Agents -->
        <div class="mt-4 mb-4">
        <label for="agent" class="form-label">Select Agent</label>
        <select name="agent" class="form-control">
            @foreach ($agents as $agent)
            <option
                value="{{ $agent->id }}"
                {{ old('agent', $currentAgentId) == $agent->id ? 'selected' : '' }}>
                {{ $agent->name ?? ""}}
            </option>
            @endforeach
        </select>
        @error('agent')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
        </div>
        @endrole




      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Submit</button>
        <a href="{{ route('customer.ticket.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
    </div>
    </div>

 @endsection


