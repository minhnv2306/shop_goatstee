@can('update', 'App\Models\Order')
<a href="{{ route('orders.show', ['order' => $order->id]) }}" class="btn btn-xs btn-primary">
    <i class="fa fa-edit"></i> @lang('admin.edit')
</a>
@endcan
