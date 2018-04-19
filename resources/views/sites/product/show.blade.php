<!DOCTYPE html>
<html class="no-js" lang="en-US" prefix="og: http://ogp.me/ns#">
@include('layouts.sites.components.header')
<body class="single single-product postid-2779088 woocommerce woocommerce-page boxed header-style-four footer-style-one layout-2c-l"
      itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="hfeed site">
    <div class="wide-container">
        @include('layouts.sites.components.nav')
        @include('layouts.sites.components.header_body')

        <div id="content" class="site-content">
            <div class="container">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                            <a href="http://goatstee.herokuapp.com"> @lang('sites.home') </a>&nbsp;&#47;&nbsp;Cancer Sucks Top Hat
                            Skeleton T-Shirt
                        </nav>
                        <div itemscope itemtype="http://schema.org/Product" id="product-2779088" class="post-2779088 product type-product status-publish has-post-thumbnail
                            yith-wishlist entry first instock taxable shipping-taxable purchasable product-type-variable has-children">
                            <div class="images">
                                <a href="https://images-na.ssl-images-amazon.com/images/I/81FLbbhIhpL._UL1500_.jpg"
                                   itemprop="image" class="woocommerce-main-image zoom"
                                   title="Armed Forces Day Honor Their Sacrifice Military T-shirt"
                                   data-rel="prettyPhoto[product-gallery]"><!-- Featured Image From URL plugin -->
                                    <img src="https://images-na.ssl-images-amazon.com/images/I/81FLbbhIhpL._UL1500_.jpg"
                                         alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"/>
                                </a>
                                <div class="thumbnails columns-4">
                                    <a href='https://images-na.ssl-images-amazon.com/images/I/81bdUSkCmDL._UL1500_.jpg'
                                       class='zoom' title='Armed Forces Day Honor Their Sacrifice Military T-shirt'
                                       data-rel=prettyPhoto[product-gallery]>
                                        <!-- Featured Image From URL plugin -->
                                        <img src="https://images-na.ssl-images-amazon.com/images/I/81bdUSkCmDL._UL1500_.jpg"
                                             alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"/>
                                    </a>
                                    <a href='https://images-na.ssl-images-amazon.com/images/I/71vxtDcvANL._UL1500_.jpg'
                                       class='zoom' title='Armed Forces Day Honor Their Sacrifice Military T-shirt'
                                       data-rel=prettyPhoto[product-gallery]>
                                        <!-- Featured Image From URL plugin -->
                                        <img src="https://images-na.ssl-images-amazon.com/images/I/71vxtDcvANL._UL1500_.jpg"
                                             alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"></img></a>
                                    <a href='https://images-na.ssl-images-amazon.com/images/I/81FLbbhIhpL._UL1500_.jpg'
                                       class='zoom' title='Armed Forces Day Honor Their Sacrifice Military T-shirt'
                                       data-rel=prettyPhoto[product-gallery]>
                                        <!-- Featured Image From URL plugin -->
                                        <img src="https://images-na.ssl-images-amazon.com/images/I/81FLbbhIhpL._UL1500_.jpg"
                                             alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"></img>
                                    </a>
                                    <a href='https://images-na.ssl-images-amazon.com/images/I/71TD9vPWTAL._UL1500_.jpg'
                                       class='zoom' title='Armed Forces Day Honor Their Sacrifice Military T-shirt'
                                       data-rel=prettyPhoto[product-gallery]>
                                        <!-- Featured Image From URL plugin -->
                                        <img src="https://images-na.ssl-images-amazon.com/images/I/71TD9vPWTAL._UL1500_.jpg"
                                             alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"></img>
                                    </a>
                                </div>
                            </div>
                            <div class="summary entry-summary">
                                <h1 itemprop="name" class="product_title entry-title">
                                    Cancer Sucks Top Hat Skeleton T-Shirt
                                </h1>
                                {!! Form::open([
                                    'method' => 'POST',
                                    'accept-charset' => 'UTF-8',
                                    'class' => 'variations_form cart'
                                ]) !!}
                                    <table class="variations" cellspacing="0">
                                        <tbody>
                                        <tr id="fit_type_choose">
                                            <td class="label"><label for="fit-type"> @lang('sites.product.type') </label></td>
                                            <td class="value">
                                                <select id="fit-type" class="" name="fit_type"
                                                        data-attribute_name="fit_type"
                                                        data-show_option_none="yes" style="min-width: 200px">
                                                    <option value="men" selected='selected'>Men</option>
                                                    <option value="women">Women</option>
                                                </select>
                                            </td>
                                            <input type="hidden" value="895" id="product_id"/>
                                            <input type="hidden" value="21.99" id="price"/>
                                        </tr>
                                        <tr id="color_choose">
                                            <td class="label"><label for="color"> @lang('sites.product.color') </label></td>
                                            <td class="value" id="color_product">
                                                <select id="color" class="" name="attribute_color"
                                                        data-attribute_name="attribute_color"
                                                        data-show_option_none="yes" style="min-width: 200px">
                                                    <option value="Slate">Slate</option>
                                                    <option value="Silver">Silver</option>
                                                    <option value="White">White</option>
                                                    <option value="Black">Black</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><label for="size"> @lang('sites.product.size') </label></td>
                                            <td class="value">
                                                <select id="size" class="" name="attribute_size"
                                                        data-attribute_name="attribute_size"
                                                        data-show_option_none="yes" style="min-width: 200px">
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="2XL">2XL</option>
                                                    <option value="3XL">3XL</option>
                                                    <option value="4XL">4XL</option>
                                                    <option value="5XL">5XL</option>
                                                    <option value="YXS">YXS</option>
                                                    <option value="YS">YS</option>
                                                    <option value="YM">YM</option>
                                                    <option value="YL">YL</option>
                                                    <option value="YXL">YXL</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label">
                                                <p class="price total_price">
                                                <span class="woocommerce-Price-amount amount" id="total_number">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                    21.99
                                                </span>
                                                </p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="single_variation_wrap">
                                        <div class="woocommerce-variation single_variation"></div>
                                        <div class="woocommerce-variation-add-to-cart variations_button">
                                            <div class="quantity">
                                                <input type="number" step="1" min="1" max="" name="quantity" value="1"
                                                       title="Qty" class="input-text qty text number_product" size="4"
                                                       pattern="[0-9]*" inputmode="numeric"/>
                                            </div>
                                            <input type="hidden" name="hash_cart" value="" id="hash_cart">
                                            <input type="hidden" id="price_cart" value="21.99" name="price_cart">
                                            <input type="hidden" name="product_id" value="895">
                                            <button type="submit" class="single_add_to_cart_button button alt" id="add_cart">
                                                @lang('sites.product.add_to_cart')
                                            </button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                                <div class="clear"></div>
                                <div class="product_meta">
                                    <span class="sku_wrapper">SKU: <span class="sku" itemprop="sku">N/A</span></span>
                                </div>
                            </div><!-- .summary -->
                            <div class="woocommerce-tabs wc-tabs-wrapper">
                                <ul class="tabs wc-tabs">
                                    <li class="description_tab">
                                        <a href="#tab-description"> @lang('sites.product.description') </a>
                                    </li>
                                    <li class="additional_information_tab">
                                        <a href="#tab-additional_information"> @lang('sites.product.infor') </a>
                                    </li>
                                    <li class="reviews_tab">
                                        <a href="#tab-reviews"> @lang('sites.product.review') (0)</a>
                                    </li>
                                </ul>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                                     id="tab-description">
                                    <h2> @lang('sites.product.product_des') </h2>
                                    <div align="left"><a aglin href="http://goatstee.herokuapp.com/size-char"><br/>
                                            <h2> @lang('sites.product.size')
                                                <img src="https://betaimages.sunfrogshirts.com/assets/images/view-chart.jpg">
                                            </h2>
                                            <p></a>
                                    </div>
                                    <div>
                                        <UL class="a-unordered-list a-vertical a-spacing-none">
                                            <LI><SPAN class=a-list-item>100% Cotton </SPAN>
                                            <LI><SPAN class=a-list-item>Imported </SPAN>
                                            <LI>
                                                <SPAN class=a-list-item>Machine wash cold with like colors, dry low heat </SPAN>
                                            <LI><SPAN class=a-list-item>Tired of the politically correct tee shirts - support cancer? Well then this shirt's for you </SPAN>
                                            <LI><SPAN class=a-list-item>Cancer takes all our energy, time and money - tell it like it is - cancer sucks! </SPAN>
                                            <LI><SPAN class=a-list-item>Lightweight, Classic fit, Double-needle sleeve and bottom hem </SPAN>
                                            </LI>
                                        </UL><!--  Loading EDP related metadata -->
                                    </div>
                                </div>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab"
                                     id="tab-additional_information">
                                    <h2> @lang('sites.product.infor') </h2>
                                    <table class="shop_attributes">
                                        <tr class="">
                                            <th> @lang('sites.product.color') </th>
                                            <td>
                                                <p>Slate, Silver, White, Black</p>
                                            </td>
                                        </tr>
                                        <tr class="alt">
                                            <th> @lang('sites.product.size') </th>
                                            <td>
                                                <p>S, M </p>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <th> @lang('sites.product.type') </th>
                                            <td><p>Men, Women</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab"
                                     id="tab-reviews">
                                    <div id="reviews" class="woocommerce-Reviews">
                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title"> @lang('sites.product.review') </h2>
                                            <ol class="commentlist">
                                                <p class="woocommerce-noreviews"> @lang('sites.product.no_review') </p>
                                            </ol>
                                        </div>
                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <h3 id="reply-title" class="comment-reply-title">Add your
                                                        review for &ldquo;Cancer Sucks Top Hat Skeleton T-Shirt&rdquo;
                                                    </h3>
                                                    <form method="POST" action="http://goatstee.herokuapp.com/reviews/store"
                                                          accept-charset="UTF-8" id="commentform" class="comment-form">
                                                        <p class="comment-notes"><span id="email-notes"> @lang('sites.product.note') </span>
                                                            @lang('sites.product.note_2') <span class="required">*</span>
                                                        </p>
                                                        <p class="comment-form-rating">
                                                            <label for="rating"> @lang('sites.product.rate') </label>
                                                            <select name="rating" id="rating" aria-required="true" required>
                                                                <option value="">Rate&hellip;</option>
                                                                <option value="5">Perfect</option>
                                                                <option value="4">Good</option>
                                                                <option value="3">Average</option>
                                                                <option value="2">Not that bad</option>
                                                                <option value="1">Very Poor</option>
                                                            </select>
                                                        </p>
                                                        <p class="comment-form-comment">
                                                            <label for="comment"> @lang('sites.product.your_review') <span class="required">*</span></label>
                                                            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea>
                                                        </p>
                                                        <p class="comment-form-author">
                                                            <label for="author"> @lang('sites.user.name')
                                                                <span class="required">*</span>
                                                            </label>
                                                            <input id="author" name="author" type="text" value="" size="30" aria-required="true" required/>
                                                        </p>
                                                        <p class="comment-form-email">
                                                            <label for="email"> @lang('sites.user.email') <span class="required">*</span></label>
                                                            <input id="email" name="email" type="email" value="" size="30" aria-required="true" required/></p>
                                                        <p class="form-submit">
                                                            <button id="submit" class="submit"> @lang('sites.submit')</button>
                                                        </p>
                                                        <input type="hidden" value="895" name="product_id">
                                                    </form>
                                                </div><!-- #respond -->
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <meta itemprop="url" content="https://goatstee.com/product/armed-forces-day-honor-their-sacrifice-military-t-shirt/"/>
                        </div><!-- #product-2779088 -->
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div><!-- .container -->
        </div><!-- #content -->
        @include('layouts.sites.components.footer')
    </div><!-- .wide-cotainer -->
</div><!-- #page -->

@include('layouts.sites.components.script')
<script type='text/javascript'>
    /* <![CDATA[ */
    var wc_single_product_params = {
        "i18n_required_rating_text": "Please select a rating",
        "review_rating_required": "yes"
    };
    /* ]]> */
</script>
<script type='text/javascript' src="{{ asset('js/goatstee/product/single-product.min.js?ver=2.6.7') }}"></script>
<script type='text/javascript' src="{{ asset('js/goatstee/jquery.prettyPhoto.min.js?ver=3.1.5') }}"></script>
<script type='text/javascript' src="{{ asset('js/goatstee/jquery.prettyPhoto.init.min.js?ver=2.6.7') }}"></script>
</body>
</html>
