<script setup>
import SvgIcon from "@/Layouts/Partials/SvgIcon.vue";
import {mdiDownload, mdiFileExcel} from "@mdi/js";
</script>

<template>
    <div class="px-3 h-14 w-full bg-white border-b border-gray-300 flex items-center justify-between">
        <Link href="/"><img src="/img/quarta-logo.svg" alt=""></Link>

        <a class="py-1 px-2 border rounded hover:bg-gray-700 hover:text-white flex items-center" href="/products/export">
            <SvgIcon :path="mdiDownload"/>
            <SvgIcon :path="mdiFileExcel"/>
        </a>
    </div>
</template>
