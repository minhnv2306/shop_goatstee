<a href="{{ route('orders.show', ['order' => $order->id]) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> @lang('admin.edit')</a>
{!! Form::open([
    'class' => 'inline',
    'route' => ['orders.destroy', 'product' => $order->id],
    'method' => 'DELETE'
]) !!}
