@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">All Statuses </h5>
      <a href="{{ route('customer.ticket.create') }}" class="btn btn-primary">
        <i class="ti ti-plus me-1"></i>Add new ticket
      </a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Created At</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($tickets as $ticket)
            <tr>
              <td>
                {{ $ticket->subject}}
              </td>
              <td>
                {{ $ticket->created_at}}
              </td>

              <td>
                {{ $ticket->status}}
              </td>
              <td>
      <a href="{{ route('customer.ticket.show',$ticket->id) }}" class="btn btn-primary">
        </i>Details
      </a>

      <a href="{{ route('customer.ticket.destroy',$ticket->id) }}" class="btn btn-danger">
</i>Delete
      </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="12" class="text-center">No Ticket found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
