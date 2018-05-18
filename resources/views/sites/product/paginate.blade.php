<div class="row" id="product-content">
    @foreach($products as $product)
        <div class="col col-sm-3 padding-bottom-40">
            <product
                product="{{$product}}"
                avatar="{{'/storage/'. $product->link}}"
                url="{{ route('product.show', ['product' => $product->id]) }}"
            ></product>
        </div>
    @endforeach
</div>
<div class="col col-sm-12 padding-bottom-40">
    {{ $products->links() }}
</div>
{{ Html::script('js/product/paginate.js') }}
