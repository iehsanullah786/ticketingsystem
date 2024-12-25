<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use App\Models\Priority;
use App\Models\Status;
use App\Models\TicketAssignment;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable = ['customer_user_id', 'agent_user_id', 'subject', 'summary' , 'priority_id', 'status_id']; // Fillable attributes

    //as a child
    public function status()
    {
        return $this->belongsTo(Status::class,'status_id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class,'priority_id');
    }

    //as a parent
    public function messages()
    {
        return $this->hasMany(Message::class,'ticket_id');
    }

    public function assignedTickets()
    {
        return $this->hasMany(TicketAssignment::class,'ticket_id');
    }

}
