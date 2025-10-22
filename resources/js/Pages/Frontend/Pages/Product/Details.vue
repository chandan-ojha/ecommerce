<script setup>
import { ref, computed } from "vue";
import FrontendLayout from "@/Pages/Frontend/Layouts/FrontendLayout.vue";
import { Head, Link, router, usePage } from "@inertiajs/vue3";

const props = defineProps({
    title: String,
    product: {
        type: Object,
        required: true,
    },
});

const carts = computed(() => usePage().props.cart.data.items);
const itemId = (id) => carts.value.findIndex((item) => item.product_id === id);

// add product to cart
const addToCart = (product) => {
    fetch(`/cart/store/${product.id}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content"),
        },
    }).then(() => {
        router.reload({ only: ["cart"] });
    });
};

const update = (product, quantity) =>
    router.patch(route("cart.update", product), {
        quantity,
    });
</script>

<template>
    <Head :title="title" />
    <FrontendLayout>
        <section id="product-details">
            <div class="details-content">
                <div class="row">
                    <!-- Product Image -->
                    <div class="col-md-6">
                        <img
                            v-if="product.media?.url"
                            :src="product.media.url"
                            class="img-fluid rounded product-img"
                            alt=""
                        />
                        <span v-else>N/A</span>
                    </div>

                    <div class="col-md-6">
                        <div class="dispatch-part">
                            <p>Afterpay & Klarna</p>
                            <p>Same day dispatch</p>
                        </div>

                        <h4 class="product-name">
                            {{ product.title }}
                        </h4>
                        <div class="product-prize">
                            <span class="prize">
                                ৳ {{ product?.price ?? "" }}</span
                            >
                            <!-- <span class="text-decoration-line-through discount">
                                158.00
                            </span> -->
                        </div>
                        <div class="review-part">
                            <span class="text-warning">★★★★★</span>
                            <p>329 Review</p>
                        </div>
                        <div class="d-flex align-items-center product-qty">
                            <div class="add-product d-flex align-items-center">
                                <span
                                    @click.prevent="
                                        if (
                                            (carts[itemId(product.id)]
                                                ?.quantity ?? 1) > 0
                                        ) {
                                            update(
                                                product,
                                                (carts[itemId(product.id)]
                                                    ?.quantity ?? 1) - 1
                                            );
                                        }
                                    "
                                >
                                    -
                                </span>
                                <input
                                    type="number"
                                    :value="
                                        carts[itemId(product.id)]?.quantity ?? 1
                                    "
                                    readonly
                                />
                                <span
                                    @click.prevent="
                                        update(
                                            product,
                                            (carts[itemId(product.id)]
                                                ?.quantity ?? 1) + 1
                                        )
                                    "
                                >
                                    +
                                </span>
                            </div>

                            <button
                                @click="addToCart(product)"
                                type="button"
                                class="btn btn-primary ms-3 px-4"
                            >
                                ADD TO CART
                            </button>
                        </div>

                        <p class="small Required-qty">
                            Minimum <span>50pcs</span> Order Quantity is
                            Required
                        </p>

                        <div
                            class="d-flex justify-content-between text-center return-product"
                        >
                            <div class="flex-fill">
                                <div
                                    class="d-flex align-items-center gap-2 m-0"
                                >
                                    <img
                                        src="/assets/frontend/images/ICON-1 (1).png"
                                        alt=""
                                    />
                                    <p class="small mb-0">
                                        Fast <br />
                                        Shipping
                                    </p>
                                </div>
                            </div>
                            <div class="flex-fill">
                                <div
                                    class="d-flex align-items-center gap-2 m-0"
                                >
                                    <img
                                        src="/assets/frontend/images/ICON-1 (2).png"
                                        alt=""
                                    />
                                    <p class="small mb-0">Easy <br />return</p>
                                </div>
                            </div>
                            <div class="flex-fill">
                                <div
                                    class="d-flex align-items-center gap-2 m-0"
                                >
                                    <img
                                        src="/assets/frontend/images/ICON-1 (3).png"
                                        alt=""
                                    />
                                    <p class="small mb-0">
                                        50%-80% <br />
                                        Lower Price
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-product-card" id="customAccordion">
                    <div class="Product-Details-item">
                        <h2
                            class="Product-Details-header w-100"
                            id="headingPrice"
                        >
                            <button
                                class="card-button w-100"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapsePrice"
                                aria-expanded="false"
                                aria-controls="collapsePrice"
                            >
                                Product Details
                            </button>
                        </h2>
                        <div
                            id="collapsePrice"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingPrice"
                            data-bs-parent="#customAccordion"
                        >
                            <div class="accordion-body-part">
                                <ul>
                                    <li>
                                        <strong>Lifetime Flashes</strong>
                                        <span>
                                            – Permanently hair-free skin with
                                            600,000 flashes – which is 2x longer
                                            than our standard IPL Handset!</span
                                        >
                                    </li>
                                    <li>
                                        <strong>Energy Per Flash</strong>
                                        <span>
                                            – 15 J/cm2 power on the highest
                                            setting, which is 2x stronger than
                                            our standard IPL Handset for
                                            increased efficiency.</span
                                        >
                                    </li>
                                    <li>
                                        <strong
                                            >Suitable for Face & Body</strong
                                        >
                                        <span
                                            >– Gentle enough for facial hair
                                            removal and powerful enough for long
                                            lasting hair reduction.</span
                                        >
                                    </li>
                                    <li>
                                        <strong
                                            >Automatic Skin Tone
                                            Selection</strong
                                        >
                                        <span
                                            >– Suitable for most skin tones and
                                            hair thickness.</span
                                        >
                                    </li>
                                    <li>
                                        <strong>Quick & Easy</strong>
                                        <span
                                            >– Long lasting hair reduction in
                                            just weeks with this easy-to-use
                                            handset.</span
                                        >
                                    </li>
                                    <li>
                                        <strong>FDA Cleared</strong>
                                        <span
                                            >– Gives you peace of mind knowing
                                            you are using a device that has been
                                            tested and cleared by the FDA!</span
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="Product-Details-item">
                        <h2 class="Product-Details-header" id="headingPen">
                            <button
                                class="card-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapsePen"
                                aria-expanded="false"
                                aria-controls="collapsePen"
                            >
                                Sample IMAGE
                            </button>
                        </h2>
                        <div
                            id="collapsePen"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingPen"
                            data-bs-parent="#customAccordion"
                        >
                            <div class="accordion-body-img">
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <img
                                            src="/assets/images/product-detais-2 (2).jpg"
                                            class="img-fluid rounded img-one"
                                            alt="Sample 1"
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <img
                                            src="/assets/images/product-detais-2 (1).jpg"
                                            class="img-fluid rounded shadow-sm img-two"
                                            alt="Sample 2"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="Product-Details-item">
                        <h2 class="Product-Details-header" id="headingMaterial">
                            <button
                                class="card-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseMaterial"
                                aria-expanded="false"
                                aria-controls="collapseMaterial"
                            >
                                Return Policy and Service
                            </button>
                        </h2>
                        <div
                            id="collapseMaterial"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingMaterial"
                            data-bs-parent="#customAccordion"
                        >
                            <div class="accordion-Policy">
                                <p>
                                    <strong>CAUTION:</strong> Before using, read
                                    the entire user manual. Always conduct a
                                    patch test to begin using on the lowest
                                    intensity level to assess your skin
                                    sensitivity.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>

<style scoped></style>
