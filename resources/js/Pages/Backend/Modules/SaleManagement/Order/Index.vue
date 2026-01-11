<script setup>
import { ref, onMounted, computed } from "vue";
import AdminLayout from "@/Pages/Backend/Layouts/AdminLayout.vue";
import { Head, usePage, router } from "@inertiajs/vue3";
import FeedbackModal from "@/Pages/Backend/Components/FeedbackModal.vue";
import ConfirmModal from "@/Pages/Backend/Components/ConfirmModal.vue";
import Pagination from "@/Pages/Backend/Components/Pagination.vue";
import { formatDate } from "@/utils/functions.js";
import { Tooltip } from "bootstrap";

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

// Initialize tooltip
onMounted(() => {
    const tooltipElements = document.querySelectorAll('[data-tooltip="true"]');
    tooltipElements.forEach((el) => {
        new Tooltip(el);
    });
});

/**
 * Update Payment Status
 */
function updatePaymentStatus(order) {
    confirmModal.value.show({
        text: "You want to proceed",
        onConfirm: () => {
            router.put(
                `update-payment-status/${order.id}`,
                { payment_status: order.payment_status },
                {
                    onSuccess: () => {
                        feedbackModal.value.show({
                            type: "success",
                            title: "Update Payment Status!",
                            message: page.props.flash.success,
                            autoClose: true,
                            autoCloseDelay: 3000,
                        });
                    },
                    onError: () => {
                        alert("Failed to  Update Payment Status.");
                    },
                }
            );
        },
    });
}

/**
 * Update Order Status
 */
function updateOrderStatus(order) {
    confirmModal.value.show({
        text: "You want to proceed",
        onConfirm: () => {
            router.put(
                `update-order-status/${order.id}`,
                { order_status: order.order_status },
                {
                    onSuccess: () => {
                        feedbackModal.value.show({
                            type: "success",
                            title: "Update Order Status!",
                            message: page.props.flash.success,
                            autoClose: true,
                            autoCloseDelay: 3000,
                        });
                    },
                    onError: () => {
                        alert("Failed to  Update Order Status.");
                    },
                }
            );
        },
    });
}

/**
 * Download Invoice as PDF
 */
async function downloadInvoice(order) {
    try {
        const response = await fetch(`/download-invoice/${order.id}`);

        if (!response.ok) {
            throw new Error("Failed to generate invoice");
        }

        const data = await response.json();

        if (data.success && data.file_url) {
            const fileResponse = await fetch(data.file_url);
            const blob = await fileResponse.blob();

            // Create an object URL for the blob
            const url = window.URL.createObjectURL(blob);

            // Create a hidden link to trigger download (no reload)
            const link = document.createElement("a");
            link.href = url;
            link.download = `invoice_${order.order_no}.pdf`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            // Revoke object URL to free memory
            window.URL.revokeObjectURL(url);
        } else {
            alert(data.message || "Failed to generate invoice.");
        }
    } catch (error) {
        alert(
            error.message || "Something went wrong while generating invoice."
        );
    }
}
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
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Products</th>
                                    <th>Total Price</th>
                                    <th>Payment status</th>
                                    <th>Order status</th>
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
                                            v-html="
                                                order.order_items
                                                    .map(
                                                        (item) =>
                                                            item.product?.title
                                                    )
                                                    .filter(Boolean)
                                                    .join(',<br>') || 'N/A'
                                            "
                                        ></span>
                                    </td>
                                    <td>{{ order.total_price }}</td>
                                    <!-- Payment Status -->
                                    <td>
                                        <select
                                            v-model="order.payment_status"
                                            class="form-select form-select-sm"
                                            :disabled="
                                                order.payment_status === 'paid'
                                            "
                                            @change="updatePaymentStatus(order)"
                                        >
                                            <option value="unpaid">
                                                Unpaid
                                            </option>
                                            <option value="paid">Paid</option>
                                            <option value="refunded">
                                                Refunded
                                            </option>
                                        </select>
                                    </td>
                                    <!-- Order Status -->
                                    <td>
                                        <select
                                            v-model="order.order_status"
                                            class="form-select form-select-sm"
                                            :disabled="
                                                order.order_status ===
                                                'delivered'
                                            "
                                            @change="updateOrderStatus(order)"
                                        >
                                            <option value="pending">
                                                Pending
                                            </option>
                                            <option value="processing">
                                                Processing
                                            </option>
                                            <option value="shipped">
                                                Shipped
                                            </option>
                                            <option value="delivered">
                                                Delivered
                                            </option>
                                            <option value="cancelled">
                                                Cancelled
                                            </option>
                                        </select>
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
                                                class="material-icons icon text-success"
                                                title="Download Invoice"
                                                data-tooltip="true"
                                                role="button"
                                                @click="downloadInvoice(order)"
                                            >
                                                download
                                            </span>
                                            <span
                                                class="material-icons icon text-danger"
                                                title="Delete"
                                                data-tooltip="true"
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
