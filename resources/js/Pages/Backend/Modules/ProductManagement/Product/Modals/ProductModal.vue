<script setup>
import { ref, computed } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";
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

// Refs and Instances
const page = usePage();
const feedbackModal = ref(null);
const fileInputRef = ref(null);
let modalInstance = null;

// Reactive Form
const form = useForm({
    id: "",
    category_id: "",
    sub_category_id: "",
    title: "",
    prod_code: "",
    quantity: "",
    price: "",
    description: "",
    media: null, // file input
});

// Control modal state
const mode = ref("add"); // "add" or "edit"
const selectedCategoryId = ref("");
const productData = ref(null);

// Subcategories filter
const subCategories = computed(() => {
    const category = props.categories.find(
        (c) => c.id === Number(selectedCategoryId.value)
    );
    return category ? category.sub_categories : [];
});

// Show Modal (for Add or Edit)
function show(product = null) {
    const modalEl = document.getElementById("product_modal");
    modalInstance = Modal.getOrCreateInstance(modalEl);

    if (product) {
        mode.value = "edit";
        productData.value = product;
        populateForm(product);
    } else {
        mode.value = "add";
        resetForm();
    }

    modalInstance.show();
}

// Populate form for editing
function populateForm(product) {
    form.id = product.id;
    form.category_id = product.category_id;
    selectedCategoryId.value = product.category_id;
    form.sub_category_id = product.sub_category_id;
    form.title = product.title;
    form.prod_code = product.prod_code;
    form.quantity = product.quantity;
    form.price = product.price;
    form.description = product.description;
    form.media = null;
}

// Reset form for adding
function resetForm() {
    form.reset();
    selectedCategoryId.value = "";
    if (fileInputRef.value) fileInputRef.value.value = null;
}

// Submit handler
function submitProduct() {
    const isEdit = mode.value === "edit";
    const url = isEdit
        ? `/admin/update-product/${form.id}`
        : "/admin/add-product";

    form.post(url, {
        preserveScroll: true,
        onSuccess: () => {
            if (modalInstance) modalInstance.hide();
            feedbackModal.value.show({
                type: "success",
                title: isEdit ? "Product Updated!" : "Product Added!",
                message: page.props.flash.success,
                autoClose: true,
                autoCloseDelay: 3000,
            });
            resetForm();
        },
        onError: () => {
            feedbackModal.value.show({
                type: "error",
                title: "Submission Failed",
                message: "Please check your input fields.",
                autoClose: true,
                autoCloseDelay: 5000,
            });
        },
    });
}

defineExpose({ show });
</script>

<template>
    <div
        class="modal fade"
        id="product_modal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        {{ mode === "edit" ? "Edit Product" : "Add Product" }}
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
                            <div class="col-12 col-md-6">
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
                            <div class="col-12 col-md-6">
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
                            <div class="col-12 col-md-6">
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
                                        placeholder="Enter product title"
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
                                        Product Code
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        v-model="form.prod_code"
                                        placeholder="Enter product code"
                                    />
                                    <div
                                        v-if="form.errors.prod_code"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.prod_code }}
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
                                        placeholder="Enter quantity"
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
                                        placeholder="Enter price"
                                    />
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
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
                            <div class="col-12 col-md-6">
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
                                        rows="2"
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
                        @click="submitProduct"
                    >
                        {{ mode === "edit" ? "Update" : "Save" }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Feedback Modal -->
    <FeedbackModal ref="feedbackModal" />
</template>

<style scoped></style>
