@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">All tickets</h5>

      <!-- Status Filter -->
      <form method="GET" action="{{ route('tickets.index') }}" class="d-flex">
        <select name="status" class="form-select me-2">
          <option value="">All Statuses</option>
          @foreach ($statuses as $status)
            <option value="{{ $status->id }}" {{ request('status') == $status->id ? 'selected' : '' }}>
              {{ $status->name }}
            </option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
      </form>

    </div>


    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Updated At</th>
            <th>Customer Name</th>
            <th>Agent Name</th>
            <th>Action</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($tickets as $ticket)
          <tr>
            <td>{{ $ticket->subject }}</td>
            <td>{{ $ticket->priority->name ?? '' }}</td>
            <td>{{ $ticket->status->name ?? '' }}</td>
            <td>{{ $ticket->updated_at }}</td>
            <td>{{ $ticket->customer->name }}</td>
            <td>{{ $ticket->agents->first()->name ?? '' }}</td>
            <td>
              <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-primary">Details</a>
            </td>
            <td>
              @role('admin')
              <form method="POST" action="{{ route('tickets.destroy', $ticket->id) }}" onsubmit="return confirm('Are you sure you want to delete this ticket?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="ti ti-trash"></i></button>
              </form>
              @endrole
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-center">No tickets found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
