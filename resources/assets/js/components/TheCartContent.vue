<template>
    <div>
        <span>
            <a class="cart-contents" href="javascript:void(0)" title="Hehe" id="myBtn" @click="showContent">
                <span class="total">$ {{ price }}</span>
                <i class="fa fa-shopping-cart"></i>
                <span class="count">{{ number }}</span>
            </a>
        </span>
    </div>
</template>

<script>
    export default {
        props: [
            'price',
            'number',
        ],
        data: function () {
            return {
                cartContent: '',
            };
        },
        methods: {
            showContent: function () {
                axios.get('/get-cart').then(function (result) {
                    $('#modal-my-cart').html(result.data);
                    $("#modal-cart").modal();
                })
            }
        }
    }
</script>

<style scoped>

</style>