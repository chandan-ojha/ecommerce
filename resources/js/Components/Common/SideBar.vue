<script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
const label = page.props.sidebarTranslations;
</script>

<template>
    <div class="sidebar">
        <div class="logo">
            <img src="/assets/backend/img/seba_logo_bg_white.jpg" alt="" />
        </div>
        <div class="menu_list">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <Link
                            :href="route('dashboard')"
                            as="button"
                            class="accordion-button no_dropdown"
                        >
                            <div class="icon">
                                <span class="material-icons">home</span>
                            </div>
                            <div class="text">
                                {{ label.dashboard }}
                            </div>
                        </Link>
                    </h2>
                </div>
                <!-- Product -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                        >
                            <div class="icon">
                                <span class="material-icons">inventory_2</span>
                            </div>
                            <div class="text">{{ label.product }}</div>
                        </button>
                    </h2>
                    <div
                        id="collapseTwo"
                        class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body p-0">
                            <ul class="second_label_menu">
                                <li>
                                    <Link
                                        :href="route('category.index')"
                                        class="nav-link"
                                    >
                                        {{ label.category }}
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('sub.category.index')"
                                        class="nav-link"
                                    >
                                        {{ label.subcategory }}
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('product.index')"
                                        class="nav-link"
                                    >
                                        {{ label.product_list }}
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Reports -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseFive"
                            aria-expanded="false"
                            aria-controls="collapseFive"
                        >
                            <div class="icon">
                                <span class="material-icons">assessment</span>
                            </div>
                            <div class="text">
                                {{ label.reports }}
                            </div>
                        </button>
                    </h2>
                    <div
                        id="collapseFive"
                        class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body p-0">
                            <ul class="second_label_menu">
                                <li>Order Summary</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Settings -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseSix"
                            aria-expanded="false"
                            aria-controls="collapseSix"
                        >
                            <div class="icon">
                                <span class="material-icons"> settings </span>
                            </div>
                            <div class="text">
                                {{ label.settings }}
                            </div>
                        </button>
                    </h2>
                    <div
                        id="collapseSix"
                        class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body p-0">
                            <ul class="second_label_menu">
                                <li>{{ label.general_settings }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- User Management -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven"
                            aria-expanded="false"
                            aria-controls="collapseSeven"
                        >
                            <div class="icon">
                                <span class="material-icons"> group </span>
                            </div>
                            <div class="text">{{ label.user_management }}</div>
                        </button>
                    </h2>
                    <div
                        id="collapseSeven"
                        class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body p-0">
                            <ul class="second_label_menu">
                                <li>
                                    <Link
                                        :href="route('user.index')"
                                        class="nav-link"
                                    >
                                        {{ label.users }}
                                    </Link>
                                </li>
                                <li>{{ label.roles }}</li>
                                <li>{{ label.permissions }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="version_info">
            <span>Version: 1.0.0</span>
        </div>
    </div>
</template>

<style scoped></style>
