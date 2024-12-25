@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">All Canned Replies </h5>
      <a href="{{ route('canned-replies.create') }}" class="btn btn-primary">
        <i class="ti ti-plus me-1"></i>Add new Canned Reply
      </a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Body</th>
            <th>Edit</th>
            <!-- <th>Status</th> -->

          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($cannedReplies as $cannedReply)
            <tr>

              <td>
                {{ $cannedReply->title}}
              </td>
              <td>
                {{ $cannedReply->body}}
              </td>
              <td>
              <a href="{{route('canned-replies.edit', $cannedReply->id)}}">
                <button class="btn btn-warning"><i class="ti ti-edit me-2"></i></button>
              </a>

              <form method="POST" action="{{ route('canned-replies.destroy', $cannedReply->id) }}"  onsubmit="return confirm('Are you sure you want to delete this employee?');" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit"><i class="ti ti-trash me-2"></i></button>
                </form>

              </td>

            </tr>
          @empty
            <tr>
              <td colspan="12" class="text-center">No employee found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

