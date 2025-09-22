<script setup>
const currentYear = new Date().getFullYear();
</script>

<template>
    <footer class="footer_section">
        <span class="copyright">
            Copyright &copy; {{ currentYear }} || All Rights Reserved.
        </span>
        <ul>
            <li><a href="#">Support</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </footer>
</template>

<style scoped></style>
