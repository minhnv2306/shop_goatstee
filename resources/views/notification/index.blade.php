<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-bell-o"></i>
    @if ($totalNoti != 0)
        <span class="label label-warning"> {{ $totalNoti }} </span>
    @endif
</a>
<ul class="dropdown-menu">
    <li class="header">You have {{ $totalNoti }} notifications</li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            @foreach($notifications as $notification)
                <li>
                    <a href="{{ route('orders.show', ['order' => $notification->object_id]) }}">
                        <i class="fa fa-users text-aqua"></i> Order #{{$notification->object_id}} have just added!
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
    <li class="footer"><a href="#">View all</a></li>
</ul>
