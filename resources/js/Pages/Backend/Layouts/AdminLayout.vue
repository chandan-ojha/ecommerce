<script setup>
import Footer from "./Footer.vue";
import NavBar from "./NavBar.vue";
import SideBar from "./SideBar.vue";
</script>

<template>
    <div class="dashboard_wrapper">
        <!-- ===== Heading HTML -->
        <NavBar></NavBar>
        <!-- ===== Heading HTML End -->
        <!-- ===== Sidebar HTML -->
        <SideBar></SideBar>
        <!-- ===== Sidebar HTML End -->
        <div class="content">
            <slot />
        </div>
        <Footer />
    </div>
</template>
