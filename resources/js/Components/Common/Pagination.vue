<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <nav v-if="links.length > 3" aria-label="" class="custom_pagination">
        <ul class="pagination">
            <li
                v-for="(link, index) in links"
                :key="index"
                :class="[
                    'page-item',
                    { disabled: !link.url, active: link.active },
                ]"
            >
                <component
                    :is="link.url ? Link : 'a'"
                    v-bind="link.url ? { href: link.url } : {}"
                    class="page-link"
                    v-html="link.label"
                    :aria-current="link.active ? 'page' : null"
                />
            </li>
        </ul>
    </nav>
</template>
<style></style>
