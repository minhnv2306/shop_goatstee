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
                            <a href="{{ route('sites.home') }}"> @lang('sites.home') </a>&nbsp;&#47;&nbsp;
                            {{ $product->name }}
                        </nav>
                        <div itemscope itemtype="http://schema.org/Product" id="product-2779088" class="post-2779088 product type-product status-publish has-post-thumbnail
                            yith-wishlist entry first instock taxable shipping-taxable purchasable product-type-variable has-children">
                            <div class="images animation-left-to-right">
                                <a href="{{ $avatar[0]->link }}"
                                   itemprop="image" class="woocommerce-main-image zoom"
                                   title="Armed Forces Day Honor Their Sacrifice Military T-shirt"
                                   data-rel="prettyPhoto[product-gallery]"><!-- Featured Image From URL plugin -->
                                    <img src="{{ $avatar[0]->link }}"
                                         alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"/>
                                </a>
                                <div class="thumbnails columns-4">
                                    @foreach($images as $image)
                                        <a href="{{ $image->link }}"
                                           class='zoom' title='Armed Forces Day Honor Their Sacrifice Military T-shirt'
                                           data-rel=prettyPhoto[product-gallery]>
                                            <!-- Featured Image From URL plugin -->
                                            <img src="{{$image->link}}"
                                                 alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"/>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="summary entry-summary animation-right-to-left">
                                <h1 itemprop="name" class="product_title entry-title">
                                    {{ $product->name }}
                                </h1>
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => 'carts.store',
                                    'accept-charset' => 'UTF-8',
                                    'class' => 'variations_form cart'
                                ]) !!}
                                <table class="variations" cellspacing="0">
                                    <tbody>
                                    <tr id="fit_type_choose">
                                        <td>
                                            {!! Form::label('sex', trans('sites.product.type')) !!}
                                        </td>
                                        <td class="value">
                                            {!! Form::select('sex', $sex, 0, ['id' => 'fit-type']) !!}
                                        </td>
                                    </tr>
                                    <tr id="color_choose">
                                        <td>
                                            {!! Form::label('color', trans('sites.product.color')) !!}
                                        </td>
                                        <td class="value" id="color_product">
                                            {!! Form::select('color_id', $defaultOption, null, ['id' => 'color']) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        {!! Form::label('size', trans('sites.product.size')) !!}
                                        <td class="value">
                                            {!! Form::select('size_id', $defaultOption, null, ['id' => 'size']) !!}
                                        </td>
                                    </tr>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    </tbody>
                                </table>
                                <div class="single_variation_wrap">
                                    <div class="woocommerce-variation single_variation" style="">
                                        <div class="woocommerce-variation-description">

                                        </div>

                                        <div class="woocommerce-variation-price">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                                </span>
                                                <span id="price">
                                                {{ $product->price }}
                                                </span>
                                            </span>
                                        </div>

                                        <div class="woocommerce-variation-availability">

                                        </div>
                                    </div>
                                    <div class="woocommerce-variation single_variation"></div>
                                    <div class="woocommerce-variation-add-to-cart variations_button">
                                        <div class="quantity">
                                            {!! Form::number('number', 1, [
                                                'class' => 'input-text qty text number_product',
                                                'min' => 1,
                                            ]) !!}
                                        </div>
                                        <button class="single_add_to_cart_button button alt" id="add_cart">
                                            @lang('sites.product.add_to_cart')
                                        </button>
                                    </div>
                                    <div>
                                        <p> (@lang('sites.product.number_store') <span id="total_number"></span>)</p>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                <div class="clear"></div>
                                <div class="product_meta">
                                    <span class="sku_wrapper">SKU: <span class="sku" itemprop="sku">N/A</span></span>
                                </div>
                            </div><!-- .summary -->
                            <div class="woocommerce-tabs wc-tabs-wrapper display-none" id="description">
                                <ul class="tabs wc-tabs">
                                    <li class="description_tab">
                                        <a href="#tab-description"> @lang('sites.product.description') </a>
                                    </li>
                                    <li class="additional_information_tab">
                                        <a href="#tab-additional_information"> @lang('sites.product.infor') </a>
                                    </li>
                                    <li class="reviews_tab">
                                        <a href="#tab-reviews"> @lang('sites.product.review') ({{count( $reviews )}})</a>
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
                                            <LI>
                                                <SPAN class=a-list-item>{{ $product->made_in }} </SPAN>
                                            </LI>
                                            @if(!empty($product->washing))
                                                <LI>
                                                    <SPAN class=a-list-item>{{ $product->washing }}</SPAN>
                                                </LI>
                                            @endif
                                            @if(!empty($product->note_1))
                                                <LI>
                                                    <SPAN class=a-list-item>{{ $product->note_1 }}</SPAN>
                                                </LI>
                                            @endif
                                            @if(!empty($product->note_2))
                                                <LI>
                                                    <SPAN class=a-list-item>{{ $product->note_2 }}</SPAN>
                                                </LI>
                                            @endif
                                            @if(!empty($product->note_3))
                                                <LI>
                                                    <SPAN class=a-list-item>{{ $product->note_3 }}</SPAN>
                                                </LI>
                                            @endif
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
                                                <p>
                                                    @foreach($colors as $color)
                                                        {{$color->name . ', '}}
                                                    @endforeach
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="alt">
                                            <th> @lang('sites.product.size') </th>
                                            <td>
                                                <p>
                                                    @foreach($sizes as $sizes)
                                                        {{$sizes->name . ', '}}
                                                    @endforeach
                                                </p>
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
                                            <h2 class="woocommerce-Reviews-title"> @lang('sites.product.review')
                                                {{ (count($reviews) == 0) ? '' : ( '(' . number_format($reviews->avg('rating'), 1) . ' stars)')}} </h2>
                                            @if (count($reviews) == 0)
                                                <ol class="commentlist" id="commentlist">
                                                    <p class="woocommerce-noreviews"> @lang('sites.product.no_review') </p>
                                                </ol>
                                            @else
                                                <ol class="commentlist" id="commentlist">
                                                    @foreach($reviews as $review)
                                                        <li itemprop="review" itemscope="" itemtype="http://schema.org/Review"
                                                            class="comment even thread-even depth-1" id="li-comment-8715">
                                                            <div id="comment-8715" class="comment_container">
                                                                <img alt="" src="https://secure.gravatar.com/avatar/5afcf36b24f4536dd428d27167c129ff?s=60&amp;d=mm&amp;r=g"
                                                                     srcset="https://secure.gravatar.com/avatar/5afcf36b24f4536dd428d27167c129ff?s=120&amp;d=mm&amp;r=g 2x"
                                                                     class="avatar avatar-60 photo" height="60" width="60" itemprop="image">
                                                                <div class="comment-text">
                                                                    <div>
                                                                        <span>
                                                                            @for ($i = 0; $i < $review->rating; $i++)
                                                                                <i class="fa fa-star"></i>
                                                                            @endfor
                                                                        </span>
                                                                        <span class="pull-right"> {{ $review->created_at->diffForHumans() }} </span>
                                                                    </div>
                                                                    <p class="meta">{{ $review->author }}</p>
                                                                    <div itemprop="description" class="description">
                                                                        <p>{{ $review->comment }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li><!-- #comment-## -->
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </div>
                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <h3 id="reply-title" class="comment-reply-title">
                                                        @lang('sites.product.add_review') &ldquo;{{ $product->name }}&rdquo;
                                                    </h3>

                                                    {!! Form::open([
                                                        'method' => 'POST',
                                                        'id' => 'commentform',
                                                        'class' => 'comment-form',
                                                        'route' => 'review-product.store',
                                                    ]) !!}
                                                    <p class="comment-notes">
                                                        <span id="email-notes"> @lang('sites.product.note') </span>
                                                        @lang('sites.product.note_2') <span class="required">*</span>
                                                    </p>
                                                    <p class="comment-form-rating">
                                                        {!! Form::label('rating', trans('sites.product.rate')) !!}
                                                        {!! Form::select('rating', $rates, null, ['id' => 'rating']) !!}
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">
                                                            @lang('sites.product.your_review') <span
                                                                    class="required">*</span>
                                                        </label>
                                                        {!! Form::textarea('comment', null, ['size' => '45x8', 'id' => 'comment', 'required' => '']) !!}
                                                    </p>
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    @guest
                                                        <p class="comment-form-author">
                                                            <label for="author"> @lang('sites.user.name')
                                                                <span class="required">*</span>
                                                            </label>
                                                            {!! Form::text('author', null, ['size' => '30', 'required' => '', 'id' => 'author']) !!}
                                                        </p>
                                                        <p class="comment-form-email">
                                                            <label for="email"> @lang('sites.user.email')
                                                                <span class="required">*</span></label>
                                                        {!! Form::email('email', null, ['size' => '30', 'required' => '', 'id' => 'email']) !!}
                                                    @endguest
                                                    <p class="form-submit">
                                                        <button id="submit" class="submit"> @lang('sites.submit')</button>
                                                    </p>
                                                    {!! Form::close() !!}
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
<script>
    $(document).ready(function () {
        // Animation
        $(window).scroll(function () {
            if ($(this).scrollTop() > 400) {
                $('#description').removeClass('display-none');
                $('#description').addClass('animation-bottom ');
            }
        });

        // Load ajax when user change type field
        $('#fit-type').change(function () {
            var sex = $('#fit-type').val();
            var productId = {!! $product->id !!}
            $.ajax({
                url: '{{ route('ajax.get-color-product') }}',
                data: {
                    sex: sex,
                    productId: productId
                },
                type: 'POST',
                success: function (data) {
                    $('#color').html(data);
                }
            })
        });

        // Load ajax when user change color field
        $('#color').change(function () {
            var sex = $('#fit-type').val();
            var productId = {!! $product->id !!};
            var color_id = $('#color').val();
            $.ajax({
                url: '{{ route('ajax.get-size-product') }}',
                data: {
                    sex: sex,
                    productId: productId,
                    color_id: color_id
                },
                type: 'POST',
                success: function (data) {
                    $('#size').html(data);
                }
            })
        });

        $('#size').change(function () {
            var sex = $('#fit-type').val();
            var productId = {!! $product->id !!};
            var size_id = $('#size').val();
            var color_id = $('#color').val();
            $.ajax({
                url: '{{ route('ajax.get-number-product') }}',
                data: {
                    sex: sex,
                    productId: productId,
                    colorId: color_id,
                    sizeId: size_id
                },
                type: 'POST',
                success: function (data) {
                    $('#total_number').html(data);
                    $('.qty').attr('max', data);
                }
            })
        })
        // Computer price when user change number of product
        $('.number_product').change(function () {
            $('#price').html($(this).val() * {!! $product->price !!});
        });

        // Validate data from client form
        $('#add_cart').click(function (event) {
            var sex = $('#fit-type').val();
            var color = $('#color').val();
            var size = $('#size').val();

            if (sex == 0) {
                alert('{{ trans('sites.product.type_choose') }}');
                event.preventDefault();
            }
            if (color == 0) {
                alert('{{ trans('sites.product.color_choose') }}');
                event.preventDefault();
            }
            if (size == 0) {
                alert('{{ trans('sites.product.size_choose') }}');
                event.preventDefault();
            }
        })
    })
</script>

<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
            var rating = $('#rating').val();
            var comment = $('#comment').val();
            var auth, email;
            if ($('#auth').val() == undefined) {
                auth = '';
            } else {
                auth = $('#auth').val();
            }

            if ($('#email').val() == undefined) {
                email = '';
            } else {
                email = $('#email').val();
            }

            if (rating == 0 || comment == '') {
                alert('{{trans('admin.review.validate')}}');
            } else {
                $.ajax({
                    url: '{{route('review-product.store')}}',
                    type: 'POST',
                    data: {
                        rating: rating,
                        comment: comment,
                        auth: auth,
                        email: email,
                        product_id: {{ $product->id }},
                    },
                    success: function (data) {
                        $('#comment').val('');
                        $('#commentlist').append(data);
                    }
                })
            }
        })
    })
</script>
</body>
</html>
