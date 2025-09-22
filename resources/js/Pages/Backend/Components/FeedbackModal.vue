<script setup>
import { ref, computed } from "vue";
import { Modal } from "bootstrap";

const modalRef = ref(null);
const modalType = ref("success");
const modalMessage = ref("");
const modalTitle = ref("");

const show = ({
    type = "success",
    title = type === "success" ? "Success" : "Error",
    message = "",
    autoClose = true,
    autoCloseDelay = 3000,
}) => {
    modalType.value = type;
    modalMessage.value = message;
    modalTitle.value = title;

    const modalInstance = new Modal(modalRef.value);
    modalInstance.show();

    if (autoClose) {
        setTimeout(() => {
            modalInstance.hide();
        }, autoCloseDelay);
    }
};

defineExpose({ show });

const icon = computed(() => {
    return modalType.value === "success"
        ? { icon: "bi-check-circle-fill", color: "text-success" }
        : { icon: "bi-x-circle-fill", color: "text-danger" };
});

const titleClass = computed(() =>
    modalType.value === "success" ? "text-success" : "text-danger"
);
</script>

<template>
    <div
        class="modal fade"
        ref="modalRef"
        tabindex="-1"
        aria-labelledby="feedbackModalTitle"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div
                class="modal-content border-0 shadow-lg rounded-4 animate__animated animate__fadeInDown"
            >
                <div class="modal-body text-center p-5">
                    <div class="mb-3">
                        <i :class="`bi ${icon.icon} ${icon.color} fs-1`"></i>
                    </div>
                    <h5
                        id="feedbackModalTitle"
                        class="modal-title mb-2 fw-semibold"
                        :class="titleClass"
                    >
                        {{ modalTitle }}
                    </h5>
                    <p class="text-muted">{{ modalMessage }}</p>
                    <button
                        type="button"
                        class="btn btn-success px-4 mt-3"
                        data-bs-dismiss="modal"
                    >
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* @import "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"; */

.modal-dialog {
    max-width: 350px; /* reduce modal width */
    width: 100%;
    max-height: 70vh; /* limit modal height */
}

.modal-content {
    transition: all 0.3s ease-in-out;
    max-height: 70vh;
    overflow-y: auto; /* scroll inside if content taller */
}

/* .modal-body i {
    transition: transform 0.3s ease;
}

.modal-body i:hover {
    transform: scale(1.1);
} */
</style>
