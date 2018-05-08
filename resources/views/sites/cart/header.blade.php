<span>
    <a class="cart-contents" href="{{ route('sites.cart') }}" title="{{ trans('sites.carts.title') }}">
        <span class="total">$ {{ $price }}</span>
        <i class="fa fa-shopping-cart"></i>
        <span class="count">{{ $number }}</span>
    </a>
</span>
