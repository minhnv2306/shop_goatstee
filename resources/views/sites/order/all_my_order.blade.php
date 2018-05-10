@extends('layouts.sites.master')
@section('title', trans('sites.order.my_order'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-12" class="post-12 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline">@lang('sites.order.order')</h1>
                        <div class="woocommerce">
                            <table class="shop_table shop_table_responsive cart" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="product-name"> @lang('sites.order.order') </th>
                                        <th class="product-price"> @lang('sites.order.status') </th>
                                        <th class="product-quantity"> @lang('admin.created_at') </th>
                                        <th class="product-subtotal"> @lang('sites.carts.total') </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="cart_item">
                                        <td class="product-name" data-title="Product">
                                            <a href="{{ route('sites.showOrder', ['order' => $order->id]) }}">
                                                {{ trans('sites.order.title') . $order->id }}
                                            </a>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <span class="woocommerce-Price-amount amount">
                                                {{ $order->created_at }}
                                            </span>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                             <span class="woocommerce-Price-amount amount">
                                                 <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                                 {{ number_format($order->price) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
