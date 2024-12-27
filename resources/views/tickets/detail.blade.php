@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <div class="row g-6">
                <!-- View sales -->
                <div class="col-xl-4 ">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-7">
                        <div class="card-body text-nowrap">


                          <h4 class="text-primary mb-1">{{$ticket->subject}}</h4>
                          <p class="mb-2">Lorem ipsum dolor</p>
                          <a href="{{ route('tickets.index')}}" class="btn btn-primary mr-2">
                          Return to tickets list</a>

                          <a href="{{ route('tickets.edit', $ticket->id)}}" class="btn btn-primary">
                          Edit Details</a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- View sales -->

                <!-- Statistics -->
                <div class="col-xl-8 col-md-12">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <h5 class="card-title mb-0">Summary</h5>
                      <small class="text-muted">Created at: <span class="text-warning">{{ $ticket->created_at}}</span></small>

                    </div>
                    <div class="card-body d-flex align-items-end">
                      <div class="w-100">
                        <div class="row gy-3">
                        <p>{{$ticket->summary}}</p>
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded bg-label-danger me-4 p-2">
                              <i class="ti ti-user-shield"></i>

                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">Agent</h5>
                                <small>Agent name</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-6">
                            <!-- <div class="d-flex align-items-center">
                              <div class="badge rounded bg-label-success me-4 p-2">
                                <i class="ti ti-currency-dollar ti-lg"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">$9745</h5>
                                <small>Revenue</small>
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Statistics -->

                <div class="col-xxl-4 col-12">
                  <div class="row g-6">
                    <!-- Profit last month -->
                    <div class="col-xl-6 col-sm-6">
                      <div class="card h-100">
                        <div class="card-header pb-7">
                          <h5 class="card-title mb-1">Status</h5>
                          <p class="text-success text-nowrap mb-0"> 15.8%</p>
                        </div>
                        <!-- <div class="card-body">
                          <div id="profitLastMonth"></div>
                          <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                            <h4 class="mb-0">624k</h4>
                            <small class="text-success">+8.24%</small>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <!--/ Profit last month -->

                    <!-- Expenses -->
                    <div class="col-xl-6 col-sm-6">
                      <div class="card h-100">
                        <div class="card-header pb-7">
                          <h5 class="card-title mb-1">Priority</h5>
                          <p class="text-success text-nowrap mb-0"> 15.8%</p>
                        </div>
                        <!-- <div class="card-body">
                          <div id="expensesChart"></div>
                          <div class="mt-3 text-center">
                            <small class="text-muted mt-3">$21k Expenses more than last month</small>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <!--/ Expenses -->


                  </div>
                </div>

                <!-- Revenue Report -->
                <div class="col-xxl-8">
                  <div class="card h-100">
                    <div class="card-body p-0">
                      <div class="row row-bordered g-0">
                        <div class="col-md-8 position-relative p-6">
                          <div class="card-header d-inline-block p-0 text-wrap position-absolute">
                            <h5 class="m-0 card-title">Messages</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Revenue Report -->
@endsection

