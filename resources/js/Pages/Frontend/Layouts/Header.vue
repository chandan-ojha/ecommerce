<script setup>
import { Link, usePage } from "@inertiajs/vue3";
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
                    <span class="material-icons">shopping_cart</span>
                    <Link :href="route('login')">
                        <button class="btn-login">Login</button>
                    </Link>
                    <a href="register.html">
                        <button class="btn-register">Register</button>
                    </a>
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
