<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\TicketAssignment;
use App\UserStatus;
use App\Models\Message;
use App\Models\Ticket;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'image',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class, // This is fine for your UserStatus enum
        ];
    }

    //As a parent
    public function sentMessages()
    {
        return $this->hasMany(Message::class,'sender_id');
    }


    public function receivedMessages()
    {
        return $this->hasMany(Ticket::class,'receiver_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class,'customer_user_id');
    }

}
