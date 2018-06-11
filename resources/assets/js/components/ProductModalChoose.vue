<template>
    <div>
        <product-cart
                v-bind:id="id"
                v-bind:label-type="labelType"
                v-bind:label-color="labelColor"
                v-bind:label-size="labelSize"
                v-bind:label-number="labelNumber"
                v-on:increment="getNumberTotal"
        ></product-cart>
        <div>
            <div class="woocommerce-variation-price">
                <span class="price">
                    <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">$</span>
                    </span>
                    <span id="price">
                        {{ sumPrice }}
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
                            v-model="quality"
                            />
                </div>
            </div>
            <div>
                <p> {{ labelNumber }}
                    <span id="total_number"> {{  totalNumber }} </span></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            originPrice: {
                type: Number,
                required: true
            },
            id: {
                type: Number,
                required: true
            },
            labelType: {
                type: String
            },
            labelColor: {
                type: String
            },
            labelSize: {
                type: String
            },
            labelNumber: {
                type: String
            }
        },
        data: function () {
            return {
                totalNumber: 0,
                quality: 1,
                max: 10000,
            }
        },
        computed: {
            sumPrice: function () {
                return this.quality * this.originPrice;
            }
        },
        methods: {
            getNumberTotal: function (payload) {
                this.totalNumber = payload.numbertotal
                this.max = payload.numbertotal
            }
        }
    }
</script>

<style scoped>

</style>
