<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Notification;

class NotificationRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Cart::class);
    }

    public function getUnReadNotification()
    {
        return Notification::where('is_read', Notification::UN_READ)
            ->get();
    }
}
