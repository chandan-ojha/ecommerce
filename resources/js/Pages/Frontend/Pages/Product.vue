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
        <section class="product-section">
            <div class="product-part">
                <div class="product-banner">
                    <img
                        src="/assets/frontend/images/producti-img.jpg"
                        alt=""
                    />
                </div>
            </div>
            <div class="all-product-show">
                <div class="row">
                    <div class="col-md-2">
                        <div class="accordion-card" id="customAccordion">
                            <!-- Price -->
                            <div class="accordion-item">
                                <h2
                                    class="accordion-header w-100"
                                    id="headingPrice"
                                >
                                    <button
                                        class="btn-link w-100"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapsePrice"
                                        aria-expanded="false"
                                        aria-controls="collapsePrice"
                                    >
                                        PRICE
                                    </button>
                                </h2>
                                <div
                                    id="collapsePrice"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingPrice"
                                    data-bs-parent="#customAccordion"
                                >
                                    <div class="accordion-body">
                                        <p>The highest price is £2,499.00</p>
                                        <div class="row g-2 mb-2">
                                            <div class="col">
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    placeholder="From"
                                                />
                                            </div>
                                            <div class="col">
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    placeholder="To"
                                                />
                                            </div>
                                        </div>
                                        <div
                                            class="position-relative Range-slider"
                                        >
                                            <!-- Range slider track -->
                                            <input
                                                type="range"
                                                class="form-range"
                                                min="0"
                                                max="1000"
                                                value="100"
                                                id="rangeMin"
                                            />
                                            <input
                                                type="range"
                                                class="form-range position-absolute top-0"
                                                min="0"
                                                max="1000"
                                                value="900"
                                                id="rangeMax"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ----pen -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingPen">
                                    <button
                                        class="btn-link collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapsePen"
                                        aria-expanded="false"
                                        aria-controls="collapsePen"
                                    >
                                        PEN TYPE
                                    </button>
                                </h2>
                                <div
                                    id="collapsePen"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingPen"
                                    data-bs-parent="#customAccordion"
                                >
                                    <div class="accordion-body">
                                        <div class="select-product">
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="check"
                                                    class="me-1"
                                                />
                                                <label for="check"
                                                    >Cleansers (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Cosm"
                                                    class="me-1"
                                                />
                                                <label for="Cosm"
                                                    >Cosmeceuticals (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Exf"
                                                    class="me-1"
                                                />
                                                <label for="Exf"
                                                    >Exfoliators (13)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Fac"
                                                    class="me-1"
                                                />
                                                <label for="Fac"
                                                    >Face Care (19)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Faci"
                                                    class="me-1"
                                                />
                                                <label for="Faci"
                                                    >Facial Oils (3)</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Material -->
                            <div class="accordion-item">
                                <h2
                                    class="accordion-header"
                                    id="headingMaterial"
                                >
                                    <button
                                        class="btn-link text-start collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseMaterial"
                                        aria-expanded="false"
                                        aria-controls="collapseMaterial"
                                    >
                                        MATERIAL
                                    </button>
                                </h2>
                                <div
                                    id="collapseMaterial"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingMaterial"
                                    data-bs-parent="#customAccordion"
                                >
                                    <div class="accordion-body">
                                        <div class="select-product">
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="check"
                                                    class="me-1"
                                                />
                                                <label for="check"
                                                    >Cleansers (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Cosm"
                                                    class="me-1"
                                                />
                                                <label for="Cosm"
                                                    >Cosmeceuticals (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Exf"
                                                    class="me-1"
                                                />
                                                <label for="Exf"
                                                    >Exfoliators (13)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Fac"
                                                    class="me-1"
                                                />
                                                <label for="Fac"
                                                    >Face Care (19)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Faci"
                                                    class="me-1"
                                                />
                                                <label for="Faci"
                                                    >Facial Oils (3)</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Style -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingStyle">
                                    <button
                                        class="btn-link text-start collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseStyle"
                                        aria-expanded="false"
                                        aria-controls="collapseStyle"
                                    >
                                        STYLE
                                    </button>
                                </h2>
                                <div
                                    id="collapseStyle"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingStyle"
                                    data-bs-parent="#customAccordion"
                                >
                                    <div class="accordion-body">
                                        <div class="select-product">
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="check"
                                                    class="me-1"
                                                />
                                                <label for="check"
                                                    >Cleansers (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Cosm"
                                                    class="me-1"
                                                />
                                                <label for="Cosm"
                                                    >Cosmeceuticals (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Exf"
                                                    class="me-1"
                                                />
                                                <label for="Exf"
                                                    >Exfoliators (13)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Fac"
                                                    class="me-1"
                                                />
                                                <label for="Fac"
                                                    >Face Care (19)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Faci"
                                                    class="me-1"
                                                />
                                                <label for="Faci"
                                                    >Facial Oils (3)</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shape -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingShape">
                                    <button
                                        class="btn-link text-start collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseShape"
                                        aria-expanded="false"
                                        aria-controls="collapseShape"
                                    >
                                        SHAPE
                                    </button>
                                </h2>
                                <div
                                    id="collapseShape"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingShape"
                                    data-bs-parent="#customAccordion"
                                >
                                    <div class="accordion-body">
                                        <div class="select-product">
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="check"
                                                    class="me-1"
                                                />
                                                <label for="check"
                                                    >Cleansers (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Cosm"
                                                    class="me-1"
                                                />
                                                <label for="Cosm"
                                                    >Cosmeceuticals (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Exf"
                                                    class="me-1"
                                                />
                                                <label for="Exf"
                                                    >Exfoliators (13)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Fac"
                                                    class="me-1"
                                                />
                                                <label for="Fac"
                                                    >Face Care (19)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Faci"
                                                    class="me-1"
                                                />
                                                <label for="Faci"
                                                    >Facial Oils (3)</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Size -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSize">
                                    <button
                                        class="btn-link text-start collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseSize"
                                        aria-expanded="false"
                                        aria-controls="collapseSize"
                                    >
                                        SIZE
                                    </button>
                                </h2>
                                <div
                                    id="collapseSize"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingSize"
                                    data-bs-parent="#customAccordion"
                                >
                                    <div class="accordion-body">
                                        <div class="select-product">
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="check"
                                                    class="me-1"
                                                />
                                                <label for="check"
                                                    >Cleansers (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Cosm"
                                                    class="me-1"
                                                />
                                                <label for="Cosm"
                                                    >Cosmeceuticals (28)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Exf"
                                                    class="me-1"
                                                />
                                                <label for="Exf"
                                                    >Exfoliators (13)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Fac"
                                                    class="me-1"
                                                />
                                                <label for="Fac"
                                                    >Face Care (19)</label
                                                >
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    id="Faci"
                                                    class="me-1"
                                                />
                                                <label for="Faci"
                                                    >Facial Oils (3)</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div
                            class="titel-section d-flex justify-content-between align-items-center mb-2"
                        >
                            <h3>All Products (90)</h3>
                            <select
                                id="priority-to"
                                class="form-control form-select sorted-by"
                            >
                                <option value="">Sort By</option>
                                <option value="">Select 1</option>
                                <option value="">Select 2</option>
                            </select>
                        </div>
                        <div class="all-product-card">
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (9).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
                                        <span
                                            class="text-muted text-decoration-line-through"
                                            >£3,312.00 Excl. VAT</span
                                        >
                                    </p>
                                    <a
                                        href="./product-details.html"
                                        class="btn btn-outline-primary w-100"
                                        >Add to Basket</a
                                    >
                                </div>
                            </div>
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (22).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
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
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (24).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
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
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (20).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
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
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (21).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
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
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (20).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
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
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (9).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
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
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (9).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
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
                            <div class="all-product">
                                <img
                                    src="/assets/frontend/images/image (9).png"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Colorful Pen</h5>
                                    <p class="m-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted"
                                            >329 review</span
                                        >
                                    </p>
                                    <p
                                        class="vat d-flex align-items-center gap-2"
                                    >
                                        <span class="fw-bold">£3,974.40</span>
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
                        <div class="footer-part mt-3">
                            <ul class="footer-part-pag">
                                <li class="page-item">
                                    <a
                                        class="page-link"
                                        href="cart.html"
                                        aria-label="Previous"
                                    >
                                        <i class="fa-solid fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a
                                        class="page-link"
                                        href="cart.html"
                                        aria-label="Next"
                                    >
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>

<style scoped></style>
