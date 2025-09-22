<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
</script>

<template>
    <main>
        <Header />
        <div class="container">
            <slot />
        </div>
        <Footer />
    </main>
</template>
