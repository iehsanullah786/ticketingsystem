@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Salary Slip Generation Form</h5>
    <form method="POST" action="{{ route('salary-slips.store') }} " class="card-body">
      @csrf

<!-- Employee -->
<div class="mt-4">
    <label for="employee_id" class="form-label">Employee</label>
    <select name="employee_id" class="form-select">
        @foreach ($employees as $employee)
            <option value="{{ $employee->id }}" {{ old('name', $selectedEmployeeId ?? '') == $employee->id ? 'selected' : '' }}>
                {{ $employee->name }}
            </option>
        @endforeach
    </select>
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

        <!-- Payroll -->
      <div class="mt-4">
        <label for="payroll_period_id" class="form-label">Payroll</label>
        <select name="payroll_period_id" class="form-select">
        @foreach ($payrollperiods as $payrollperiod)
            <option value="{{ $payrollperiod->id }}">
                {{ $payrollperiod->month." , ".$payrollperiod->year }}
            </option>
        @endforeach
    </select>
        @error('name')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Adjustment Type -->
      <div class="mt-4">
    <label for="adjustment_type_id" class="form-label">Adjustment Type</label>
    <select name="adjustment_type_id" class="form-select">
        @foreach ($adjustmenttypes as $adjustmenttype)
            <option value="{{ $adjustmenttype->id }}" {{ old('name', $selectedEmployeeId ?? '') == $adjustmenttype->id ? 'selected' : '' }}>
                {{ $adjustmenttype->name }}
            </option>
        @endforeach
    </select>
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

      <!-- Adjustment Amount -->
        <div class="mt-4">
        <label for="adjustment_amount" class="form-label">Adjustment Amount</label>
        <input type="number" id="mode" name="adjustment_amount" value="{{ old('mode')}}" class="form-control"  autofocus autocomplete="mode" />
        @error('name')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Submit</button>
        <a href="{{ route('salary-slips.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
    </div>
    </div>

 @endsection
 @push('scripts')
 <script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
@endpush

