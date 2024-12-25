<?php
namespace App;
enum StatusesEnum: string
{
 // case NAMEINAPP = 'name-in-database';
    case IN_PROGRESS = 'In Progress';
    case PAID= 'Paid';
    case MAIL_S = 'Mail S';
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
