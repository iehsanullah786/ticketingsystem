@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">All tickets </h5>

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
            <!-- <th>Status</th> -->

          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($tickets as $ticket)
          <a href="{{route('tickets.show', $ticket->id)}}">
            <tr>

              <td>
                {{ $ticket->subject}}
              </td>

              <td>
                {{ $ticket->priority->name}}
              </td>
              <td>
                {{ $ticket->Status->name}}
              </td>
              <td>
                {{ $ticket->updated_at}}
              </td>
              <td>
              {{ $ticket->customer->first_name}}               {{ $ticket->customer->last_name}}
              </td>
              <td>
              {{ $ticket->agents->first()->first_name}}               {{ $ticket->agents->first()->last_name}}
              </td>

              <td>
              <a href="{{ route('tickets.show',$ticket->id) }}" class="btn btn-primary"></i>Details</a>
              </td>

              <td>
              <a href="{{route('tickets.edit', $ticket->id)}}">
                <button class="btn btn-warning"><i class="ti ti-edit me-2"></i></button>
              </a>

              <form method="POST" action="{{ route('tickets.destroy', $ticket->id) }}"  onsubmit="return confirm('Are you sure you want to delete this ticket?');" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit"><i class="ti ti-trash me-2"></i></button>
                </form>

              </td>

            </tr>
            </a>
          @empty
            <tr>
              <td colspan="12" class="text-center">No ticket found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

