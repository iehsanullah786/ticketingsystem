<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use App\Models\Priority;
use App\Models\Ticket;
class Status extends Model
{
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory;
    protected $fillable = ['name']; // Fillable attributes

    //as a parent
    public function tickets()
    {
        return $this->hasMany(Ticket::class,'status_id');
    }
}
