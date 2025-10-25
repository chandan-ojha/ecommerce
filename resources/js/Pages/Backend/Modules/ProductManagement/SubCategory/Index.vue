<script setup>
import { ref, computed } from "vue";
import AdminLayout from "@/Pages/Backend/Layouts/AdminLayout.vue";
import { Head, usePage, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import SubCategoryModal from "./Modals/SubCategoryModal.vue";
import FeedbackModal from "@/Pages/Backend/Components/FeedbackModal.vue";
import ConfirmModal from "@/Pages/Backend/Components/ConfirmModal.vue";
import Pagination from "@/Pages/Backend/Components/Pagination.vue";
import { formatDate } from "@/utils/functions.js";

const props = defineProps({
    title: String,
    errors: {
        type: Object,
    },
    sub_categories: {
        type: Object,
        required: true,
    },
    categories: {
        type: Array,
        required: true,
    },
});

const page = usePage();
const subCategoryList = computed(() => props.sub_categories.data ?? []);
const feedbackModal = ref(null);
const confirmModal = ref(null);
const subCategoryModal = ref(null);

/**
 * Sub Category Delete
 */
function deleteSubCategory(id) {
    confirmModal.value.show({
        text: "You want to proceed",
        onConfirm: () => {
            router.delete(`/admin/sub-category/${id}`, {
                onSuccess: () => {
                    feedbackModal.value.show({
                        type: "success",
                        title: "Sub Category removed!",
                        message: page.props.flash.success,
                        autoClose: true,
                        autoCloseDelay: 3000,
                    });
                },
                onError: () => {
                    alert("Failed to delete Sub Category.");
                },
            });
        },
    });
}

/** Open Add Modal */
function addSubCategory() {
    subCategoryModal.value.show();
}

/** Open Edit Modal */
function editSubCategory(subCategory) {
    subCategoryModal.value.show(subCategory);
}
</script>

<template>
    <Head :title="title" />
    <AdminLayout>
        <div class="add_product">
            <div class="product_heading">
                <h3 class="title">Sub Category List</h3>
                <button
                    class="btn btn_primary d-flex align-items-center"
                    @click="addSubCategory"
                >
                    <span class="material-icons add_icon">add</span>
                    Add Sub Category
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
                    <template v-if="subCategoryList.length > 0">
                        <table class="table table-centered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="subCategory in subCategoryList"
                                    :key="subCategory.id"
                                >
                                    <td>
                                        <img
                                            v-if="
                                                subCategory.media &&
                                                subCategory.media.url
                                            "
                                            :src="subCategory.media.url"
                                            alt="Sub Category Image"
                                            class="sub-category-image"
                                        />
                                        <span v-else>N/A</span>
                                    </td>
                                    <td>{{ subCategory.title }}</td>
                                    <td>
                                        {{
                                            subCategory.category?.title || "N/A"
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            subCategory?.created_at
                                                ? formatDate(
                                                      subCategory.created_at
                                                  )
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
                                            <span
                                                class="material-icons icon text-warning"
                                                title="Edit"
                                                role="button"
                                                @click="
                                                    editSubCategory(subCategory)
                                                "
                                            >
                                                drive_file_rename_outline
                                            </span>
                                            <span
                                                class="material-icons icon text-danger"
                                                title="Delete"
                                                role="button"
                                                @click="
                                                    deleteSubCategory(
                                                        subCategory.id
                                                    )
                                                "
                                            >
                                                delete
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :links="sub_categories.links" />
                    </template>
                    <template v-else>
                        <div class="text-center py-5 text-muted">
                            <p class="fs-4 fw-semibold mb-2">
                                No Sub Category Found
                            </p>
                            <p class="fs-6 mb-0">
                                Try creating a new Sub Category to get started.
                            </p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <!-- ===== Sub Category Modal (Add/Edit)  -->
        <SubCategoryModal
            ref="subCategoryModal"
            :errors="props.errors"
            :categories="props.categories"
        />
        <!-- Feedback Modal -->
        <FeedbackModal ref="feedbackModal" />
        <!-- Confirm Modal -->
        <ConfirmModal ref="confirmModal" />
    </AdminLayout>
</template>

<style scoped>
.sub-category-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 999px;
    display: block;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
</style>
