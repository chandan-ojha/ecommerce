<script setup>
import { ref, computed } from "vue";
import { useForm, usePage, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import FeedbackModal from "@/Components/Common/FeedbackModal.vue";

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

const form = useForm({
    category_id: "",
    title: "",
});

/**
 * Add Sub Category
 */
function addSubCategory() {
    form.post("/add-sub-category", {
        preserveScroll: true,
        onSuccess: () => {
            const modalEl = document.getElementById("addSubCategoryModal");
            const modalInstance = Modal.getInstance(modalEl);
            if (modalInstance) {
                modalInstance.hide();
            }
            // Show success message
            feedbackModal.value.show({
                type: "success",
                title: "Sub Category Added!",
                message: page.props.flash.success,
                autoClose: true,
                autoCloseDelay: 3000,
            });
            // Reset form
            form.reset();
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
        id="addSubCategoryModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Add Sub Category
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
                                        v-model="form.category_id"
                                    >
                                        <option value="">Select</option>
                                        <option
                                            v-for="category in props.categories"
                                            :key="category.id"
                                            :value="category.id"
                                        >
                                            {{ category.title }}
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
                                        Sub Category Title
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
                        @click="addSubCategory"
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
