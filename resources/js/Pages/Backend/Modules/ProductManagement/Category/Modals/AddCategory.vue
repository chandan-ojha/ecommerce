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

const form = useForm({
    title: "",
});

/**
 * Add Category
 */
function addCategory() {
    form.post("/add-category", {
        preserveScroll: true,
        onSuccess: () => {
            const modalEl = document.getElementById("add_category_modal");
            const modalInstance = Modal.getInstance(modalEl);
            if (modalInstance) {
                modalInstance.hide();
            }
            // Show success message
            feedbackModal.value.show({
                type: "success",
                title: "Category Added!",
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
        id="add_category_modal"
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
                        @click="addCategory"
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
