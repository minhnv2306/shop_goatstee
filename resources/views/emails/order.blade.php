@component('mail::message')
# @lang('sites.emails.order_confirm')

@lang('sites.emails.order_title')

@foreach($productOrders as $productOrder)
- {{ $productOrder->storeProduct->product->name . ' x ' . $productOrder->number }}
@endforeach

@lang('sites.emails.total'): {{ $price . ' $' }}

@component('mail::button', ['url' => 'http://goatstee.local/order/' . $orderId])
@lang('sites.emails.view')
@endcomponent

@lang('sites.emails.thanks'),<br>
@lang('sites.emails.signature')
@endcomponent
