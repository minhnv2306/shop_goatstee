<option value="0"> @lang('admin.select_option') </option>
@foreach($sizes as $size)
    <option value="{{ $size->id }}">{{ $size->name }}</option>
@endforeach
