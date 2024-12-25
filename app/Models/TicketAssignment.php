<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\User;
class TicketAssignment extends Model
{
    /** @use HasFactory<\Database\Factories\TicketAssignmentFactory> */
    use HasFactory;
    protected $fillable = ['ticket_id', 'agent_id']; // Fillable attributes

    //as a child
    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class,'agent_id');
    }
}
