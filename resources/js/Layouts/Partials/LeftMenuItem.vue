<script setup>

defineProps({href:String, active:Boolean})
</script>

<template>
    <li>
        <Link :href="href"
              class="pl-4 h-10 flex items-center gap-2 rounded hover:bg-[rgba(255,255,255,0.1)]"
              :class="{'!bg-[#007bff] text-white':active}"
        >

            <slot/>
        </Link>
    </li>
</template>
