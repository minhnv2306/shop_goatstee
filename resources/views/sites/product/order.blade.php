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
                            <div class="woocommerce">
                                <div class="woocommerce-info"> @lang('sites.order.return_customer')
                                    <a href="#" class="showlogin"> @lang('sites.order.login') </a></div>
                                {!! Form::open([
                                    'name' => 'checkout',
                                    'class' => 'checkout woocommerce-checkout',
                                    'enctype' => 'multipart/form-data',
                                    'method' => 'post',
                                ])!!}
                                    <div class="col2-set" id="customer_details">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3> @lang('sites.order.billing') </h3>
                                                @include('layouts.sites.components.address_infor')
                                            </div>
                                        </div>
                                    </div>
                                    <h3 id="order_review_heading"> @lang('sites.order.order') </h3>
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                            <tr>
                                                <th class="product-name"> @lang('sites.carts.product') </th>
                                                <th class="product-total"> @lang('sites.carts.total') </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    Armed Forces Day Honor Their Sacrifice Military T-shirt&nbsp;
                                                    <strong class="product-quantity">&times; 1</strong>
                                                    <dl class="variation">
                                                        <dt class="variation-Color"> @lang('sites.product.color'):</dt>
                                                        <dd class="variation-Color"><p>Navy</p>
                                                        </dd>
                                                        <dt class="variation-Size"> @lang('sites.product.size'):</dt>
                                                        <dd class="variation-Size"><p>S</p>
                                                        </dd>
                                                        <dt class="variation-FitType"> @lang('sites.product.type'):</dt>
                                                        <dd class="variation-FitType"><p>Men</p>
                                                        </dd>
                                                    </dl>
                                                </td>
                                                <td class="product-total">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>17.95</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    Armed Forces Day Honor Their Sacrifice Military T-shirt&nbsp;
                                                    <strong class="product-quantity">&times; 1</strong>
                                                    <dl class="variation">
                                                        <dt class="variation-Color"> @lang('sites.product.color'):</dt>
                                                        <dd class="variation-Color"><p>Navy</p>
                                                        </dd>
                                                        <dt class="variation-Size"> @lang('sites.product.size'):</dt>
                                                        <dd class="variation-Size"><p>S</p>
                                                        </dd>
                                                        <dt class="variation-FitType"> @lang('sites.product.type'):</dt>
                                                        <dd class="variation-FitType"><p>Men</p>
                                                        </dd>
                                                    </dl>
                                                </td>
                                                <td class="product-total">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>17.95</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr class="cart-subtotal">
                                                <th> @lang('sites.carts.subtotal') </th>
                                                <td><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>35.90</span>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th> @lang('sites.carts.shipping') </th>
                                                <td data-title="Shipping">
                                                    Flat Rate: <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>8.90</span>
                                                    <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="flat_rate:3"
                                                           class="shipping_method"/>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th> @lang('sites.carts.total') </th>
                                                <td><strong><span class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>44.80</span></strong>
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
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
