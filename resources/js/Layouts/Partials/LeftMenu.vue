<script setup>
import {mdiAccountCog, mdiAccountMultiple, mdiHome, mdiLayersPlus, mdiLayersTriple} from "@mdi/js";
import LeftMenuItem from "@/Layouts/Partials/LeftMenuItem.vue";
import SvgIcon from "@/Layouts/Partials/SvgIcon.vue";

defineProps({href:String})
</script>

<template>
    <div class="fixed h-full w-[250px] bg-[#343a40] text-gray-300">
        <Link href="/" class="pl-4 h-14 flex text-lg items-center gap-2 border-b border-gray-600">
            <img src="/img/logo.png" class="h-9 rounded-full" alt="">
        </Link>

        <!--  Menu  -->
        <ul class="pt-2 px-2 flex flex-col gap-1">
            <LeftMenuItem :href="route('products.index')" :active="$page.component === 'Products/Index'"><SvgIcon :path="mdiLayersTriple"/> Товары</LeftMenuItem>
        </ul>
    </div>
</template>
