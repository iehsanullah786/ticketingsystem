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

    public function index()
    {
        $authuser=Auth::User();
        if($authuser->role=='admin'){
            $tickets=Ticket::all();
        }
        else{
            $tickets=$authuser->assignedtickets();
        }

        return view('tickets.index', compact( 'tickets'));
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
        return view('tickets.edit', compact('priorities', 'statuses', 'agents','id'));
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
        $ticket->agents()->attach($request->agent);

        return view('tickets.detail', compact( 'ticket'));
    }

    public function destroy(Ticket $ticket)
    {
        //
    }
}
