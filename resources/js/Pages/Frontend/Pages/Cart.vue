<script setup>
import { ref, computed } from "vue";
import FrontendLayout from "@/Pages/Frontend/Layouts/FrontendLayout.vue";
import { Head, Link, router, usePage } from "@inertiajs/vue3";

const props = defineProps({
    title: String,
});

const carts = computed(() => usePage().props.cart.data.items);
const products = computed(() => usePage().props.cart.data.products);

const total = computed(() => usePage().props.cart.data.total);
const itemId = (id) => carts.value.findIndex((item) => item.product_id === id);
</script>

<template>
    <Head :title="title" />
    <FrontendLayout>
        <section class="cart-section">
            <div class="container py-5">
                <h5 class="heading-pro">Products ({{ products.length }})</h5>
                <div class="row">
                    <!-- Product List -->
                    <div class="col-lg-8">
                        <!-- Product Item -->
                        <div
                            v-for="product in products"
                            :key="product.id"
                            class="cart-item"
                        >
                            <img :src="product.image || ''" alt="Product" />
                            <div class="cart-details">
                                <h6>
                                    {{ product.title }}
                                </h6>
                                <div
                                    class="d-flex align-items-center justify-content-between"
                                >
                                    <div class="quantity-box">
                                        <button>-</button>
                                        <input
                                            type="text"
                                            value="01"
                                            readonly
                                        />
                                        <button>+</button>
                                    </div>
                                    <div>
                                        <span class="material-icons delete"
                                            >delete</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <button class="trash-btn">
                                <i class="bi bi-trash"></i>
                            </button>
                            <div class="price-box">
                                <span class="new-price"
                                    >৳ {{ product?.price ?? "" }}</span
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-lg-4">
                        <div class="summary-box">
                            <h5 class="mb-3">My Cart</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="item">Item Total</span>
                                <span class="total"
                                    >x{{ products.length }}</span
                                >
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="item">Subtotal</span>
                                <span class="total">৳ {{ total }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="item">Total</span>
                                <span class="total">৳ {{ total }}</span>
                            </div>
                            <p class="text-muted small">
                                Taxes and shipping calculated at checkout<br />lock
                                Check Out – $299.98
                            </p>

                            <div class="Postcode">
                                <label for="">Postcode</label>
                                <input
                                    type="text"
                                    class="form-control mb-3"
                                    placeholder="Enter Code"
                                />
                            </div>
                            <button class="btn-checkout w-100 mb-2">
                                Checkout Now
                            </button>

                            <span class="Continue">Continue Shopping</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>

<style scoped></style>
