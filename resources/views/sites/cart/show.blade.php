@extends('layouts.sites.master')
@section('title', trans('sites.cart'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-11" class="post-11 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> @lang('sites.carts.cart') </h1>
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
                                            <a href="{{ route('sites.home') }}" class="button wc-forward"> @lang('sites.carts.continue') </a>
                                            &ldquo;{{session('message')}}
                                        </div>
                                    @endif
                                    @if(!empty(session('error')))
                                        <div class="woocommerce-message">
                                            <a href="{{ route('sites.home') }}" class="button wc-forward"> @lang('sites.carts.continue') </a>
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
                                                    <td class="product-name" data-title="Product">
                                                        <a href="{{ route('product.show', ['product' => $cartProduct->storeProduct->product->id]) }}">
                                                            {{ $cartProduct->storeProduct->product->name }}
                                                        </a>
                                                        <dl class="variation">
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
                                                            <input type="number" step="1" min="0" max=""
                                                                   name="cartProductIds[{{$cartProduct->id}}][number]"
                                                                   value={{ $cartProduct->number }}
                                                                           title="Qty" class="input-text qty text" size="4"
                                                                   pattern="[0-9]*" inputmode="numeric"/>
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
                                            <tr>
                                                <td colspan="6" class="actions">
                                                    <div class="coupon">
                                                        <label for="coupon_code">Coupon:</label>
                                                        <input type="text" name="coupon_code" class="input-text"
                                                               id="coupon_code"
                                                               value="" placeholder="Coupon code"/>
                                                        <input type="submit" class="button" name="apply_coupon"
                                                               value="Apply Coupon"/>
                                                    </div>
                                                    <input type="submit" class="button" name="update_cart" value="Update Cart"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    {!! Form::close() !!}
                                    <div class="cart-collaterals">
                                        <div class="cart_totals calculated_shipping">
                                            <h2> @lang('sites.carts.cart_total') </h2>
                                            <table cellspacing="0" class="shop_table shop_table_responsive">
                                                <tr class="cart-subtotal">
                                                    <th> @lang('sites.carts.subtotal') </th>
                                                    <td data-title="Subtotal">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                            {{ number_format($price) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th> @lang('sites.carts.shipping') </th>
                                                    <td data-title="Shipping">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">&#36;</span> 0
                                                        </span>
                                                        <input type="hidden" name="shipping_method[0]" data-index="0"
                                                               id="shipping_method_0" value="flat_rate:3"
                                                               class="shipping_method"/>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th> @lang('sites.carts.total') </th>
                                                    <td data-title="Total">
                                                        <strong>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                                {{number_format($price)}}
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="wc-proceed-to-checkout">
                                                <a href="{{ route('sites.order') }}" class="checkout-button button alt wc-forward">
                                                    @lang('sites.carts.checkout')
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.product-remove').click(function () {
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
                                alert('{{ trans('sites.some_thing_wrong') }}');
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
