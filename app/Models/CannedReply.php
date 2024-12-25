<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use App\Models\Priority;
use App\Models\Status;
class CannedReply extends Model
{
    /** @use HasFactory<\Database\Factories\CannedReplyFactory> */
    use HasFactory;

    protected $fillable = ['title', 'body']; // Fillable attributes


}
