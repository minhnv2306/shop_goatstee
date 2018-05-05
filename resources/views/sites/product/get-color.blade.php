<option value="0"> @lang('admin.select_option') </option>
@foreach($colors as $color)
    <option value="{{ $color->id }}">{{ $color->name }}</option>
@endforeach
