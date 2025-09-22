<script setup>
import { ref } from "vue";
import { Modal } from "bootstrap";

const emit = defineEmits(["confirmed"]);

const message = ref("You want to proceed");
const modalEl = ref(null);
let modalInstance = null;
let confirmCallback = () => {};
let cancelCallback = () => {};

function show({
    text = "You want to proceed",
    onConfirm = () => {},
    onCancel = () => {},
}) {
    message.value = text;
    confirmCallback = onConfirm;
    cancelCallback = onCancel;

    const modal = new Modal(modalEl.value);
    modal.show();
    modalInstance = modal;
}

function confirm() {
    if (confirmCallback) confirmCallback();
    modalInstance?.hide();
}

function cancel() {
    if (cancelCallback) cancelCallback();
    modalInstance?.hide();
}
defineExpose({ show });
</script>

<template>
    <div
        class="modal fade"
        id="confirmModal"
        tabindex="-1"
        aria-labelledby="confirmModalLabel"
        aria-hidden="true"
        ref="modalEl"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div
                class="modal-content border-0 rounded shadow-sm text-center p-3 compact-modal"
            >
                <!-- Icon -->
                <div class="mb-2">
                    <div class="icon-circle bg-light mx-auto mb-2">
                        <span class="material-icons text-primary fs-2">
                            help
                        </span>
                    </div>
                    <!-- Title -->
                    <h5 class="fw-bold mb-1 text-dark fs-5">Are You Sure?</h5>
                    <!-- Message -->
                    <p class="text-secondary fs-6 mb-0">{{ message }}</p>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <button
                        type="button"
                        class="btn btn-outline-secondary px-4 py-2"
                        data-bs-dismiss="modal"
                        @click="cancel"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        class="btn btn-primary px-4 py-2"
                        @click="confirm"
                    >
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.compact-modal {
    max-width: 360px;
    min-height: 180px;
    margin: auto;
}

.icon-circle {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
