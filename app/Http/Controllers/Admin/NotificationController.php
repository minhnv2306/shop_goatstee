<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use App\Repositories\Contracts\NotificationInterfaceRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    protected $repository;

    public function __construct(NotificationInterfaceRepository $notificationRepository)
    {
        $this->repository = $notificationRepository;
    }

    public function getNotification()
    {
        $notifications = $this->repository->getUnReadNotification();
        $totalNoti = count($notifications);

        return view('notification.index', [
            'notifications' => $notifications,
            'totalNoti' => $totalNoti
        ]);
    }
}
