@extends('layouts.sites.master')
@section('title', trans('sites.checkout'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-12" class="post-12 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> {{ 'Order #'. $order->id }}</h1>
                        <div class="entry-content" itemprop="text">
                            @if (count($productOrders) == 0)
                                <div class="woocommerce">
                                    <p class="cart-empty"> @lang('sites.carts.empty_cart') </p>
                                </div>
                            @else
                                <div class="woocommerce">
                                    @guest
                                        <div class="woocommerce-info"> @lang('sites.order.return_customer')
                                            <a href="{{ route('sites.my-account') }}"
                                               class="showlogin"> @lang('sites.order.login') </a>
                                        </div>
                                    @endguest
                                    {!! Form::open([
                                        'class' => 'checkout woocommerce-checkout',
                                        'enctype' => 'multipart/form-data',
                                    ])!!}
                                    <div class="col2-set animation-left-to-right" id="customer_details">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3> @lang('sites.order.billing') </h3>
                                                <p class="form-row form-row form-row-wide address-field validate-required"
                                                   id="address_field">
                                                    <label for="address" class=""> @lang('sites.order.your-name')
                                                        <abbr class="required" title="required">*</abbr>
                                                    </label>
                                                    {!! Form::text('customer_name', $order->customer_name, [
                                                       'class' => 'input-text color-black',
                                                       'disabled' => ''
                                                    ]) !!}
                                                </p>
                                                <p class="form-row form-row form-row-wide address-field validate-required"
                                                   id="address_field">
                                                    <label for="address" class=""> @lang('sites.order.billing-name')
                                                        <abbr class="required" title="required">*</abbr>
                                                    </label>
                                                    {!! Form::text('billing_name', $order->billing_name, [
                                                       'class' => 'input-text color-black',
                                                       'disabled' => ''
                                                    ]) !!}
                                                </p>
                                                <div class="clear"></div>
                                                <p class="form-row form-row form-row-wide" id="company_field">
                                                    <label for="company"
                                                           class=""> @lang('sites.order.billing-address') </label>
                                                    {!! Form::text('billing_address', $order->billing_address, [
                                                        'class' => 'input-text color-black',
                                                        'disabled' => ''
                                                    ]) !!}
                                                </p>
                                                <p class="form-row form-row form-row-wide address-field validate-required"
                                                   id="address_field">
                                                    <label for="address" class=""> @lang('sites.order.shipping-name')
                                                        <abbr class="required" title="required">*</abbr></label>
                                                    {!! Form::text('shipping_name', $order->shipping_name, [
                                                       'class' => 'input-text color-black',
                                                       'disabled' => ''
                                                    ]) !!}
                                                </p>
                                                <div class="clear"></div>
                                                <p class="form-row form-row form-row-wide" id="company_field">
                                                    <label for="company"
                                                           class=""> @lang('sites.order.shipping-address') </label>
                                                    {!! Form::text('shipping_address', $order->shipping_address, [
                                                        'class' => 'input-text color-black',
                                                        'disabled' => ''
                                                    ]) !!}
                                                </p>
                                                <p class="form-row form-row form-row-first validate-required validate-email"
                                                   id="email_field">
                                                    <label for="customer_email" class=""> @lang('sites.user.email')<abbr
                                                                class="required" title="required">*</abbr></label>
                                                    {!! Form::text('customer_email', $order->customer_email, [
                                                       'class' => 'input-text color-black',
                                                       'disabled' => ''
                                                    ]) !!}
                                                </p>
                                                <p class="form-row form-row form-row-last validate-required validate-phone"
                                                   id="phone_field"><label for="phone"
                                                                           class=""> @lang('sites.user.phone')
                                                        <abbr class="required" title="required">*</abbr></label>
                                                {!! Form::text('phone', $order->phone, [
                                                   'class' => 'input-text color-black',
                                                   'disabled' => ''
                                                ]) !!}

                                            </div>
                                        </div>
                                    </div>
                                    <h3 id="order_review_heading" class="animation-right-to-left"> @lang('sites.order.order') </h3>
                                    <div id="order_review" class="woocommerce-checkout-review-order animation-right-to-left">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                            <tr>
                                                <th class="product-name"> @lang('sites.carts.product') </th>
                                                <th class="product-total"> @lang('sites.carts.total') </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($productOrders as $productOrder)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $productOrder->storeProduct->product->name }}
                                                        <strong class="product-quantity">&times; {{ $productOrder->number }}</strong>
                                                        <dl class="variation">
                                                            <dt class="variation-Color"> @lang('sites.product.color'):
                                                            </dt>
                                                            <dd class="variation-Color">
                                                                <p>{{ $productOrder->storeProduct->color->name }}</p>
                                                            </dd>
                                                            <dt class="variation-Size"> @lang('sites.product.size'):
                                                            </dt>
                                                            <dd class="variation-Size">
                                                                <p>{{ $productOrder->storeProduct->size->name }}</p>
                                                            </dd>
                                                            <dt class="variation-FitType"> @lang('sites.product.type')
                                                                :
                                                            </dt>
                                                            <dd class="variation-FitType">
                                                                <p>{{ $productOrder->storeProduct->sex }}</p>
                                                            </dd>
                                                        </dl>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                            {{ number_format($productOrder->price)}}
                                                        </span>
                                                    </td>
                                                    <input type="hidden" name="cartProductIds[]" value="{{ $productOrder->id }}"/>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <td> @lang('sites.carts.subtotal') </td>
                                                    <td>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                            {{ number_format($price) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="shipping">
                                                    <td> @lang('sites.carts.shipping') </td>
                                                    <td data-title="Shipping">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">&#36;</span> 0
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <td> @lang('sites.carts.total') </td>
                                                    <td>
                                                        <strong>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                                {{ number_format($price) }}
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
