@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <div class="row g-6">
                <div class="col-xl-4 ">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-7">
                        <div class="card-body text-nowrap">


                          <h4 class="text-primary mb-3">{{$ticket->subject}}</h4>

                          <a href="{{ route('customer.ticket.index')}}" class="btn btn-primary mr-4" style="margin-right: 10px;">
                          Return to tickets list</a>


                          @php
                          $agent = $ticket->agents->first();
                          $id = $agent ? $agent->id : null; // Set $id to null if no agent exists
                          $messengerColor = '#ffffff';
                          $dark_mode = '#ffffff';
                      @endphp


                          <a href="{{ url('chatify/'.$id)}}" class="btn btn-primary mr-2">
                          Chat</a>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- View sales -->

                <!-- Summary -->
                <div class="col-xl-12 col-md-12">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <h5 class="card-title mb-0">Ticket details:</h5>
                      <small class="text-muted">Created at: <span class="text-warning">{{ $ticket->created_at}}</span></small>

                    </div>
                    <div class="card-body d-flex align-items-end">
                      <div class="w-100">
                        <div class="row gy-3">
                        <p>{{$ticket->summary}}</p>
                          <div class="col-md-3 col-6">

                          </div>
                          <div class="col-md-3 col-6">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Statistics -->

                <div class="col-xxl-12 col-12">
                  <div class="row g-6">
                    <!-- Profit last month -->
                    <div class="col-xl-4 col-sm-4">
                      <div class="card h-100">
                        <div class="card-header pb-7">
                          <h5 class="card-title mb-1">Status</h5>
                          <p class="text-success text-nowrap mb-0"> {{$ticket->status->name ?? ""}}</p>
                        </div>

                      </div>
                    </div>
                    <!--/ Profit last month -->

                    <!-- Priority -->
                    <div class="col-xl-4 col-sm-4">
                      <div class="card h-100">
                        <div class="card-header pb-7">
                          <h5 class="card-title mb-1">Priority</h5>
                          <p class="text-success text-nowrap mb-0"> {{$ticket->priority->name ?? ""}}</p>
                        </div>

                      </div>
                    </div>
                    <!--/ Expenses -->

                    <!-- Agent -->
                    <div class="col-xl-4 col-sm-4">
                      <div class="card h-100">
                        <div class="card-header pb-7">

                          <div class="d-flex align-items-center">
                            <div class="badge rounded bg-label-danger me-4 p-2">
                            <i class="ti ti-user-shield"></i>

                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">Agent</h5>
                              <small>{{$ticket->agents->first()->name ?? ""}}</small>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

@endsection

