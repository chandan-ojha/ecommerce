<script setup>
import { ref, computed } from "vue";
import AdminLayout from "@/Pages/Backend/Layouts/AdminLayout.vue";
import { Head, usePage, router } from "@inertiajs/vue3";
import FeedbackModal from "@/Pages/Backend/Components/FeedbackModal.vue";
import ConfirmModal from "@/Pages/Backend/Components/ConfirmModal.vue";
import Pagination from "@/Pages/Backend/Components/Pagination.vue";
import { formatDate } from "@/utils/functions.js";

const props = defineProps({
    title: String,
    errors: Object,
    orders: {
        type: Object,
        required: true,
    },
});

const page = usePage();
const orderList = computed(() => props.orders.data ?? []);
const feedbackModal = ref(null);
const confirmModal = ref(null);
</script>

<template>
    <Head :title="title" />
    <AdminLayout>
        <div class="add_product">
            <div class="product_heading">
                <h3 class="title">Order List</h3>
            </div>
            <div class="product_content">
                <div class="table_responsive mt-4">
                    <div class="table_heading">
                        <div class="d-flex align-items-center gap-1">
                            <select
                                name=""
                                id=""
                                class="form-control form-select"
                            >
                                <option value="" selected>10</option>
                                <option value="">20</option>
                                <option value="">30</option>
                            </select>
                            <label for="">Entries per page</label>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <label for="">Search</label>
                            <input
                                type="search"
                                name=""
                                id=""
                                class="form-control"
                            />
                        </div>
                    </div>
                    <template v-if="orderList.length > 0">
                        <table class="table table-centered">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Products</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(order, index) in orderList"
                                    :key="order.id"
                                >
                                    <td>{{ order.order_no }}</td>
                                    <td>{{ order.user?.name || "N/A" }}</td>
                                    <td>
                                        {{ order.user_address?.phone || "N/A" }}
                                    </td>
                                    <td>
                                        {{ order.user_address?.city || "N/A" }}
                                    </td>
                                    <td style="max-width: 250px">
                                        <span
                                            :title="
                                                order.order_items
                                                    .map(
                                                        (item) =>
                                                            item.product?.title
                                                    )
                                                    .filter(Boolean)
                                                    .join(', ')
                                            "
                                        >
                                            {{
                                                order.order_items
                                                    .map(
                                                        (item) =>
                                                            item.product?.title
                                                    )
                                                    .filter(Boolean)
                                                    .join(", ") || "N/A"
                                            }}
                                        </span>
                                    </td>

                                    <td>{{ order.total_price }}</td>
                                    <td>
                                        <span
                                            :class="[
                                                'badge',
                                                order.order_status === 'paid'
                                                    ? 'bg-success'
                                                    : 'bg-warning',
                                            ]"
                                        >
                                            {{ order.order_status }}
                                        </span>
                                    </td>
                                    <td>
                                        {{
                                            order?.created_at
                                                ? formatDate(order.created_at)
                                                : "-"
                                        }}
                                    </td>
                                    <td>
                                        <div
                                            class="d-flex align-items-center gap-1 justify-content-end"
                                        >
                                            <span
                                                class="material-icons icon text-primary"
                                                title="View"
                                                role="button"
                                            >
                                                visibility
                                            </span>
                                            <!-- <span
                                                class="material-icons icon text-warning"
                                                title="Edit"
                                                role="button"
                                            >
                                                drive_file_rename_outline
                                            </span> -->
                                            <span
                                                class="material-icons icon text-danger"
                                                title="Delete"
                                                role="button"
                                            >
                                                delete
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :links="orders.links" />
                    </template>
                    <template v-else>
                        <div class="text-center py-5 text-muted">
                            <p class="fs-4 fw-semibold mb-2">No Orders Found</p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <!-- Feedback Modal -->
        <FeedbackModal ref="feedbackModal" />
        <!-- Confirm Modal -->
        <ConfirmModal ref="confirmModal" />
    </AdminLayout>
</template>

<style scoped></style>
