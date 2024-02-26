<?php

namespace App\Services\Orders\Enums;

enum OrderStatusEnum: string
{
    case pending = 'pending';

    case completed = 'completed';

    case cancelled = 'cancelled';

}