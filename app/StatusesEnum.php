<?php
namespace App;
enum StatusesEnum: string
{
 // case NAMEINAPP = 'name-in-database';
    case UN_ASSIGNED = 'Unassigned';
    case ASSIGNED= 'Assigned';
    case AWAITINGCLIENTRESPONSE = 'Awaiting Client Response';
    case CLOSED = 'Closed';
}
