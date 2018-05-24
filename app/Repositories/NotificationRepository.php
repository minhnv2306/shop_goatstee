<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Notification;
use App\Repositories\Contracts\NotificationInterfaceRepository;

class NotificationRepository extends BaseRepository implements NotificationInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Notification::class);
    }

    public function getUnReadNotification()
    {
        return Notification::where('is_read', Notification::UN_READ)
            ->get();
    }
}
