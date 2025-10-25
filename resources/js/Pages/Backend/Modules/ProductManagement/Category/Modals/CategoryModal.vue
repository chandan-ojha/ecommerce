<script setup>
import { ref, computed } from "vue";
import { useForm, usePage, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import FeedbackModal from "@/Pages/Backend/Components/FeedbackModal.vue";

const props = defineProps({
    errors: {
        type: Object,
    },
});

const page = usePage();
const feedbackModal = ref(null);
const fileInputRef = ref(null);
let modalInstance = null;

const form = useForm({
    title: "",
    media: null, // file input
});

// Control modal state
const mode = ref("add"); // "add" or "edit"
const categoryData = ref(null);

// Show Modal (for Add or Edit)
function show(category = null) {
    const modalEl = document.getElementById("category_modal");
    modalInstance = Modal.getOrCreateInstance(modalEl);

    if (category) {
        mode.value = "edit";
        categoryData.value = category;
        populateForm(category);
    } else {
        mode.value = "add";
        resetForm();
    }

    modalInstance.show();
}

// Populate form for editing
function populateForm(category) {
    form.id = category.id;
    form.title = category.title;
    form.media = null;
}

// Reset form for adding
function resetForm() {
    form.reset();
    if (fileInputRef.value) fileInputRef.value.value = null;
}

/**
 * Submit handler
 */
function submitCategory() {
    const isEdit = mode.value === "edit";
    const url = isEdit
        ? `/admin/update-category/${form.id}`
        : "/admin/add-category";

    form.post(url, {
        preserveScroll: true,
        onSuccess: () => {
            if (modalInstance) modalInstance.hide();
            feedbackModal.value.show({
                type: "success",
                title: isEdit ? "Category Updated!" : "Category Added!",
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
        id="category_modal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Add Category
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
                                        Category Title
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        v-model="form.title"
                                        placeholder="Enter Title"
                                    />
                                    <div
                                        v-if="form.errors.title"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">
                                    Upload Category Image
                                </label>
                                <input
                                    class="form-control"
                                    type="file"
                                    id="formFile"
                                    ref="fileInputRef"
                                    @change="
                                        (e) => (form.media = e.target.files[0])
                                    "
                                />
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
                        @click="submitCategory"
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
