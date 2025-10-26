<script setup>
import FrontendLayout from "@/Pages/Frontend/Layouts/FrontendLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    title: String,
});
</script>

<template>
    <Head :title="title" />

    <FrontendLayout>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="card shadow-lg border-0 p-5">
                        <div class="mb-4">
                            <i
                                class="bi bi-check-circle-fill text-success display-1"
                            ></i>
                        </div>

                        <h1 class="display-5 fw-bold mb-3">Thank You!</h1>
                        <p class="lead mb-2">
                            Your order has been placed successfully.
                        </p>

                        <!-- Our Team Message -->
                        <p class="text-muted mb-4">
                            Our team will contact you soon.
                        </p>

                        <div class="d-flex justify-content-center mt-4">
                            <Link
                                :href="route('products')"
                                class="continue-btn"
                            >
                                Continue Shopping
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>

<style scoped>
.card {
    border-radius: 1rem;
}

.continue-btn {
    background-color: #ee750b;
    color: #fff;
    width: 300px; /* Increased width */
    border: 3px solid #ee750b;
    border-radius: 10px; /* More radius */
    text-align: center;
    padding: 10px 0;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.continue-btn:hover {
    background-color: #fff;
    color: #ee750b;
    border-color: #ee750b;
}
</style>
