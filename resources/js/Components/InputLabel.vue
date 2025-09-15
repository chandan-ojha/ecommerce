<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<!-- <template>
    <label class="block text-sm font-medium text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template> -->

<template>
    <label class="form-label">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
