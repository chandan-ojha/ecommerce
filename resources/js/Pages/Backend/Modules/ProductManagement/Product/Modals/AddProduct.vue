<script setup>
import { ref, computed, watch } from "vue";
import { useForm, usePage, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import FeedbackModal from "@/Pages/Backend/Components/FeedbackModal.vue";

const props = defineProps({
    errors: {
        type: Object,
    },
    categories: {
        type: Array,
        required: true,
    },
});

const page = usePage();
const feedbackModal = ref(null);
const fileInputRef = ref(null);

const form = useForm({
    category_id: "",
    sub_category_id: "",
    title: "",
    quantity: "",
    price: "",
    description: "",
    media: null, // file input
});

// Selected category for filtering subcategories
const selectedCategoryId = ref("");

const subCategories = computed(() => {
    const category = props.categories.find(
        (c) => c.id === Number(selectedCategoryId.value)
    );
    return category ? category.sub_categories : [];
});

/**
 * Product Add
 */
function productAdd() {
    form.post("/admin/add-product", {
        preserveScroll: true,
        onSuccess: () => {
            const modalEl = document.getElementById("add_product_modal");
            const modalInstance = Modal.getInstance(modalEl);
            if (modalInstance) {
                modalInstance.hide();
            }
            // Show success message
            feedbackModal.value.show({
                type: "success",
                title: "Project Added!",
                message: page.props.flash.success,
                autoClose: true,
                autoCloseDelay: 3000,
            });
            // Reset form
            form.reset();
            // Clear file input
            if (fileInputRef.value) {
                fileInputRef.value.value = null;
            }
        },
        onError: () => {
            // Show error message
            feedbackModal.value.show({
                type: "error",
                title: "Submission Failed",
                message: props.errors.body,
                autoClose: true,
                autoCloseDelay: 5000,
            });
        },
    });
}
</script>

<template>
    <div
        class="modal fade"
        id="add_product_modal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Add Product
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                    >
                                        Category
                                    </label>
                                    <select
                                        class="form-select form-control"
                                        aria-label="Default select example"
                                        v-model="selectedCategoryId"
                                        @change="
                                            form.category_id =
                                                selectedCategoryId
                                        "
                                    >
                                        <option value="">Select</option>
                                        <option
                                            v-for="cat in props.categories"
                                            :key="cat.id"
                                            :value="cat.id"
                                        >
                                            {{ cat.title }}
                                        </option>
                                    </select>
                                    <div
                                        v-if="form.errors.category_id"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.category_id }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                    >
                                        Sub Category
                                    </label>
                                    <select
                                        class="form-select form-control"
                                        aria-label="Default select example"
                                        v-model="form.sub_category_id"
                                    >
                                        <option value="">Select</option>
                                        <option
                                            v-for="sub_cat in subCategories"
                                            :key="sub_cat.id"
                                            :value="sub_cat.id"
                                        >
                                            {{ sub_cat.title }}
                                        </option>
                                    </select>
                                    <div
                                        v-if="form.errors.sub_category_id"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.sub_category_id }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                    >
                                        Product Title
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        v-model="form.title"
                                        placeholder="Enter product"
                                    />
                                    <div
                                        v-if="form.errors.title"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.title }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                    >
                                        Quantity
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        v-model="form.quantity"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                    >
                                        Price
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        v-model="form.price"
                                        placeholder=""
                                    />
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">
                                        Upload Product Image
                                    </label>
                                    <input
                                        class="form-control"
                                        type="file"
                                        id="formFile"
                                        ref="fileInputRef"
                                        @change="
                                            (e) =>
                                                (form.media = e.target.files[0])
                                        "
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlTextarea1"
                                        class="form-label"
                                    >
                                        Description
                                    </label>
                                    <textarea
                                        class="form-control"
                                        id="exampleFormControlTextarea1"
                                        rows="3"
                                        v-model="form.description"
                                        placeholder="Write description here.."
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn_cancel"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button
                        type="button"
                        class="btn btn_primary"
                        @click="productAdd"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Feedback Modal -->
    <FeedbackModal ref="feedbackModal" />
</template>

<style scoped></style>
