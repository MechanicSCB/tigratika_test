<script setup>
import {useForm} from "@inertiajs/vue3";
import {onMounted} from "vue";
import {setQueryArgsToFilterForm} from "@/Stores/CommonStore.js";
import ParentCategorySelect from "@/Pages/Products/Partials/ParentCategorySelect.vue";

let form = useForm({
    name: '',
    category_name: '',
});

let submit = () => {
    form.get(route('products.index'), {
        preserveScroll: true,
        preserveState: true,
    })
};

onMounted(() => {
    setQueryArgsToFilterForm(form);
});
</script>

<template>
    <form @submit.prevent class="p-2 bg-white rounded shadow flex flex-col md:flex-row items-center gap-3">
        <input class="h-9 w-full rounded border-gray-200" @input="submit" v-model="form.name"/>

        <!-- TODO filter by category id -->
        <ParentCategorySelect class="h-9 w-full" @change="submit" v-model="form.category_name"/>
    </form>
</template>
