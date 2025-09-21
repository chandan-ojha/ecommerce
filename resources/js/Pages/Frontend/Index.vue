<script setup>
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    title: String,
});
</script>

<template>
    <Head :title="title" />
    <div class="container mt-5">
        <h1 class="text-center mb-4">Welcome to Seba Today</h1>
        <p class="text-center">Your one-stop shop for all your needs!</p>
        <div class="text-center mt-4">
            <a href="/login" class="btn btn-primary btn-lg">Shop Now</a>
        </div>
    </div>
</template>

<style scoped></style>
