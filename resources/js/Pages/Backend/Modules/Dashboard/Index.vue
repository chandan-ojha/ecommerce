<script setup>
import AdminLayout from "@/Pages/Backend/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
import { onMounted } from "vue";

const props = defineProps({
    title: String,
    role: String,
});

// Chart rendering
onMounted(() => {
    const script = document.createElement("script");
    script.src = "https://cdn.jsdelivr.net/npm/chart.js";
    script.onload = () => {
        const chart2 = document.getElementById("myChart2");
        const chart3 = document.getElementById("myChart3");

        new Chart(chart2, {
            type: "bar",
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        new Chart(chart3, {
            type: "line",
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    };

    document.head.appendChild(script);
});
</script>

<template>
    <Head :title="title" />
    <AdminLayout>
        <div class="row">
            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6">
                <div class="custom_card">
                    <div
                        class="d-flex align-items-start justify-content-between"
                    >
                        <span class="card_title">Customers</span>
                        <span class="material-icons card_icon">people_alt</span>
                    </div>
                    <h3 class="card_number">36,254</h3>
                    <div class="d-flex align-items-center gap-4">
                        <p class="card_percentage">
                            <span class="material-icons arrow_up"
                                >ramp_left</span
                            >
                            7.00%
                        </p>
                        <span class="last">Since last month</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6">
                <div class="custom_card">
                    <div
                        class="d-flex align-items-start justify-content-between"
                    >
                        <span class="card_title">Teams</span>
                        <span class="material-icons card_icon">people_alt</span>
                    </div>
                    <h3 class="card_number">36,254</h3>
                    <div class="d-flex align-items-center gap-4">
                        <p class="card_percentage">
                            <span class="material-icons arrow_up"
                                >ramp_left</span
                            >
                            7.00%
                        </p>
                        <span class="last">Since last month</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6">
                <div class="custom_card">
                    <div
                        class="d-flex align-items-start justify-content-between"
                    >
                        <span class="card_title">Projects</span>
                        <span class="material-icons card_icon">people_alt</span>
                    </div>
                    <h3 class="card_number">36,254</h3>
                    <div class="d-flex align-items-center gap-4">
                        <p class="card_percentage">
                            <span class="material-icons arrow_up"
                                >ramp_left</span
                            >
                            7.00%
                        </p>
                        <span class="last">Since last month</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6">
                <div class="custom_card">
                    <div
                        class="d-flex align-items-start justify-content-between"
                    >
                        <span class="card_title">Vendors</span>
                        <span class="material-icons card_icon">people_alt</span>
                    </div>
                    <h3 class="card_number">36,254</h3>
                    <div class="d-flex align-items-center gap-4">
                        <p class="card_percentage">
                            <span class="material-icons arrow_up"
                                >ramp_left</span
                            >
                            7.00%
                        </p>
                        <span class="last">Since last month</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6">
                <div class="custom_card">
                    <div
                        class="d-flex align-items-start justify-content-between"
                    >
                        <span class="card_title">Lands</span>
                        <span class="material-icons card_icon">people_alt</span>
                    </div>
                    <h3 class="card_number">36,254</h3>
                    <div class="d-flex align-items-center gap-4">
                        <p class="card_percentage">
                            <span class="material-icons arrow_up"
                                >ramp_left</span
                            >
                            7.00%
                        </p>
                        <span class="last">Since last month</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6">
                <div class="custom_card">
                    <div
                        class="d-flex align-items-start justify-content-between"
                    >
                        <span class="card_title">Customers</span>
                        <span class="material-icons card_icon">people_alt</span>
                    </div>
                    <h3 class="card_number">36,254</h3>
                    <div class="d-flex align-items-center gap-4">
                        <p class="card_percentage">
                            <span class="material-icons arrow_up"
                                >ramp_left</span
                            >
                            7.00%
                        </p>
                        <span class="last">Since last month</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6">
                <div class="custom_card">
                    <div
                        class="d-flex align-items-start justify-content-between"
                    >
                        <span class="card_title">Customers</span>
                        <span class="material-icons card_icon">people_alt</span>
                    </div>
                    <h3 class="card_number">36,254</h3>
                    <div class="d-flex align-items-center gap-4">
                        <p class="card_percentage">
                            <span class="material-icons arrow_up"
                                >ramp_left</span
                            >
                            7.00%
                        </p>
                        <span class="last">Since last month</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6">
                <div class="custom_card">
                    <div
                        class="d-flex align-items-start justify-content-between"
                    >
                        <span class="card_title">Customers</span>
                        <span class="material-icons card_icon">people_alt</span>
                    </div>
                    <h3 class="card_number">36,254</h3>
                    <div class="d-flex align-items-center gap-4">
                        <p class="card_percentage">
                            <span class="material-icons arrow_up"
                                >ramp_left</span
                            >
                            7.00%
                        </p>
                        <span class="last">Since last month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="custom_card">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom_card">
                    <canvas id="myChart3"></canvas>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped></style>
