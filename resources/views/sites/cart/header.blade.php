<span>
    <a class="cart-contents" href="{{ route('sites.cart') }}" title="{{ trans('sites.carts.title') }}">
        <span class="total">$ {{ number_format($price) }}</span>
        <i class="fa fa-shopping-cart"></i>
        <span class="count">{{ number_format($number) }}</span>
    </a>
</span>
