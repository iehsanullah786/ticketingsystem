<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
class Priority extends Model
{
    /** @use HasFactory<\Database\Factories\PriorityFactory> */
    use HasFactory;
    protected $fillable = ['name']; // Fillable attributes

    //as a parent
    public function tickets()
    {
        return $this->hasMany(Ticket::class,'priority_id');
    }
}
