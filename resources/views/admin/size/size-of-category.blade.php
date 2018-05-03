<thead>
<tr>
    <th> @lang('admin.id') </th>
    <th> @lang('admin.name') </th>
    <th> @lang('admin.action') </th>
</tr>
</thead>
<tbody>
@foreach($sizes as $size)
    <tr>
        <td>{{ $size->id }}</td>
        <td>{{ $size->name }}</td>
        <td>
            <button class="btn btn-xs btn-primary" data-toggle="modal"
                    data-target="#edit-size-{{$size->id}}">
                <i class="fa fa-edit"></i> @lang('admin.edit')
            </button>

            <!-- Modal -->
            <div id="edit-size-{{$size->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    {!! Form::open([
                        'method' => 'PUT',
                        'route' => ['sizes.update', 'size' => $size->id],
                    ]) !!}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                            <h4 class="modal-title"> @lang('admin.size.edit') </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('name', trans('admin.category.name')) }}
                                {{ Form::text('name', $size->name, [
                                    'class' => 'form-control',
                                    'id' => 'name',
                                    'required' => '',
                                ]) }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{ Form::submit(trans('admin.update'), ['class' => 'btn btn-primary']) }}
                            {{ Form::submit(trans('admin.close'), [
                                'class' => 'btn btn-default',
                                'data-dismiss' => 'modal'
                            ]) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- End modal -->
            @if($size->has('storeProducts')->get()->isEmpty())
                {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['sizes.destroy', 'size' => $size->id],
                    'class' => 'inline',
                ]) !!}
                <button class="btn btn-xs btn-danger deleteElement">
                    <i class="fa fa-trash"></i> @lang('admin.delete')
                </button>
                {!! Form::close() !!}
            @endif
        </td>
    </tr>
@endforeach
</tbody>
@include('layouts.admin.components.delete-element')
