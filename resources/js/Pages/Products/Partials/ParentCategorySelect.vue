<script setup>
defineProps({modelValue:String});
</script>

<template>
    <!-- TODO replace with custom select with search -->
    <select :value="modelValue" @change="$emit('update:modelValue', $event.target.value)"
            class="rounded border-gray-100 bg-gray-50"
    >
        <option value="">-</option>
        <option v-for="cat in $page.props.allCategories" :value="cat.name">{{ cat.name }}</option>
    </select>
</template>

