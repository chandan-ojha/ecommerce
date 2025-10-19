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
                <h5 class="heading-pro">Products ({{ carts.length }})</h5>
                <div class="row">
                    <!-- Product List -->
                    <div class="col-lg-8">
                        <!-- Product Item -->

                        <div class="cart-item">
                            <img
                                src="/assets/images/cart-1.png"
                                alt="Product"
                            />
                            <div class="cart-details">
                                <h6>
                                    Teak Composite Decking – Amber 4m Composite
                                    Decking – Amber 4m
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
                                <span class="old-price">$39.00</span>
                                <span class="new-price">$29000.00</span>
                            </div>
                        </div>

                        <!-- Product Item -->
                        <div class="cart-item">
                            <img
                                src="/assets/images/cart-1.png"
                                alt="Product"
                            />
                            <div class="cart-details">
                                <h6>Teak Composite Decking – Amber 4m</h6>
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
                                <span class="old-price">$39.00</span>
                                <span class="new-price">$29.00</span>
                            </div>
                        </div>
                        <!-- Product Item -->
                        <div class="cart-item">
                            <img
                                src="/assets/images/cart-1.png"
                                alt="Product"
                            />
                            <div class="cart-details">
                                <h6>Teak Composite Decking – Amber 4m</h6>
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
                                <span class="old-price">$39.00</span>
                                <span class="new-price">$29.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-lg-4">
                        <div class="summary-box">
                            <h5 class="mb-3">My Cart</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="item">Item Total</span>
                                <span class="total">x3</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="item">Subtotal</span>
                                <span class="total">$99.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="item">Total</span>
                                <span class="total">$90.00</span>
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
