<script setup>
import Footer from "@/Components/Common/Footer.vue";
import NavBar from "@/Components/Common/NavBar.vue";
import SideBar from "@/Components/Common/SideBar.vue";
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
