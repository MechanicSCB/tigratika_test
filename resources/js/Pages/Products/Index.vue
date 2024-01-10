<script setup>
import Pagination from "@/Layouts/Partials/Pagination.vue";
import {useForm} from "@inertiajs/vue3";
import ProductFilter from "@/Pages/Products/Partials/ProductFilter.vue";

defineProps({products: Object});

let form = useForm({
    name: '',
    parent_id: '',
});
</script>

<template>
    <div class="py-4 px-4">
        <Pagination :links="products.links" class="mt-4 mb-4"/>

        <div class="my-2 text-xs">Показано c {{ products.from }} по {{ products.to }} из <b>{{ products.total }}</b></div>

        <!-- Filter -->
        <ProductFilter/>

        <!-- Table -->
        <div class="mt-8 w-full bg-white rounded shadow">
            <!-- table header -->
            <div class="py-3 px-5 flex justify-between font-semibold border-b gap-3">
                <div class="w-8 shrink-0">#</div>
                <div class="w-24 shrink-0"></div>
                <div class="w-36 shrink-0">Категория</div>
                <div class="w-full">Наименование товара</div>
                <div class="w-24 shrink-0">Цена</div>
            </div>

            <!-- table rows -->
            <div v-for="(product, index) in products.data" :key="product.id" class="py-3 px-5 flex justify-between border-b gap-3">
                <div class="w-8 shrink-0">{{ index + products.from }}</div>
                <div class="w-24 shrink-0"><img :src="product.picture" alt=""></div>
                <div class="w-36 shrink-0 text-gray-700 text-sm">
                    {{ product.category }} ->&nbsp;{{ product.sub_category }}
                    {{ product.sub_sub_category ? '->&nbsp;' + product.sub_sub_category : '' }}
                </div>
                <div class="w-full">{{ product.name }}</div>
                <div class="w-24 shrink-0">
                    <div :class="{'text-red-600 font-semibold':product.old_price}">{{ product.price.toLocaleString() }} ₽</div>
                    <div v-if="product.old_price" class="line-through">{{ product.old_price.toLocaleString() ?? '-' }} ₽</div>
                </div>
            </div>
        </div>
    </div>
</template>
