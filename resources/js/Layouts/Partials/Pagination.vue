<script setup>
defineProps({
    links: Array,
});
</script>
<template>
    <div>
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="(link, index) in links"
            :href="link.url"
            v-html="link.label?.replace(' Previous', '').replace('Next ', '')"
            class="px-3 py-1 border border-gray-300 border-l-0 text-sm text-[#007bff] hover:text-[#0056b3] hover:bg-[#e9ecef]"
            :class="{
                '!text-gray-500' : ! link.url,
                'bg-[#007bff] !text-white hover:!bg-[#007bff] hover:!text-white border border-[#007bff]' : link.active,
                '!border-l rounded-l' : index===0,
                'rounded-r' : index===links.length - 1,
            }"
        />
    </div>
</template>
