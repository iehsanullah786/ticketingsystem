<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ticket;
class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessagesFactory> */
    use HasFactory;

    protected $fillable = ['body', 'is_read', 'sender_id', 'receiver_id']; // Fillable attributes

    //as a child
    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_id');
    }
}
