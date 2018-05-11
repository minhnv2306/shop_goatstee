<div class="row" id="product-content">
    @foreach($products as $product)
        <div class="col col-sm-3 padding-bottom-40">
            <a href="{{ route('product.show', ['product' => $product->id]) }}" class="woocommerce-LoopProduct-link">
                <!-- Featured Image From URL plugin -->
                <img src="{{ asset('/storage/' . $product->link) }}">
                <h3 class="title-name-product">
                    {{ $product->name }}
                </h3>
                <span class="price">
                    <span class="woocommerce-Price-amount amount font-bold">
                        <span class="woocommerce-Price-currencySymbol">$</span>
                        {{ number_format($product->price) }}
                    </span>
                </span>
                <br>
                <i class="fa fa-shopping-cart padding-right-20" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
        </div>
    @endforeach
</div>
<div class="col col-sm-12 padding-bottom-40">
    {{ $products->links() }}
</div>
