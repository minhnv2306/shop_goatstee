<a href="{{ route('products.show', ['product' => $product]) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> @lang('admin.edit')</a>
{!! Form::open([
    'class' => 'inline',
    'route' => ['products.destroy', 'product' => $product->id],
    'method' => 'DELETE'
]) !!}
    <button class="btn btn-xs btn-danger deleteElement-{{$product->id}}"><i class="fa fa-trash"></i> @lang('admin.delete') </button>
{!! Form::close() !!}
<script>
    $('.deleteElement-' + {{$product->id}}).click(function (e) {
        if(!confirm('{{trans('admin.category.delete')}}')) {
            e.preventDefault();
        }
    })
</script>
