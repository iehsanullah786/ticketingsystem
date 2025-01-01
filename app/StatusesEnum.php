<?php
namespace App;
enum StatusesEnum: string
{
 // case NAMEINAPP = 'name-in-database';
    case UN_ASSIGNED = 'Un Assigned';
    case ASSIGNED= 'Assigned';
    case AWAITINGCLIENTRESPONSE = 'Awaiting Client Response';
    case CLOSED = 'Closed';


    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    // public function label(): string
    // {
    //     return match ($this) {
    //         static::IN_PROGRESS => 'IN_PROGRESS',
    //         static::Paid => 'Paid',
    //         static::Mail S => 'Mail S ',
    //         static::Closed => 'Closed',
    //     };
    // }
}
