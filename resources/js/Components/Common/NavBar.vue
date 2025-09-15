<script setup>
import { Link, usePage } from "@inertiajs/vue3";
const page = usePage();
const currentLocale = page.props.locale;
</script>

<template>
    <div class="heading">
        <div class="heading_left">
            <div class="menu_icon">
                <span class="material-icons">apps</span>
            </div>
            <div
                class="input-group search_area input-group-sm position-relative"
            >
                <span class="material-icons search_icon">search</span>
                <input
                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm"
                    placeholder="Search"
                />
                <span
                    class="input-group-text btn_primary"
                    id="inputGroup-sizing-sm"
                    >Search</span
                >
            </div>
        </div>
        <div class="heading_right">
            <div class="dropdown">
                <div
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    class="d-flex align-items-center gap-2 pointer"
                >
                    <img
                        :src="
                            currentLocale === 'en'
                                ? 'https://flagcdn.com/w20/us.png'
                                : 'https://flagcdn.com/w20/bd.png'
                        "
                        :alt="currentLocale === 'en' ? 'English' : 'বাংলা'"
                    />
                    <span>
                        {{ currentLocale === "en" ? "English" : "বাংলা" }}
                    </span>
                    <span class="material-icons">expand_more</span>
                </div>
                <ul class="dropdown-menu">
                    <li v-if="currentLocale !== 'en'">
                        <Link
                            :href="route('lang.change', { lang: 'en' })"
                            class="dropdown-item"
                        >
                            <img
                                src="https://flagcdn.com/w20/us.png"
                                alt="English"
                            />
                            <span class="text"> English </span>
                        </Link>
                    </li>
                    <li v-if="currentLocale !== 'bn'">
                        <Link
                            :href="route('lang.change', { lang: 'bn' })"
                            class="dropdown-item"
                        >
                            <img
                                src="https://flagcdn.com/w20/bd.png"
                                alt="Bangla"
                            />
                            <span class="text"> বাংলা </span>
                        </Link>
                    </li>
                </ul>
            </div>
            <div class="user_notification">
                <div class="dropdown">
                    <span
                        class="material-icons"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >notifications</span
                    >
                    <div class="dropdown-menu">
                        <div class="menu_heading">
                            <h6>Notification</h6>
                            <a href="#">Clear All</a>
                        </div>
                        <div class="notification_text">
                            <span class="date">Today</span>
                            <div class="noti_card">
                                <img src="/assets/img/user.jpg" alt="" />
                                <div>
                                    <div
                                        class="d-flex align-items-center gap-2"
                                    >
                                        <h6>Admin</h6>
                                        <span class="time">1 hour ago</span>
                                    </div>
                                    <p>New User registered</p>
                                    <span class="material-icons close_icon"
                                        >close</span
                                    >
                                </div>
                            </div>
                            <div class="noti_card">
                                <img src="/assets/img/user.jpg" alt="" />
                                <div>
                                    <div
                                        class="d-flex align-items-center gap-2"
                                    >
                                        <h6>Admin</h6>
                                        <span class="time">1 hour ago</span>
                                    </div>
                                    <p>New User registered</p>
                                    <span class="material-icons close_icon"
                                        >close</span
                                    >
                                </div>
                            </div>
                            <span class="date">24 JUN 2025</span>
                            <div class="noti_card">
                                <img src="/assets/img/user.jpg" alt="" />
                                <div>
                                    <div
                                        class="d-flex align-items-center gap-2"
                                    >
                                        <h6>Admin</h6>
                                        <span class="time">1 hour ago</span>
                                    </div>
                                    <p>New User registered</p>
                                    <span class="material-icons close_icon"
                                        >close</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user_info">
                <div class="dropdown">
                    <div
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        class="d-flex align-items-center gap-2 pointer"
                    >
                        <img src="/assets/img/user.jpg" alt="" />
                        <div>
                            <h6>James Anderson</h6>
                            <p>Administrator</p>
                        </div>
                    </div>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="material-icons"
                                    >emoji_emotions</span
                                >
                                <span class="text">My Account</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="material-icons">settings</span>
                                <span class="text">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="material-icons">help</span>
                                <span class="text">Support</span>
                            </a>
                        </li>
                        <li>
                            <Link
                                class="dropdown-item"
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                <span class="material-icons">lock</span>
                                <span class="text">Logout</span>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
