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

const update = (product, quantity) =>
    router.patch(route("cart.update", product), {
        quantity,
    });

//remove form cart
const remove = (product) => router.delete(route("cart.delete", product));
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
                                        <button
                                            @click.prevent="
                                                update(
                                                    product,
                                                    carts[itemId(product.id)]
                                                        .quantity - 1
                                                )
                                            "
                                            :disabled="
                                                carts[itemId(product.id)]
                                                    .quantity <= 1
                                            "
                                        >
                                            -
                                        </button>
                                        <input
                                            type="number"
                                            v-model="
                                                carts[itemId(product.id)]
                                                    .quantity
                                            "
                                            readonly
                                        />
                                        <button
                                            @click.prevent="
                                                update(
                                                    product,
                                                    carts[itemId(product.id)]
                                                        .quantity + 1
                                                )
                                            "
                                        >
                                            +
                                        </button>
                                    </div>
                                    <div>
                                        <a
                                            @click="remove(product)"
                                            class="material-icons delete"
                                        >
                                            delete
                                        </a>
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
                            <!-- <p class="text-muted small">
                                Taxes and shipping calculated at checkout<br />lock
                                Check Out – $299.98
                            </p> -->

                            <!-- <div class="Postcode">
                                <label for="">Cupon Code</label>
                                <input
                                    type="text"
                                    class="form-control mb-3"
                                    placeholder="Enter Code"
                                />
                            </div> -->
                            <button
                                @click="$inertia.visit(route('checkout.view'))"
                                type="button"
                                class="btn-checkout w-100 mb-2"
                            >
                                Checkout Now
                            </button>
                            <Link :href="route('products')" class="Continue">
                                Continue Shopping
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>

<style scoped></style>
