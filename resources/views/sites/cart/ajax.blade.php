<article id="post-11" class="post-11 page type-page status-publish hentry no-post-thumbnail entry"
         itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
    <div class="entry-content" itemprop="text">
        <div class="woocommerce">
            @if(count($cartProducts) == 0)
                <div class="woocommerce">
                    <p class="cart-empty"> @lang('sites.carts.empty_cart') </p>
                </div>
            @else
                @if(!empty(session('name_product')))
                    <div class="woocommerce-message">
                        <a href="{{ route('sites.home') }}"
                           class="button wc-forward"> @lang('sites.carts.continue') </a> &ldquo;{{session('name_product')}}&rdquo; @lang('sites.carts.added')
                    </div>
                @endif

                @if(!empty(session('message')))
                    <div class="woocommerce-message">
                        <a href="{{ route('sites.home') }}"
                           class="button wc-forward"> @lang('sites.carts.continue') </a>
                        &ldquo;{{session('message')}}
                    </div>
                @endif
                @if(!empty(session('error')))
                    <div class="woocommerce-message">
                        <a href="{{ route('sites.home') }}"
                           class="button wc-forward"> @lang('sites.carts.continue') </a>
                        &ldquo;{{session('error')}}
                    </div>
                @endif

                {!! Form::open([
                    'method' => 'POST',
                    'route' => 'sites.cart.update'
                ]) !!}
                <table class="shop_table shop_table_responsive cart" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="product-remove">&nbsp;</th>
                        <th class="product-thumbnail">&nbsp;</th>
                        <th class="product-name"> @lang('sites.carts.product') </th>
                        <th class="product-price"> @lang('sites.carts.price') </th>
                        <th class="product-quantity"> @lang('sites.carts.quantity') </th>
                        <th class="product-subtotal"> @lang('sites.carts.total') </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartProducts as $cartProduct)
                        <tr class="cart_item">
                            <td>
                                <a href="javascript:void(0)" class="remove product-remove" title="Remove this item"
                                   data-content="{{ $cartProduct->id }}" data-product_sku="">&times;
                                </a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="{{ route('product.show', ['product' => $cartProduct->storeProduct->product->id]) }}">
                                    <!-- Featured Image From URL plugin -->
                                    <img src="{{$cartProduct['avatar'][0]->link }}"></img>
                                </a>
                            </td>
                            <td class="product-name" data-title="Product" style="padding: 0px">
                                <a href="{{ route('product.show', ['product' => $cartProduct->storeProduct->product->id]) }}">
                                    {{ $cartProduct->storeProduct->product->name }}
                                </a>
                                <dl class="variation" style="margin: 0px">
                                    <dt class="variation-Color"> @lang('sites.product.color'):</dt>
                                    <dd class="variation-Color">
                                        <p>{{ $cartProduct->storeProduct->color->name }}</p>
                                    </dd>
                                    <dt class="variation-Size"> @lang('sites.product.size'):</dt>
                                    <dd class="variation-Size">
                                        <p>{{ $cartProduct->storeProduct->size->name }}</p>
                                    </dd>
                                    <dt class="variation-FitType"> @lang('sites.product.type'):</dt>
                                    <dd class="variation-FitType">
                                        <p>{{ $cartProduct->storeProduct->sex }}</p>
                                    </dd>
                                </dl>
                            </td>
                            <td class="product-price" data-title="Price">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">&#36;</span> {{ number_format($cartProduct->storeProduct->product->price) }}
                                </span>
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <input type="number" step="1" min="0" max="" name="cartProductIds[{{$cartProduct->id}}][number]"
                                           value={{ $cartProduct->number }} title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric"/>
                                </div>
                            </td>
                            <td class="product-subtotal" data-title="Total">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                    {{ number_format($cartProduct->price)}}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="order-total">
                        <th class="text-right"> @lang('sites.carts.total') </th>
                        <td data-title="Total" colspan="6" class="text-right">
                            <strong>
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                    {{number_format($price)}}
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="actions">
                            <input type="submit" class="button" name="update_cart" value="Update Cart"/>
                            <a href="{{ route('sites.order') }}" class="checkout-button button alt wc-forward">
                                @lang('sites.carts.checkout')
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                {!! Form::close() !!}
            @endif
        </div>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
<script>
    $(document).ready(function () {
        $('.product-remove').on('click', function () {
            var button = $(this);
            if (!confirm('{{trans('admin.category.delete')}}')) {
                e.preventDefault();
            } else {
                var id = $(this).attr('data-content');

                // Ajax when use delete product in their cart
                $.ajax({
                    url: '{{ route('sites.cart.remove-product') }}',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        if (data == 1) {
                            button.parentsUntil('tbody').remove();
                        } else {
                            swal('Oops!', '{{ trans('sites.some_thing_wrong') }}', 'error');
                        }
                    }
                })
            }
        })
    })
</script>
