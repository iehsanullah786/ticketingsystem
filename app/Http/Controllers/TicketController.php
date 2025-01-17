<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Priority;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

    public function index(Request $request)
    {
        $statuses = Status::all();

        // Start a query for tickets
        $query = Ticket::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status_id', $request->status);
        }

        // Search by subject
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('subject', 'like', "%{$search}%");
        }

        // Execute the query
        $tickets = $query->get();

        return view('tickets.index', compact('tickets', 'statuses'));
    }



    public function create($id)
    {

    }


    public function store(Request $request, $id)
    {

    }

    public function show($id)
    {
        $ticket=Ticket::find($id);
        return view('tickets.detail', compact( 'ticket'));
    }


    public function editDetails($id)
    {
        $agents=User::Role('agent')->get();
        $priorities=Priority::all();
        $statuses=Status::all();

        //get old values
        $ticket=Ticket::find($id);
        $currentStatusId = $ticket->status_id;

        //get old values
        $currentPriorityId = $ticket->priority_id;
        $currentAgentId = $ticket->agents->first()->id ?? '';
        return view('tickets.edit', compact('priorities', 'statuses', 'agents','id', 'currentStatusId', 'currentPriorityId','currentAgentId'));
    }

    public function updateDetails(Request $request , $id)
    {

        $ticket=Ticket::find($id);

        //assiging Status to ticket
        $status=Status::find($request->status);
        $ticket->status()->associate($status);

        //assiging priority to ticket
        $priority=priority::find($request->priority);
        $ticket->priority()->associate($priority);

        $ticket->save();

        // assiging Status to ticket
        $ticket->agents()->detach();
        $ticket->agents()->attach($request->agent);

        return view('tickets.detail', compact( 'ticket'));
    }

    public function destroy($id)
    {
        Ticket::destroy($id);
        return redirect(route('tickets.index'));

    }



    public function filterTickets(Request $request)
    {
        dd($request);
        $status=Status::find($request);
        $tickets=$status->tickets;
        return redirect(route('tickets.index', compact('tickets')));

    }





}
