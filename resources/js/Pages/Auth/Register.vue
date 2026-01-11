<script setup>
import FrontendLayout from "@/Pages/Frontend/Layouts/FrontendLayout.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
        default: true,
    },
});

const form = useForm({
    name: "",
    email: "",
    phone: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Create Account" />
    <FrontendLayout>
        <section id="login-part">
            <div
                class="login-part-hight d-flex flex-column justify-content-center"
            >
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8">
                            <div
                                class="card shadow-sm border-0 rounded-4 p-4 p-md-5 bg-white"
                            >
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold text-primary mb-2">
                                        Create Account
                                    </h2>
                                    <p class="text-muted small mb-0">
                                        <span
                                            class="border-bottom border-primary pb-1"
                                        >
                                            Fill in your details to register
                                        </span>
                                    </p>
                                </div>

                                <form @submit.prevent="submit" novalidate>
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <InputLabel
                                            for="name"
                                            value="Full Name"
                                            class="form-label fw-semibold"
                                        />
                                        <TextInput
                                            id="name"
                                            type="text"
                                            class="form-control"
                                            v-model="form.name"
                                            required
                                            autofocus
                                            autocomplete="name"
                                            placeholder="Enter your full name"
                                        />
                                        <InputError
                                            class="text-danger mt-1 small"
                                            :message="form.errors.name"
                                        />
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <InputLabel
                                            for="email"
                                            value="Email Address"
                                            class="form-label fw-semibold"
                                        />
                                        <TextInput
                                            id="email"
                                            type="email"
                                            class="form-control"
                                            v-model="form.email"
                                            required
                                            autocomplete="username"
                                            placeholder="Enter your email"
                                        />
                                        <InputError
                                            class="text-danger mt-1 small"
                                            :message="form.errors.email"
                                        />
                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-3">
                                        <InputLabel
                                            for="phone"
                                            value="Phone Number"
                                            class="form-label fw-semibold"
                                        />
                                        <TextInput
                                            id="phone"
                                            type="text"
                                            class="form-control"
                                            v-model="form.phone"
                                            required
                                            autocomplete="tel"
                                            placeholder="Enter your phone number"
                                        />
                                        <InputError
                                            class="text-danger mt-1 small"
                                            :message="form.errors.phone"
                                        />
                                    </div>

                                    <!-- Password & Confirm Password -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <InputLabel
                                                for="password"
                                                value="Password"
                                                class="form-label fw-semibold"
                                            />
                                            <TextInput
                                                id="password"
                                                type="password"
                                                class="form-control"
                                                v-model="form.password"
                                                required
                                                autocomplete="new-password"
                                                placeholder="Create a password"
                                            />
                                            <InputError
                                                class="text-danger mt-1 small"
                                                :message="form.errors.password"
                                            />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <InputLabel
                                                for="password_confirmation"
                                                value="Confirm Password"
                                                class="form-label fw-semibold"
                                            />
                                            <TextInput
                                                id="password_confirmation"
                                                type="password"
                                                class="form-control"
                                                v-model="
                                                    form.password_confirmation
                                                "
                                                required
                                                autocomplete="new-password"
                                                placeholder="Re-enter your password"
                                            />
                                            <InputError
                                                class="text-danger mt-1 small"
                                                :message="
                                                    form.errors
                                                        .password_confirmation
                                                "
                                            />
                                        </div>
                                    </div>

                                    <!-- Terms -->
                                    <div class="form-check mb-3">
                                        <Checkbox
                                            id="terms"
                                            v-model:checked="form.terms"
                                            class="form-check-input"
                                        />
                                        <label
                                            for="terms"
                                            class="form-check-label small text-muted"
                                        >
                                            I agree to the
                                            <Link
                                                href="#"
                                                class="text-primary fw-semibold text-decoration-none"
                                            >
                                                Terms & Conditions
                                            </Link>
                                        </label>
                                        <InputError
                                            class="text-danger mt-1 small d-block"
                                            :message="form.errors.terms"
                                        />
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid mb-3">
                                        <PrimaryButton
                                            type="submit"
                                            class="btn btn-primary fw-semibold py-2"
                                            :class="{
                                                'opacity-50': form.processing,
                                            }"
                                            :disabled="form.processing"
                                        >
                                            Create Account
                                        </PrimaryButton>
                                    </div>

                                    <!-- Login Link -->
                                    <p
                                        class="text-center mt-3 small text-muted mb-0"
                                    >
                                        Already have an account?
                                        <Link
                                            v-if="canLogin"
                                            :href="route('login')"
                                            class="text-primary fw-semibold text-decoration-none"
                                        >
                                            Sign in
                                        </Link>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>
