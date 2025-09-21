<script setup>
import { ref, computed } from "vue";
import { useForm, usePage, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import FeedbackModal from "@/Components/Common/FeedbackModal.vue";

const props = defineProps({
    errors: {
        type: Object,
    },
    roles: {
        type: Array,
        required: true,
    },
});

const page = usePage();
const feedbackModal = ref(null);

const form = useForm({
    name: "",
    email: "",
    password: "",
    role_id: "",
});

/**
 * User Add
 */
function addUser() {
    form.post("/add-user", {
        preserveScroll: true,
        onSuccess: () => {
            const modalEl = document.getElementById("add_user_modal");
            const modalInstance = Modal.getInstance(modalEl);
            if (modalInstance) {
                modalInstance.hide();
            }
            // Show success message
            feedbackModal.value.show({
                type: "success",
                title: "User Added!",
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
        id="add_user_modal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Add User
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
                                        Name
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        v-model="form.name"
                                        placeholder="Enter Name"
                                    />
                                    <div
                                        v-if="form.errors.name"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                    >
                                        Email
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        v-model="form.email"
                                        placeholder="Enter Email"
                                    />
                                    <div
                                        v-if="form.errors.email"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.email }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                    >
                                        Password
                                    </label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        v-model="form.password"
                                        placeholder="Enter Password"
                                    />
                                    <div
                                        v-if="form.errors.password"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.password }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                    >
                                        Role
                                    </label>
                                    <select
                                        class="form-select form-control"
                                        aria-label="Default select example"
                                        v-model="form.role_id"
                                    >
                                        <option value="">Select</option>
                                        <option
                                            v-for="role in props.roles"
                                            :key="role.id"
                                            :value="role.id"
                                        >
                                            {{ role.name }}
                                        </option>
                                    </select>
                                    <div
                                        v-if="form.errors.role_id"
                                        class="text-danger text-sm mt-1"
                                    >
                                        {{ form.errors.role_id }}
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
                        @click="addUser"
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
