<script setup>
import { ref, computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
const user = page.props.auth?.user || null;
const cart = computed(() => page.props.cart ?? null);
</script>

<template>
    <header id="header-part">
        <div class="topbar-menu-area">
            <div class="topbar-menu">
                <h5>BLACK FRIDAY IS LIVE! PURCHASE 20 ITEMS AND GET 5% OFF</h5>
                <p>
                    Grab the Offer
                    <span class="material-icons"> chevron_right </span>
                </p>
            </div>
        </div>

        <div class="container">
            <div class="nav-search-part">
                <div class="header-content">
                    <div class="main-info-area">
                        <div class="wrap-logo-top left-section">
                            <a href="index.html" class="link-to-home"
                                ><img
                                    src="/assets/frontend/images/image 18.png"
                            /></a>
                        </div>
                        <div class="wrap-search-form">
                            <input
                                type="text"
                                name="search"
                                value=""
                                placeholder="Search Products..."
                            />
                            <span class="material-icons">search</span>
                        </div>
                    </div>
                    <div class="item-list">
                        <ul>
                            <li>Most Popular</li>
                            <li>Best Selling’s</li>
                            <li>Hot Items</li>
                        </ul>
                    </div>
                </div>
                <div class="login-part">
                    <Link :href="route('cart.view')">
                        <div class="position-relative d-inline-block me-3">
                            <!-- Cart Icon -->
                            <span class="material-icons fs-3 text-dark"
                                >shopping_cart</span
                            >
                            <span
                                v-if="cart.data.count > 0"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            >
                                {{ cart.data.count }}
                                <span class="visually-hidden">cart items</span>
                            </span>
                        </div>
                    </Link>

                    <!-- If user is logged in -->
                    <template v-if="user">
                        <!-- User Profile Dropdown -->
                        <div class="dropdown profile-img">
                            <a
                                class="d-inline-block"
                                id="profileDropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <img
                                    :src="`https://ui-avatars.com/api/?name=${encodeURIComponent(
                                        user.name
                                    )}&background=FFB84D&color=000&size=40`"
                                    class="rounded-circle"
                                    alt="Profile"
                                    width="45"
                                    height="45"
                                />
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end shadow p-2"
                                aria-labelledby="profileDropdown"
                                style="min-width: 225px"
                            >
                                <div class="d-flex align-items-center mb-3">
                                    <img
                                        :src="`https://ui-avatars.com/api/?name=${encodeURIComponent(
                                            user.name
                                        )}&background=FFB84D&color=000&size=40`"
                                        class="rounded-circle me-2"
                                        alt="Profile"
                                        width="60"
                                        height="60"
                                    />
                                    <div class="text-start">
                                        <h6 class="mb-0">
                                            {{ user.name || "" }}
                                        </h6>
                                        <small class="text-muted">
                                            {{ user.role || "" }}
                                        </small>
                                    </div>
                                </div>
                                <a
                                    class="dropdown-item d-flex align-items-center gap-2 ps-2"
                                >
                                    <span class="material-icons">person</span>
                                    My Account
                                </a>
                                <a
                                    class="dropdown-item d-flex align-items-center gap-2 ps-2"
                                    :href="route('admin.dashboard')"
                                    target="_blank"
                                    v-if="user.role === 'Admin'"
                                >
                                    <span class="material-icons">
                                        admin_panel_settings
                                    </span>
                                    Admin Panel
                                </a>
                                <div class="dropdown-divider"></div>
                                <Link
                                    :href="route('logout')"
                                    method="post"
                                    class="dropdown-item d-flex align-items-center gap-2 ps-2 pt-2 pb-2"
                                >
                                    <span class="material-icons">logout</span>
                                    Logout
                                </Link>
                            </div>
                        </div>
                    </template>

                    <!-- If user not logged in -->
                    <template v-else>
                        <Link :href="route('login')">
                            <button class="btn-login">Login</button>
                        </Link>
                        <Link :href="route('register')">
                            <button class="btn-register">Register</button>
                        </Link>
                    </template>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container d-flex justify-content-between">
                    <div>
                        <ul class="navbar-items navbar-nav">
                            <li class="nav-item">
                                <Link
                                    class="nav-link active"
                                    aria-current="page"
                                    :href="route('home')"
                                    >Home Page
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    class="nav-link"
                                    :href="route('products')"
                                >
                                    Browse Products
                                </Link>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="pagesDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Category
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="pagesDropdown"
                                >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="contact.html"
                                            >Contact</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="order-list.html"
                                            >Order-List</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="cart.html"
                                            >Cart</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="delivery-information.html"
                                            >Delivery</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >404 Page</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Exclusive Deals</a>
                            </li>
                            <li class="nav-item get-offer">
                                <a class="nav-link" href="#">BUY GET OFFER</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-right d-flex align-items-center gap-4">
                        <span>Track Order</span>
                        <span>Helpline</span>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<style scoped></style>
