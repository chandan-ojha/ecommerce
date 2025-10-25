<script setup>
import { ref, computed } from "vue";
import FrontendLayout from "@/Pages/Frontend/Layouts/FrontendLayout.vue";
import { Head, Link, router, usePage, useForm } from "@inertiajs/vue3";

const props = defineProps({
    title: String,
    userAddress: Object,
});

const page = usePage();

const carts = computed(() => page.props.cart.data.items);
const products = computed(() => page.props.cart.data.products);
const total = computed(() => page.props.cart.data.total);

const form = useForm({
    phone: "",
    region: "",
    city: "",
    area: "",
    address: "",
});

/**
 * Confirm order
 */
function confirmOrder() {
    router.visit(route("checkout.store"), {
        method: "post",
        data: {
            carts: carts.value,
            products: products.value,
            total: total.value,
            address_info: form,
        },
        onSuccess: () => {
            form.reset();
        },
    });
}
</script>

<template>
    <Head :title="title" />
    <FrontendLayout>
        <section class="delivery-part">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="DeliveryForm">
                            <div class="row mb-4">
                                <h5 class="Delivery-head">
                                    Delivery Information
                                </h5>
                                <div class="col-md-6">
                                    <label for="name" class="form-label">
                                        Phone Number
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="phone"
                                        v-model="form.phone"
                                        placeholder="Enter"
                                    />
                                </div>

                                <div class="col-md-6">
                                    <label for="region" class="form-label">
                                        Region
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="region"
                                        v-model="form.region"
                                        placeholder="Enter"
                                    />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">
                                        City
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="region"
                                        v-model="form.city"
                                        placeholder="Enter"
                                    />
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">
                                        Area
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="area"
                                        v-model="form.area"
                                        placeholder="Enter"
                                    />
                                </div>
                            </div>
                            <div class="form-group pb-2">
                                <label for="message">Street Address</label>
                                <textarea
                                    id="address"
                                    name="address"
                                    rows="5"
                                    placeholder="Your Message"
                                    class="form-control"
                                    v-model="form.address"
                                    required
                                ></textarea>
                            </div>
                        </div>
                        <div id="successMessage">
                            Your message has been sent successfully!
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="confirm-order-box">
                            <h5 class="mb-3">Confirm Order</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="item">Item Total</span>
                                <span class="total">
                                    x{{ products.length }}
                                </span>
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

                            <div class="case-order">
                                <select
                                    id="priority-to"
                                    class="form-control form-select sorted-by"
                                >
                                    <option value="">
                                        Select Payment Method
                                    </option>
                                    <option value="">Cash</option>
                                    <option value="">Bkash</option>
                                    <option value="">Nagad</option>
                                </select>
                            </div>
                            <button
                                @click="confirmOrder"
                                type="button"
                                class="btn-confirm w-100 mb-2"
                            >
                                Confirm Order
                            </button>

                            <span class="Continue">
                                Call to Order: 01764805692
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>

<style scoped></style>
