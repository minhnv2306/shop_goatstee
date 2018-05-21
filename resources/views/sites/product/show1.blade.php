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
                <div id="primary">
                    <main id="main" class="site-main" role="main">
                        <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                            <a href="{{ route('sites.home') }}"> @lang('sites.home') </a>&nbsp;&#47;&nbsp;
                            {{ $product->name }}
                        </nav>
                        <div itemscope itemtype="http://schema.org/Product" id="product-2779088" class="post-2779088 product type-product status-publish has-post-thumbnail
                            yith-wishlist entry first instock taxable shipping-taxable purchasable product-type-variable has-children">
                            <div class="row">
                                <div class="col col-sm-4 animation-left-to-right">
                                    <div class="images" style="width: 100%">
                                        <a href="{{ $avatar[0]->link }}"
                                           itemprop="image" class="woocommerce-main-image zoom"
                                           title="Armed Forces Day Honor Their Sacrifice Military T-shirt"
                                           data-rel="prettyPhoto[product-gallery]">
                                            <!-- Featured Image From URL plugin -->
                                            <img src="{{ $avatar[0]->link }}"
                                                 alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"/>
                                        </a>
                                        <div class="thumbnails columns-4">
                                            @foreach($images as $image)
                                                <a href="{{ $image->link }}"
                                                   class='zoom'
                                                   title='Armed Forces Day Honor Their Sacrifice Military T-shirt'
                                                   data-rel=prettyPhoto[product-gallery]>
                                                    <!-- Featured Image From URL plugin -->
                                                    <img src="{{$image->link}}"
                                                         alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"/>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-8 animation-right-to-left">
                                    <h2> {{ $product->name }} </h2>
                                    <h1 style="color: red"> $ {{ number_format($product->price) }} </h1>
                                    <div id="description" style="border: 0; padding-top: 0px">
                                        <div>
                                            <h4> @lang('sites.product.product_des') </h4>
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
                                        <div>
                                            <h4> @lang('sites.product.infor') </h4>
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
                                        <!-- Trigger the modal with a button -->
                                        <button class="btn btn-primary btn-lg" id="add-to-cart"> Add to cart </button>
                                        <!-- Modal -->
                                        {!! Form::open([
                                            'method' => 'POST',
                                            'route' => 'carts.store',
                                            'accept-charset' => 'UTF-8',
                                            'class' => 'variations_form cart',
                                            'style' => 'border: none'
                                        ]) !!}
                                        <div id="my-cart" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title"> Modal content </h4>
                                                    </div>
                                                    <div class="modal-body" id="modal-content">
                                                        <modal-choose-product
                                                            originprice="{!! $product->price !!}"
                                                            sumprice="{!! $product->price !!}"
                                                            id="{!! $product->id !!}"
                                                            labelType="{!! trans('sites.product.type') !!}"
                                                            labelColor="{!! trans('sites.product.color') !!}"
                                                            labelSize="{!! trans('sites.product.size') !!}"
                                                            labelNumber="{!! trans('sites.product.number_store') !!}"
                                                        >
                                                        </modal-choose-product>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="{{ $product->id }}" name="product_id"/>
                                                        <button class="btn btn-primary" id="add_cart">
                                                            @lang('sites.product.add_to_cart')
                                                        </button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-8 display-none" id="tab-reviews">
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
                                                        <li id="li-comment-8715" class="border-none">
                                                            <div id="comment-8715">
                                                                <img alt="" src="{{ asset('img/avatar-comment.png') }}" class="avatar avatar-60 photo" itemprop="image">
                                                                <div class="comment-text">
                                                                    <div>
                                                                        <span>
                                                                            @for ($i = 0; $i < $review->rating; $i++)
                                                                                <i class="fa fa-star"></i>
                                                                            @endfor
                                                                        </span>
                                                                        <span class="pull-right padding-right-20"> {{ $review->created_at->diffForHumans() }} </span>
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
                                <div class="col col-sm-4 display-none" id="suggest-product">
                                    <h2 class="text-right"> @lang('sites.suggest_product') </h2>
                                    @foreach($suggestProducts as $suggestProduct)
                                        <div class="row">
                                            <div class="col col-sm-9 col-sm-offset-3 padding-bottom-40">
                                                <a href="{{ route('product.show', ['product' => $suggestProduct->id]) }}" class="woocommerce-LoopProduct-link">
                                                    <!-- Featured Image From URL plugin -->
                                                    <img src="{{ $suggestProduct->avatar[0]->link}}">
                                                    <h3 class="title-name-product">
                                                        {{ $suggestProduct->name }}
                                                    </h3>
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount font-bold">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>
                                                            {{ $suggestProduct->price }}
                                                        </span>
                                                    </span>
                                                    <br>
                                                    <i class="fa fa-shopping-cart padding-right-20" aria-hidden="true"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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
                $('#tab-reviews').removeClass('display-none');
                $('#tab-reviews').addClass('animation-bottom ');
                $('#suggest-product').removeClass('display-none');
                $('#suggest-product').addClass('animation-right-to-left');
            }
        });

        // Validate data from client form
        $('#add_cart').on('click', function (event) {
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
        $('#submit').on('click', function (e) {
            e.preventDefault();
            var rating = $('#rating').val();
            var comment = $('#comment').val();
            var auth, email;
            if ($('#author').val() == undefined) {
                auth = '';
            } else {
                auth = $('#author').val();
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
                        author: auth,
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
<script>
    $(document).ready(function(){
        $("#add-to-cart").on('click', function () {
            $('#my-cart').modal();
        })
    });
</script>
{{ Html::script('js/product/show.js') }}
</body>
</html>
