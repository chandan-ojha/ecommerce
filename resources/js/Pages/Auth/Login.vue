<script setup>
import FrontendLayout from "@/Pages/Frontend/Layouts/FrontendLayout.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Sign In" />
    <FrontendLayout>
        <section id="login-part">
            <div
                class="login-part-hight d-flex flex-column justify-content-center"
            >
                <div class="container">
                    <div class="login-content">
                        <div class="login-titel text-center mb-4">
                            <h2 class="fw-bold text-primary">Welcome Back</h2>
                            <p class="text-muted small mb-0">
                                Please sign in to continue to your account
                            </p>
                        </div>

                        <div
                            v-if="status"
                            class="mb-3 text-success text-center fw-semibold"
                        >
                            {{ status }}
                        </div>

                        <form @submit.prevent="submit">
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
                                    autofocus
                                    autocomplete="username"
                                    placeholder="Enter your email address"
                                />
                                <InputError
                                    class="text-danger mt-1 small"
                                    :message="form.errors.email"
                                />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <div
                                    class="d-flex justify-content-between align-items-center mb-2"
                                >
                                    <InputLabel
                                        for="password"
                                        value="Password"
                                        class="fw-semibold"
                                    />
                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('password.request')"
                                        class="text-decoration-none small text-primary"
                                    >
                                        Forgot password?
                                    </Link>
                                </div>
                                <TextInput
                                    id="password"
                                    type="password"
                                    class="form-control"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                />
                                <InputError
                                    class="text-danger mt-1 small"
                                    :message="form.errors.password"
                                />
                            </div>

                            <!-- Remember me -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-check text-start">
                                        <Checkbox
                                            id="remember"
                                            v-model:checked="form.remember"
                                        />
                                        <label
                                            for="remember"
                                            class="form-check-label small"
                                        >
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="login-account mb-3">
                                <PrimaryButton
                                    type="submit"
                                    class="btn btn-primary w-100 fw-semibold"
                                    :class="{
                                        'opacity-50': form.processing,
                                    }"
                                    :disabled="form.processing"
                                >
                                    Sign In
                                </PrimaryButton>
                            </div>

                            <!-- Create Account -->
                            <p class="text-center mt-3 small mb-0">
                                Don’t have an account?
                                <Link
                                    href="#"
                                    class="text-primary fw-semibold text-decoration-none"
                                >
                                    Create one
                                </Link>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>

<style scoped></style>
