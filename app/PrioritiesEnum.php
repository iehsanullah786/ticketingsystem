<?php
namespace App;
enum PrioritiesEnum: string
{
 // case NAMEINAPP = 'name-in-database';
    case NORMAL = 'Normal';
    case MEDIUM = 'Medium';
    case URGENT = 'Urgent';
    case INTERMEDIATE = 'Immediate';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    // public function label(): string
    // {
    //     return match ($this) {
    //         static::NORMAL => 'Normal',
    //         static::MEDIUM => 'Medium',
    //         static::URGENT => 'Urgent',
    //         static::INTERMEDIATE => 'Immediate',
    //     };
    // }
}
