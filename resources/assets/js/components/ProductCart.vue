<template>
    <table class="variations" cellspacing="0">
        <tbody>
        <tr id="fit_type_choose">
            <td>
                <h4> {{ labelType }} </h4>
            </td>
            <td class="value">
                <select
                        v-model="sex"
                        @change="changeSelect"
                        name="sex"
                >
                    <option value="0" selected>--Select an option--</option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                </select>
            </td>
        </tr>
        <tr id="color_choose">
            <td>
                <h4> {{ labelColor }} </h4>
            </td>
            <td class="value" id="color_product">
                <select
                        v-model="color"
                        v-html="htmlcolor"
                        id="color"
                        @change="changeColor"
                        name="color_id"
                >
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <h4> {{ labelSize }} </h4>
            <td class="value" id="size_product">
                <select
                        v-model="size"
                        v-html="htmlsize"
                        id="size"
                        @change="changeSize"
                        name="size_id"
                >
                </select>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: {
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
            }
        },

        data: function() {
            return {
                sex: 0,
                color: 0,
                size: 0,
                productId: this.id,
                htmlcolor: '<option value="0" selected>--Select an option--</option>',
                htmlsize: '<option value="0" selected>--Select an option--</option>',
            }
        },

        methods: {
            changeSelect: function () {
                var sex = this.sex;
                var productId = this.productId;
                var vueThis = this;
                axios({
                    method: 'post',
                    url: '/getColors',
                    data: {
                        sex: sex,
                        productId: productId
                    },
                }).then(resp => vueThis.htmlcolor = resp.data
                ).catch(error => swal("OOp!!", error, "error"));
            },
            changeColor: function () {
                var sex = this.sex;
                var productId = this.productId;
                var color_id = this.color;
                var vueThis = this;

                axios({
                    url: '/getSizes',
                    data: {
                        sex: sex,
                        productId: productId,
                        color_id: color_id
                    },
                    method: 'POST',
                }).then(function (resp) {
                    vueThis.htmlsize = resp.data;
                }).catch(function (error) {
                    swal("OOp!!", error, "error");
                });
            },
            changeSize: function () {
                var sex = this.sex;
                var productId = this.productId;
                var color_id = this.color;
                var vueThis = this;

                axios({
                    url: '/getNumber',
                    data: {
                        sex: this.sex,
                        productId: productId,
                        colorId: color_id,
                        sizeId: this.size,
                    },
                    method: 'POST',
                }).then(function (resp) {
                    vueThis.$emit('increment', {numbertotal: resp.data})
                }).catch(function (error) {
                    swal("OOp!!", error, "error");
                });
            },
        }
    }
</script>

<style scoped>

</style>