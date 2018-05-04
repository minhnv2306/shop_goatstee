<a href="{{ route('products.show', ['product' => $product]) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> @lang('admin.edit')</a>
{!! Form::open([
    'class' => 'inline',
    'route' => ['products.destroy', 'product' => $product->id],
    'method' => 'DELETE'
]) !!}
    <button class="btn btn-xs btn-danger deleteElement"><i class="fa fa-trash"></i> @lang('admin.delete') </button>
{!! Form::close() !!}
@include('layouts.admin.components.delete-element')
