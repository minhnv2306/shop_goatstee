<div id="cart-content">
    <the-cart-content
            :price="{!! $price !!}"
            :number="{!! $number !!}"
    >
    </the-cart-content>
</div>
<script>
    new Vue({
        el: '#cart-content'
    });
</script>
