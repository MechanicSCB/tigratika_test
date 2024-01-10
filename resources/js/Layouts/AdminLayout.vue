<script setup>
import LeftMenu from "@/Layouts/Partials/LeftMenu.vue";
import Header from "@/Layouts/Partials/Header.vue";
import Flash from "@/Layouts/Partials/Flash.vue";
</script>

<template>
    <div class="flex">
        <Flash/>

        <LeftMenu/>

        <div class="ml-[250px] w-full">
            <Header/>

            <main class="w-full min-h-screen bg-gray-100">
                <slot/>
            </main>
        </div>
    </div>
</template>
