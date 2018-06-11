<template>
    <div class="header-cart" v-html="cartContent"></div>
</template>

<script>
    export default {
        data: function () {
            return {
                cartContent: '',
            };
        },
        created() {
            var thisCart = this;
            axios.get('/getNumberProduct/' + localStorage.getItem("hash"))
                .then(function (result) {
                    $('.header-cart').append(result.data)
                })
        }
    }
</script>
