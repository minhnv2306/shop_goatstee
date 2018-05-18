<template>
    <div>
        <add-product-to-cart
                v-bind:id="id"
                v-bind:labeltype="labeltype"
                v-bind:labelcolor="labelcolor"
                v-bind:labelsize="labelsize"
                v-bind:labelnumber="labelnumber"
                v-on:increment="getNumberTotal"
        ></add-product-to-cart>
        <div>
            <div class="woocommerce-variation-price">
                <span class="price">
                    <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">$</span>
                    </span>
                    <span id="price">
                        {{ sumprice }}
                    </span>
                </span>
            </div>
            <div class="woocommerce-variation-add-to-cart variations_button">
                <div class="quantity">
                    <input
                            type="number"
                            name="number"
                            min="1"
                            class="number_product"
                            v-bind:max="max"
                            v-model="min"
                            v-on:change="sumTotal">
                </div>
            </div>
            <div>
                <p> {{ labelnumber }}
                    <span id="total_number"> {{  totalnumber }} </span></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'originprice',
            'sumprice',
            'id',
            'labeltype',
            'labelcolor',
            'labelsize',
            'labelnumber'
        ],
        mounted() {
            console.log(this.labeltype);
        },
        data: function () {
            return {
                totalnumber: 0,
                min: 1,
                max: 10000,
            }
        },
        methods: {
            getNumberTotal: function (payload) {
                this.totalnumber = payload.numbertotal
                this.max = payload.numbertotal
            },
            sumTotal: function (e) {
                this.sumprice = this.originprice * e.target.value;
            }
        }
    }
</script>

<style scoped>

</style>
