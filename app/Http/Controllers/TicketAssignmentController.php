<?php

namespace App\Http\Controllers;
use App\Models\TicketAssignment;
use App\Http\Requests\StoreTicketAssignmentRequest;
use App\Http\Requests\UpdateTicketAssignmentRequest;

class TicketAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        dd($id);
        return view('tickets.detail', compact( 'tickets'));
    }

    public function create()
    {
        //
    }

    public function store(StoreTicketAssignmentRequest $request)
    {
        //
    }

    public function show(TicketAssignment $ticketAssignment)
    {
        //
    }

    public function edit(TicketAssignment $ticketAssignment)
    {
        //
    }

    public function update(UpdateTicketAssignmentRequest $request, TicketAssignment $ticketAssignment)
    {
        //
    }

    public function destroy(TicketAssignment $ticketAssignment)
    {
        //
    }
}
