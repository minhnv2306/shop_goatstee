@extends('layouts.sites.master')
@section('title', trans('sites.home'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <aside id="shopy-products-21" class="widget widget-shopy-products animation">
                        <h3 class="widget-title">
                            <span> @lang('sites.best_selling') </span>
                        </h3>
                        <div class="row row1 padding-bottom-40 animation-right-to-left">
                            @for ($i = 0; $i < 4; $i++)
                                @if (!empty($bestSellingProducts[$i]))
                                    <div class="col col-sm-3">
                                        <a href="{{ route('product.show', ['product' => $bestSellingProducts[$i]->product->id]) }}"
                                           class="woocommerce-LoopProduct-link">
                                            <!-- Featured Image From URL plugin -->
                                            <img src="{{ !empty($bestSellingProducts[$i]->avatar[0]) ?  $bestSellingProducts[$i]->avatar[0]->link : ''}}"
                                                 alt="I Am A Taurus Woman Funny T Shirt"></img>
                                            <h3 class="title-name-product">
                                                {{ $bestSellingProducts[$i]->product->name }}
                                            </h3>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount font-bold">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                        {{ $bestSellingProducts[$i]->product->price }}
                                                </span>
                                            </span>
                                            <br/>
                                            <i class="fa fa-shopping-cart padding-right-20" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                @endif
                            @endfor
                        </div>
                        <div class="row row2 padding-bottom-40 display-none">
                            @for ($i = 4; $i < 8; $i++)
                                @if (!empty($bestSellingProducts[$i]))
                                    <div class="col col-sm-3">
                                        <a href="{{ route('product.show', ['product' => $bestSellingProducts[$i]->product->id]) }}"
                                           class="woocommerce-LoopProduct-link">
                                            <!-- Featured Image From URL plugin -->
                                            <img src="{{ !empty($bestSellingProducts[$i]->avatar[0]) ?  $bestSellingProducts[$i]->avatar[0]->link : ''}}"
                                                 alt="I Am A Taurus Woman Funny T Shirt"></img>
                                            <h3 class="title-name-product">
                                                {{ $bestSellingProducts[$i]->product->name }}
                                            </h3>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount font-bold">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                    {{ $bestSellingProducts[$i]->product->price }}
                                                </span>
                                            </span>
                                            <br/>
                                            <i class="fa fa-shopping-cart padding-right-20" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </aside>
                    <aside id="shopy-products-22" class="widget widget-shopy-products">
                        <h3 class="widget-title">
                            <span> @lang('sites.new_product') </span>
                        </h3>
                        <div class="row row3 padding-bottom-40 display-none">
                            @for ($i = 0; $i < 4; $i++)
                                @if (!empty($newProducts[$i]))
                                    <div class="col col-sm-3">
                                        <a href="{{ route('product.show', ['product' => $newProducts[$i]->id]) }}"
                                            class="woocommerce-LoopProduct-link">
                                            <!-- Featured Image From URL plugin -->
                                            <img src="{{  $newProducts[$i]->avatar[0]->link }}" alt="I Am A Taurus Woman Funny T Shirt"></img>
                                            <h3 class="title-name-product">
                                                {{ $newProducts[$i]->name }}
                                            </h3>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount font-bold">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                    {{ $newProducts[$i]->price }}
                                                </span>
                                            </span>
                                            <br/>
                                            <i class="fa fa-shopping-cart padding-right-20" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                @endif
                            @endfor
                        </div>
                        <div class="row row4 padding-bottom-40 display-none">
                            @for ($i = 4; $i < 8; $i++)
                                @if (!empty($newProducts[$i]))
                                    <div class="col col-sm-3">
                                        <a href="{{ route('product.show', ['product' => $newProducts[$i]->id]) }}"
                                           class="woocommerce-LoopProduct-link">
                                            <!-- Featured Image From URL plugin -->
                                            <img src="{{  $newProducts[$i]->avatar[0]->link }}" alt="I Am A Taurus Woman Funny T Shirt"></img>
                                            <h3 class="title-name-product">
                                                {{ $newProducts[$i]->name }}
                                            </h3>
                                            <span class="price">
                                            <span class="woocommerce-Price-amount amount font-bold">
                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                {{ $newProducts[$i]->price }}
                                            </span>
                                        </span>
                                            <br/>
                                            <i class="fa fa-shopping-cart padding-right-20" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </aside>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(window).scroll(function()
        {
            if ($(this).scrollTop() > 1)
            {
                $('.row1').removeClass('display-none');
                $('.row1').addClass('animation-right-to-left');
            }
            if ($(this).scrollTop() > 150)
            {
                $('.row2').removeClass('display-none');
                $('.row2').addClass('animation-left-to-right');
            }
            if ($(this).scrollTop() > 600)
            {
                $('.row3').removeClass('display-none');
                $('.row3').addClass('animation-right-to-left');
            }
            if ($(this).scrollTop() > 1000)
            {
                $('.row4').removeClass('display-none');
                $('.row4').addClass('animation-left-to-right');
            }
        });
    })
</script>
@endsection
