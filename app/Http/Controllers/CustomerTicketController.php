<?php
namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authuser=Auth::user();
        $tickets=$authuser->tickets;
        return view('customers.tickets.index', compact( 'tickets'));
    }

    public function show($id)
    {
        $ticket=Ticket::find($id);
        return view('customers.tickets.detail', compact( 'ticket'));
    }

    public function create()
    {

        return view('customers.tickets.create');
    }

    public function store(Request $request)
    {

        $ticket=New Ticket;
        $ticket->subject=$request->subject;
        $ticket->summary=$request->summary;
        $ticket->save();
        $currentuser=Auth::user();
        $currentuser->tickets()->save($ticket);
        return redirect()->route('customer.ticket.index');
    }

    public function destroy($id)
    {

        Ticket::destroy($id);
        return redirect()->route('customer.ticket.index');
    }
}
