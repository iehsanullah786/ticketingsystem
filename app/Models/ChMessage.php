<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Chatify\Traits\UUID;

class ChMessage extends Model
{
    public  $fillable = ['id', 'from_id', 'to_id', 'ticket_id', 'body', 'attachment', 'seen', 'created_at', 'updated_at'];

    use UUID;

    //as a child
    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id');
    }
}
