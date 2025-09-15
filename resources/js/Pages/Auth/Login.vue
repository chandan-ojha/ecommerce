<script setup>
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

    <div class="account_pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <img
                                src="/assets/img/seba_logo_bg_white.jpg"
                                alt="Logo"
                                class="logo"
                            />
                        </div>

                        <div class="card-body">
                            <h5 class="title">Sign In</h5>
                            <p class="text">
                                Enter your email address and password to access
                                admin panel.
                            </p>

                            <div
                                v-if="status"
                                class="mb-4 text-sm font-medium text-success"
                            >
                                {{ status }}
                            </div>

                            <form @submit.prevent="submit">
                                <!-- Email -->
                                <div class="mb-4">
                                    <InputLabel
                                        for="email"
                                        value="Email address"
                                    />
                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        v-model="form.email"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        placeholder="Enter your email"
                                    />
                                    <InputError
                                        class="text-danger mt-1"
                                        :message="form.errors.email"
                                    />
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <InputLabel
                                            for="password"
                                            value="Password"
                                            class="form-label"
                                        />
                                        <!-- <small v-if="canResetPassword">
                                            <Link
                                                :href="
                                                    route('password.request')
                                                "
                                                >Forgot your password?</Link
                                            >
                                        </small> -->
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
                                        class="text-danger mt-1"
                                        :message="form.errors.password"
                                    />
                                </div>

                                <!-- Remember me -->
                                <div class="mb-3 form-check">
                                    <Checkbox
                                        id="remember"
                                        v-model:checked="form.remember"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="remember"
                                        >Remember me</label
                                    >
                                </div>

                                <!-- Submit -->
                                <PrimaryButton
                                    type="submit"
                                    class="btn btn_primary"
                                    :class="{
                                        'opacity-25': form.processing,
                                    }"
                                    :disabled="form.processing"
                                >
                                    Log In
                                </PrimaryButton>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="account_footer">
        <p>Copyright &copy; 2025 Seba Today || All Rights Reserved</p>
    </div>
</template>
