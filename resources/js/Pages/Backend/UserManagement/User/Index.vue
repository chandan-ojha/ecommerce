<script setup>
import { ref, computed } from "vue";
import Dashboard from "@/Pages/Backend/Dashboard/Dashboard.vue";
import { Head, usePage, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import AddUser from "./Modals/AddUser.vue";
import FeedbackModal from "@/Components/Common/FeedbackModal.vue";
import ConfirmModal from "@/Components/Common/ConfirmModal.vue";
import Pagination from "@/Components/Common/Pagination.vue";

const props = defineProps({
    title: String,
    errors: {
        type: Object,
    },
    users: {
        type: Object,
        required: true,
    },
    roles: {
        type: Array,
        required: true,
    },
});

const page = usePage();
const userList = computed(() => props.users.data ?? []);
const feedbackModal = ref(null);
const confirmModal = ref(null);

/**
 * Delete User
 */
function deleteUser(id) {
    confirmModal.value.show({
        text: "You want to proceed",
        onConfirm: () => {
            router.delete(`/user/${id}`, {
                onSuccess: () => {
                    feedbackModal.value.show({
                        type: "success",
                        title: "User removed!",
                        message: page.props.flash.success,
                        autoClose: true,
                        autoCloseDelay: 3000,
                    });
                },
                onError: () => {
                    alert("Failed to delete User.");
                },
            });
        },
    });
}
</script>

<template>
    <Head :title="title" />
    <Dashboard>
        <div class="add_product">
            <div class="product_heading">
                <h3 class="title">User List</h3>
                <button
                    class="btn btn_primary d-flex align-items-center"
                    data-bs-toggle="modal"
                    data-bs-target="#add_user_modal"
                >
                    <span class="material-icons add_icon">add</span>
                    Add User
                </button>
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
                    <template v-if="userList.length > 0">
                        <table class="table table-centered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in userList" :key="user.id">
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>
                                        {{
                                            user.roles?.length
                                                ? user.roles
                                                      .map((r) => r.name)
                                                      .join(", ")
                                                : "N/A"
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
                                            <span
                                                class="material-icons icon text-warning"
                                                title="Edit"
                                                data-bs-toggle="modal"
                                                data-bs-target="#add_product_modal"
                                            >
                                                drive_file_rename_outline
                                            </span>
                                            <span
                                                class="material-icons icon text-danger"
                                                title="Delete"
                                                role="button"
                                                @click="deleteUser(user.id)"
                                            >
                                                delete
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :links="users.links" />
                    </template>
                    <template v-else>
                        <div class="text-center py-5 text-muted">
                            <p class="fs-4 fw-semibold mb-2">No User Found</p>
                            <p class="fs-6 mb-0">
                                Try creating a new User to get started.
                            </p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <!-- ===== Add User Modal -->
        <AddUser :errors="props.errors" :roles="props.roles" />
        <!-- Feedback Modal -->
        <FeedbackModal ref="feedbackModal" />
        <!-- Confirm Modal -->
        <ConfirmModal ref="confirmModal" />
    </Dashboard>
</template>

<style scoped></style>
