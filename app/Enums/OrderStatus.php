<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'PENDING';
    case InTransit = 'IN_TRANSIT';
    case Delivered = 'DELIVERED';
}
