<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChMessage;
use App\Models\Priority;
use App\Models\Status;
use App\Models\User;
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
        return $this->hasMany(ChMessage::class,'ticket_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_user_id');
    }

    public function agents()
    {
        return $this->belongsToMany(User::class,'ticket_agent');
    }

}
