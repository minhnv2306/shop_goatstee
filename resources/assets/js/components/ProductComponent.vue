<template>
    <div>
        <a :href="url" class="woocommerce-LoopProduct-link">
            <!-- Featured Image From URL plugin -->
            <img :src="avatar" alt="I Am A Taurus Woman Funny T Shirt">
            <h3 class="title-name-product">
                {{ productObject.name }}
            </h3>
            <span class="price">
                <span class="woocommerce-Price-amount amount font-bold">
                    <span class="woocommerce-Price-currencySymbol">&#36;</span>
                        {{ productObject.price}}
                </span>
            </span>
            <br/>
            <i class="fa fa-shopping-cart padding-right-20" aria-hidden="true"></i>
        </a>
        <a href="#">
            <i class="fa fa-heart-o" aria-hidden="true"></i>
        </a>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                productObject: JSON.parse(this.product),
            }
        },
        props: {
            product: {
                type: String,
                required: true
            },
            avatar: {
                type: String
            },
            url: {
                type: String
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>

</style>