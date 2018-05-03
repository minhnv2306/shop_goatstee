@foreach($images as $image)
    <img src="{{asset($image->link)}}" class="img-product" alt="">
@endforeach
