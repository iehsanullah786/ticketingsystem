@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">All Statuses </h5>
      <!-- <a href="{{ route('priorities.create') }}" class="btn btn-primary">
        <i class="ti ti-plus me-1"></i>Add new Priority
      </a> -->
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($statuses as $status)
            <tr>
              <td>
                {{ $status->name}}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="12" class="text-center">No Statuses found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

