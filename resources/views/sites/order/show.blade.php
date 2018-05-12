@extends('layouts.sites.master')
@section('title', trans('sites.checkout'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-12" class="post-12 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline">@lang('sites.carts.checkout')</h1>
                        <div class="entry-content" itemprop="text">
                            @if(count($cartProducts) == 0)
                                <div class="woocommerce">
                                    <p class="cart-empty"> @lang('sites.carts.empty_cart') </p>
                                </div>
                            @else
                                <div class="woocommerce">
                                    @guest
                                        <div class="woocommerce-info"> @lang('sites.order.return_customer')
                                            <a href="{{ route('sites.my-account') }}" class="showlogin"> @lang('sites.order.login') </a>
                                        </div>
                                    @endguest
                                    {!! Form::open([
                                        'name' => 'checkout',
                                        'class' => 'checkout woocommerce-checkout',
                                        'enctype' => 'multipart/form-data',
                                        'method' => 'POST',
                                        'route' => 'sites.order.store'
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
                                                        {!! Form::text('customer_name', !empty($user) ? $user->first_name . ' ' . $user->last_name : '', [
                                                           'class' => 'input-text',
                                                           'id' => 'address',
                                                           'autocomplete' => 'address-line1',
                                                           'placeholder' => 'Street address',
                                                           'required' => '',
                                                        ]) !!}
                                                    </p>
                                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                                       id="address_field">
                                                        <label for="address" class=""> @lang('sites.order.billing-name')
                                                            <abbr class="required" title="required">*</abbr>
                                                        </label>
                                                        {!! Form::text('billing_name', !empty($user) ? $user->first_name . ' ' . $user->last_name : '', [
                                                           'class' => 'input-text',
                                                           'id' => 'address',
                                                           'autocomplete' => 'address-line1',
                                                           'placeholder' => 'Street address',
                                                           'required' => '',
                                                        ]) !!}
                                                    </p>
                                                    <div class="clear"></div>
                                                    <p class="form-row form-row form-row-wide" id="company_field">
                                                        <label for="company" class=""> @lang('sites.order.billing-address') </label>
                                                        {!! Form::text('billing_address', !empty($user) ? $user->address : '', [
                                                            'class' => 'input-text',
                                                            'id' => 'company',
                                                            'autocomplete' => 'organization',
                                                            'required' => '',
                                                        ]) !!}
                                                    </p>
                                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                                       id="address_field">
                                                        <label for="address" class=""> @lang('sites.order.shipping-name') <abbr class="required" title="required">*</abbr></label>
                                                        {!! Form::text('shipping_name', !empty($user) ? $user->first_name . ' ' . $user->last_name : '', [
                                                           'class' => 'input-text',
                                                           'id' => 'address',
                                                           'autocomplete' => 'address-line1',
                                                           'placeholder' => 'Street address',
                                                           'required' => '',
                                                        ]) !!}
                                                    </p>
                                                    <div class="clear"></div>
                                                    <p class="form-row form-row form-row-wide" id="company_field">
                                                        <label for="company" class=""> @lang('sites.order.shipping-address') </label>
                                                        {!! Form::text('shipping_address', !empty($user) ? $user->address : '', [
                                                            'class' => 'input-text',
                                                            'id' => 'company',
                                                            'autocomplete' => 'organization',
                                                            'required' => '',
                                                        ]) !!}
                                                    </p>
                                                    <p class="form-row form-row form-row-first validate-required validate-email"
                                                       id="email_field">
                                                        <label for="customer_email" class=""> @lang('sites.user.email') <abbr class="required" title="required">*</abbr></label>
                                                        {!! Form::text('customer_email', !empty($user) ? $user->email : '', [
                                                           'class' => 'input-text',
                                                           'id' => 'email',
                                                           'autocomplete' => 'email',
                                                           'required' => '',
                                                        ]) !!}
                                                    </p>
                                                    <p class="form-row form-row form-row-last validate-required validate-phone"
                                                       id="phone_field"><label for="phone" class=""> @lang('sites.user.phone')
                                                            <abbr class="required" title="required">*</abbr></label>
                                                    {!! Form::text('phone', !empty($user) ? $user->phone : '', [
                                                       'class' => 'input-text',
                                                       'id' => 'phone',
                                                       'autocomplete' => 'tel',
                                                       'required' => '',
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
                                                    @foreach($cartProducts as $cartProduct)
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                {{ $cartProduct->storeProduct->product->name }}
                                                                <strong class="product-quantity">&times; {{$cartProduct->number}}</strong>
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
                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                                    {{ number_format($cartProduct->price)}}
                                                                </span>
                                                            </td>
                                                            <input type="hidden" name="cartProductIds[]" value="{{ $cartProduct->id }}"/>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th> @lang('sites.carts.subtotal') </th>
                                                    <td>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                            {{ number_format($price)}}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th> @lang('sites.carts.shipping') </th>
                                                    <td data-title="Shipping">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">&#36;</span> 0
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th> @lang('sites.carts.total') </th>
                                                    <td><strong>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                                {{ number_format($price)}}
                                                                <input type="hidden" name="price" value="{{$price}}">
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <div id="payment" class="woocommerce-checkout-payment">
                                                <ul class="wc_payment_methods payment_methods methods">
                                                    <li class="wc_payment_method payment_method_paypal">
                                                        {!! Form::radio('payment_method', 'paypal', true, [
                                                            'id' => 'payment_method_paypal',
                                                            'class' => 'input-radio',
                                                            'data-order_button_text' => 'Proceed to PayPal'
                                                        ]) !!}
                                                        <label for="payment_method_paypal">
                                                            PayPal
                                                            <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" alt="PayPal Acceptance Mark"/>
                                                            <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup" class="about_paypal"
                                                                    title="{{ trans('sites.paypal.what') }}"> @lang('sites.paypal.what') </a>
                                                        </label>
                                                        <div class="payment_box payment_method_paypal">
                                                            <p> @lang('sites.paypal.intro') </p>
                                                        </div>
                                                    </li>
                                                    <li class="wc_payment_method payment_method_stripe">
                                                        {!! Form::radio('payment_method', 'stripe', false, [
                                                            'id' => 'payment_method_paypal',
                                                            'class' => 'input-radio',
                                                            'data-order_button_text' => ''
                                                        ]) !!}

                                                        <label for="payment_method_stripe">
                                                            Credit Card (Stripe)
                                                            <img src="https://goatstee.com/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/visa.svg"
                                                                 alt="Visa" width="32" style="margin-left: 0.3em"/>
                                                            <img src="https://goatstee.com/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/mastercard.svg"
                                                                 alt="Mastercard" width="32" style="margin-left: 0.3em"/>
                                                            <img src="https://goatstee.com/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/amex.svg"
                                                                 alt="Amex" width="32" style="margin-left: 0.3em"/>
                                                            <img src="https://goatstee.com/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/discover.svg"
                                                                 alt="Discover" width="32" style="margin-left: 0.3em"/>
                                                            <img src="https://goatstee.com/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/jcb.svg"
                                                                 alt="JCB" width="32" style="margin-left: 0.3em"/>
                                                            <img src="https://goatstee.com/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/diners.svg"
                                                                 alt="Diners" width="32" style="margin-left: 0.3em"/>
                                                        </label>
                                                        <div class="payment_box payment_method_stripe"
                                                             style="display:none;">
                                                            <div id="stripe-payment-data" data-panel-label="" data-description="" data-email="" data-amount="4480"
                                                                 data-name="Goatstee" data-currency="usd" data-image="" data-bitcoin="false" data-locale="en"
                                                                    data-allow-remember-me="false">
                                                                <p> @lang('sites.paypal.method') </p>
                                                                <fieldset id="wc-stripe-cc-form"
                                                                          class='wc-credit-card-form wc-payment-form'>
                                                                    <p class="form-row form-row-wide">
                                                                        <label for="stripe-card-number">Card Number <span
                                                                                    class="required">*</span></label>
                                                                        <input id="stripe-card-number" class="input-text wc-credit-card-form-card-number"
                                                                               inputmode="numeric" autocomplete="cc-number" autocorrect="no" autocapitalize="no"
                                                                               spellcheck="no" type="tel" placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;"/>
                                                                    </p>
                                                                    <p class="form-row form-row-first">
                                                                        <label for="stripe-card-expiry">Expiry (MM/YY) <span
                                                                                    class="required">*</span></label>
                                                                        <input id="stripe-card-expiry"
                                                                               class="input-text wc-credit-card-form-card-expiry"
                                                                               inputmode="numeric" autocomplete="cc-exp" autocorrect="no" autocapitalize="no"
                                                                               spellcheck="no" type="tel" placeholder="MM / YY"/>
                                                                    </p>
                                                                    <p class="form-row form-row-last">
                                                                        <label for="stripe-card-cvc">Card Code <span
                                                                                    class="required">*</span></label>
                                                                        <input id="stripe-card-cvc"
                                                                               class="input-text wc-credit-card-form-card-cvc" inputmode="numeric" autocomplete="off"
                                                                               autocorrect="no" autocapitalize="no" spellcheck="no" type="tel" maxlength="4"
                                                                               placeholder="CVC" style="width:100px"/>
                                                                    </p>
                                                                    <div class="clear"></div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="form-row place-order">
                                                    <noscript>
                                                        Since your browser does not support JavaScript, or it is disabled,
                                                        please ensure you click the <em>Update Totals</em> button before
                                                        placing your order. You may be charged more than the amount stated
                                                        above if you fail to do so. <br/>
                                                        <input type="submit" class="button alt" name="woocommerce_checkout_update_totals"
                                                               value="Update totals"/>
                                                    </noscript>
                                                    <p class="form-row terms wc-terms-and-conditions">
                                                        {!! Form::checkbox('terms', '', false) !!}
                                                        <label for="terms" class="checkbox"> @lang('sites.paypal.accept_rule')
                                                            <a href="https://goatstee.com/terms-of-service/"
                                                               target="_blank">terms &amp; conditions</a> <span
                                                                    class="required">*</span></label>
                                                        <input type="hidden" name="terms-field" value="1"/>
                                                    </p>
                                                    {!! Form::submit( trans('sites.order.place'), [
                                                        'class' => 'button alt',
                                                        'id' => 'place_order'
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            @endif
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
