<span>
    <a class="cart-contents" href="javascript:void(0)" title="{{ trans('sites.carts.title') }}" id="myBtn">
        <span class="total">$ {{ number_format($price) }}</span>
        <i class="fa fa-shopping-cart"></i>
        <span class="count">{{ number_format($number) }}</span>
    </a>
</span>
<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $.ajax({
                url: '/get-cart',
                type: 'get',
                success: function (data) {
                    $('#modal-my-cart').html(data);
                    $("#modal-cart").modal();
                }
            })
        });
    });
</script>
