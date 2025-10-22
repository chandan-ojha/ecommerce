<script setup>
import { ref, computed } from "vue";
import FrontendLayout from "@/Pages/Frontend/Layouts/FrontendLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";

const props = defineProps({
    title: String,
    onSaleProducts: {
        type: Object,
        required: true,
    },
    products: {
        type: Object,
        required: true,
    },
    categories: {
        type: Array,
        required: true,
    },
});

const onSaleProductList = computed(() => props.onSaleProducts.data ?? []);
const productsList = computed(() => props.products.data ?? []);
const categoryList = computed(() => props.categories ?? []);

// Function to chunk array into groups of N
const chunkArray = (array, size) => {
    const chunks = [];
    for (let i = 0; i < array.length; i += size) {
        chunks.push(array.slice(i, i + size));
    }
    return chunks;
};

// Chunk products into slides of 4
const onSaleProductChunks = computed(() =>
    chunkArray(onSaleProductList.value, 4)
);

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
</script>

<template>
    <Head :title="title" />
    <FrontendLayout>
        <section class="slider" id="slider">
            <div
                id="carouselExampleDark"
                class="carousel slide"
                data-bs-ride="carousel"
            >
                <div class="carousel-indicators">
                    <button
                        type="button"
                        data-bs-target="#carouselExampleDark"
                        data-bs-slide-to="0"
                        class="active"
                        aria-current="true"
                        aria-label="Slide 1"
                    ></button>
                    <button
                        type="button"
                        data-bs-target="#carouselExampleDark"
                        data-bs-slide-to="1"
                        aria-label="Slide 2"
                    ></button>
                    <button
                        type="button"
                        data-bs-target="#carouselExampleDark"
                        data-bs-slide-to="2"
                        aria-label="Slide 3"
                    ></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            src="/assets/frontend/images/slider_image_1.png"
                            alt=""
                            class="slider-image"
                        />
                        <!-- <div class="image-overlay">
                            <div class="container">
                                <div class="content-box">
                                    <h2 data-aos="fade-up" data-aos-delay="200">
                                        Our black Friday event is here!
                                    </h2>
                                    <a
                                        href="#"
                                        class="btn-style-one btn-style-two"
                                        data-aos="fade-up"
                                        data-aos-delay="300"
                                    >
                                        <p class="slider-offer">
                                            Grab the Offer
                                            <span class="material-icons">
                                                chevron_right
                                            </span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img
                            src="/assets/frontend/images/slider_image_2.png"
                            alt=""
                            class="slider-image"
                        />
                        <!-- <div class="image-overlay">
                            <div class="container">
                                <div class="content-box">
                                    <h2 data-aos="fade-up" data-aos-delay="200">
                                        Our black Friday event is here!
                                    </h2>
                                    <a
                                        href="#"
                                        class="btn-style-one btn-style-two"
                                        data-aos="fade-up"
                                        data-aos-delay="300"
                                    >
                                        <p class="slider-offer">
                                            Grab the Offer
                                            <span class="material-icons">
                                                chevron_right
                                            </span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img
                            src="/assets/frontend/images/slider_image_2.png"
                            alt=""
                            class="slider-image"
                        />
                    </div>
                </div>
            </div>
        </section>
        <!-- ===== Slider Section End -->
        <!-- ====category========= -->
        <section class="catergory">
            <div class="category-part">
                <div
                    class="d-flex justify-content-between align-items-center mt-2"
                >
                    <div class="section-title">
                        <h3>Browse by Category</h3>
                    </div>
                    <div class="catergory-icon d-flex gap-3 align-items-center">
                        <p>
                            <span class="material-icons cat-left">
                                chevron_left
                            </span>
                        </p>
                        <p>
                            <span class="material-icons cat-right">
                                chevron_right
                            </span>
                        </p>
                    </div>
                </div>
                <div class="category-box">
                    <div
                        v-for="category in categoryList"
                        :key="category.id"
                        class="single-category"
                    >
                        <img :src="category.media?.url || ''" alt="" />
                        <p>{{ category?.title ?? "" }}</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End category section start ===== -->
        <section class="featured-product">
            <div class="card-section">
                <div
                    class="card-header d-flex justify-content-between align-items-center"
                >
                    <div>
                        <h3>Shop Product’s</h3>
                    </div>
                    <div><span>Ends in - 8:00:00</span></div>
                </div>

                <div
                    id="cardCarousel"
                    class="carousel slide"
                    data-bs-ride="carousel"
                >
                    <div class="carousel-inner">
                        <!-- First slide (4 cards) -->
                        <div
                            v-for="(chunk, index) in onSaleProductChunks"
                            :key="index"
                            :class="[
                                'carousel-item',
                                index === 0 ? 'active' : '',
                                'ps-3',
                                'pe-3',
                                'pb-3',
                            ]"
                        >
                            <div class="row">
                                <div
                                    v-for="product in chunk"
                                    :key="product.id"
                                    class="col-lg-3 col-md-6 col-sm-6"
                                >
                                    <div class="card">
                                        <Link
                                            :href="
                                                route(
                                                    'products.show',
                                                    product.id
                                                )
                                            "
                                            class="d-block"
                                        >
                                            <img
                                                :src="product.media?.url || ''"
                                                class="card-img-top"
                                                alt=""
                                            />
                                        </Link>
                                        <div class="card-body">
                                            <Link
                                                :href="
                                                    route(
                                                        'products.show',
                                                        product.id
                                                    )
                                                "
                                                class="text-decoration-none text-dark d-block"
                                            >
                                                <h5 class="card-title">
                                                    {{ product?.title ?? "" }}
                                                </h5>
                                            </Link>
                                            <p class="m-0">
                                                <span class="text-warning"
                                                    >★★★★★</span
                                                >
                                                <span class="text-muted"
                                                    >329 review</span
                                                >
                                            </p>
                                            <p
                                                class="vat d-flex align-items-center gap-2"
                                            >
                                                <span class="fw-bold"
                                                    >৳
                                                    {{
                                                        product?.price ?? ""
                                                    }}</span
                                                >
                                            </p>
                                            <button
                                                type="button"
                                                @click="addToCart(product)"
                                                class="btn btn-outline-primary w-100"
                                            >
                                                Add to Basket
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second slide (another 4 cards) -->
                        <!-- <div class="carousel-item ps-3 pe-3 pb-3">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card">
                                        <img
                                            src="/assets/frontend/images/image (9).png"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Colorful Pen
                                            </h5>
                                            <p class="m-0">
                                                <span class="text-warning"
                                                    >★★★★★</span
                                                >
                                                <span class="text-muted"
                                                    >329 review</span
                                                >
                                            </p>
                                            <p
                                                class="vat d-flex align-items-center gap-2"
                                            >
                                                <span class="fw-bold"
                                                    >£3,974.40</span
                                                >
                                                <span
                                                    class="text-muted text-decoration-line-through"
                                                    >£3,312.00 Excl. VAT</span
                                                >
                                            </p>
                                            <a
                                                href="#"
                                                class="btn btn-outline-primary w-100"
                                                >Add to Basket</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card">
                                        <img
                                            src="/assets/frontend/image (10).png"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Colorful Pen
                                            </h5>
                                            <p class="m-0">
                                                <span class="text-warning"
                                                    >★★★★★</span
                                                >
                                                <span class="text-muted"
                                                    >329 review</span
                                                >
                                            </p>
                                            <p
                                                class="vat d-flex align-items-center gap-2"
                                            >
                                                <span class="fw-bold"
                                                    >£3,974.40</span
                                                >
                                                <span
                                                    class="text-muted text-decoration-line-through"
                                                    >£3,312.00 Excl. VAT</span
                                                >
                                            </p>
                                            <a
                                                href="#"
                                                class="btn btn-outline-primary w-100"
                                                >Add to Basket</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card">
                                        <img
                                            src="/assets/frontend/image (11).png"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Colorful Pen
                                            </h5>
                                            <p class="m-0">
                                                <span class="text-warning"
                                                    >★★★★★</span
                                                >
                                                <span class="text-muted"
                                                    >329 review</span
                                                >
                                            </p>
                                            <p
                                                class="vat d-flex align-items-center gap-2"
                                            >
                                                <span class="fw-bold"
                                                    >£3,974.40</span
                                                >
                                                <span
                                                    class="text-muted text-decoration-line-through"
                                                    >£3,312.00 Excl. VAT</span
                                                >
                                            </p>
                                            <a
                                                href="#"
                                                class="btn btn-outline-primary w-100"
                                                >Add to Basket</a
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card">
                                        <img
                                            src="/assets/frontend/image (14).png"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Colorful Pen
                                            </h5>
                                            <p class="m-0">
                                                <span class="text-warning"
                                                    >★★★★★</span
                                                >
                                                <span class="text-muted"
                                                    >329 review</span
                                                >
                                            </p>
                                            <p
                                                class="vat d-flex align-items-center gap-2"
                                            >
                                                <span class="fw-bold"
                                                    >£3,974.40</span
                                                >
                                                <span
                                                    class="text-muted text-decoration-line-through"
                                                    >£3,312.00 Excl. VAT</span
                                                >
                                            </p>
                                            <a
                                                href="#"
                                                class="btn btn-outline-primary w-100"
                                                >Add to Basket</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Controls -->
                    <!-- Prev Button -->
                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#cardCarousel"
                        data-bs-slide="prev"
                    >
                        <span class="material-icons">chevron_left</span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <!-- Next Button -->
                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#cardCarousel"
                        data-bs-slide="next"
                    >
                        <span class="material-icons">chevron_right</span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- =========banner section start ===== -->
        <section class="banner-section">
            <div class="banner-part">
                <div class="single-banner">
                    <img src="/assets/frontend/images/banner.png" alt="" />
                </div>
            </div>
        </section>
        <!-- =========banner section end ===== -->

        <!-- more-product======= -->

        <section class="show-products">
            <div class="more-product">
                <div
                    class="section-title d-flex justify-content-between align-items-center mt-2"
                >
                    <h3>Shop Product’s</h3>
                    <p>
                        Browse All<span class="material-icons">
                            chevron_right
                        </span>
                    </p>
                </div>

                <div class="more-product-box">
                    <div
                        v-for="product in productsList"
                        :key="product.id"
                        class="single-more-product"
                    >
                        <img :src="product.media?.url || ''" alt="" />

                        <div class="card-body">
                            <Link
                                :href="route('products.show', product.id)"
                                class="text-decoration-none text-dark d-block"
                            >
                                <h5 class="card-title">
                                    {{ product?.title ?? "" }}
                                </h5>
                            </Link>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">
                                    <p>৳ {{ product?.price ?? "" }}</p>
                                </span>
                            </p>
                            <button
                                type="button"
                                @click="addToCart(product)"
                                class="btn btn-outline-primary w-100"
                            >
                                Add to Basket
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--end more-product======= -->

        <!-- =========banner section start ===== -->
        <section class="banner-section-two">
            <div class="banner-part">
                <div class="single-banner">
                    <img src="/assets/frontend/images/banner.png" alt="" />
                </div>
            </div>
        </section>
        <!-- =========banner section end ===== -->
        <!-- our-clicnts==== -->
        <section class="out-clicnts">
            <h3 class="titel-part">Our Clients</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="our-client">
                        <div class="single-client">
                            <img
                                src="/assets/frontend/images/client-img-1.png"
                                alt=""
                            />
                        </div>
                        <div class="single-client">
                            <img
                                src="/assets/frontend/images/client-img-2.png"
                                alt=""
                            />
                        </div>
                        <div class="single-client">
                            <img
                                src="/assets/frontend/images/client-img-3.png"
                                alt=""
                            />
                        </div>
                        <div class="single-client">
                            <img
                                src="/assets/frontend/images/client-img-4.png"
                                alt=""
                            />
                        </div>
                        <div class="single-client">
                            <img
                                src="/assets/frontend/images/client-img-5.png"
                                alt=""
                            />
                        </div>
                        <div class="single-client">
                            <img
                                src="/assets/frontend/images/client-img-6.png"
                                alt=""
                            />
                        </div>
                        <div class="single-client">
                            <img
                                src="/assets/frontend/images/client-img-8.png"
                                alt=""
                            />
                        </div>
                        <div class="single-client">
                            <img
                                src="/assets/frontend/images/client-img-9.png"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>

<style scoped></style>
