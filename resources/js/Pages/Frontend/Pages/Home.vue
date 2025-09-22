<script setup>
import FrontendLayout from "@/Pages/Frontend/Layouts/FrontendLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    title: String,
});
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
                            src="/assets/frontend/images/slider-img.jpg"
                            alt=""
                            class="slider-image"
                        />
                        <div class="image-overlay">
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
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img
                            src="/assets/frontend/images/slider-img.jpg"
                            alt=""
                            class="slider-image"
                        />
                        <div class="image-overlay">
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
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img
                            src="/assets/frontend/images/slider-img.jpg"
                            alt=""
                            class="slider-image"
                        />
                        <div class="image-overlay">
                            <div class="container h-100">
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
                        </div>
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
                    <div class="single-category">
                        <img
                            src="/assets/frontend/images/category-1 (1).jpg"
                            alt=""
                        />
                        <p>Coloring Pen</p>
                    </div>
                    <div class="single-category">
                        <img
                            src="/assets/frontend/images/category (2).jpg"
                            alt=""
                        />
                        <p>Sketch Pen</p>
                    </div>
                    <div class="single-category">
                        <img
                            src="/assets/frontend/images/category-1 (6).jpg"
                            alt=""
                        />
                        <p>Art book</p>
                    </div>
                    <div class="single-category">
                        <img
                            src="/assets/frontend/images/category-1 (5).jpg"
                            alt=""
                        />
                        <p>Kids Pen</p>
                    </div>
                    <div class="single-category">
                        <img
                            src="/assets/frontend/images/category-1 (3).jpg"
                            alt=""
                        />
                        <p>Cooperate</p>
                    </div>
                    <div class="single-category">
                        <img
                            src="/assets/frontend/images/category-1 (7).jpg"
                            alt=""
                        />
                        <p>Pencil</p>
                    </div>
                    <div class="single-category">
                        <img
                            src="/assets/frontend/images/category-1 (8).jpg"
                            alt=""
                        />
                        <p>Marker</p>
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
                        <div class="carousel-item active ps-3 pe-3 pb-3">
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
                                            src="/assets/frontend/images/image (10).png"
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
                                            src="/assets/frontend/images/image (11).png"
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
                                            src="/assets/frontend/images/image (14).png"
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
                        </div>

                        <!-- Second slide (another 4 cards) -->
                        <div class="carousel-item ps-3 pe-3 pb-3">
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
                        </div>
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
                    <img src="/assets/frontend/images/image 20.png" alt="" />
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
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (9).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (16).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (17).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (18).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (19).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (20).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (20).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (20).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (20).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (20).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (20).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
                        </div>
                    </div>
                    <div class="single-more-product">
                        <img
                            src="/assets/frontend/images/image (20).png"
                            alt=""
                        />
                        <div class="card-body">
                            <h5 class="card-title">Colorful Pen</h5>
                            <p class="m-0">
                                <span class="text-warning">★★★★★</span>
                                <span class="text-muted">329 review</span>
                            </p>
                            <p class="vat d-flex align-items-center gap-2">
                                <span class="fw-bold">£3,974.40</span>
                                <span
                                    class="text-muted text-decoration-line-through"
                                    >£3,312.00 Excl. VAT</span
                                >
                            </p>
                            <a href="#" class="btn btn-outline-primary w-100"
                                >Add to Basket</a
                            >
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
                    <img src="/assets/frontend/images/image 20.png" alt="" />
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
