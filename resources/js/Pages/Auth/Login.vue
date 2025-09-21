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
                                src="/assets/backend/img/seba_logo_bg_white.jpg"
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

<style scoped>
.account_pages {
    background-image: linear-gradient(to top, #accbee 0%, #e7f0fd 100%);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.account_pages .card .card-header {
    background-color: #727cf5;
    text-align: center;
    padding: 25px;
}
.account_pages .card .card-header .logo {
    height: 20px;
    margin: 0 auto;
}
.account_pages .card .card-body {
    padding: 0 40px 60px;
}
.account_pages .card .card-body .title {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    margin: 40px 0 10px;
    color: #6c757d;
}
.account_pages .card .card-body .text {
    font-size: 14px;
    text-align: center;
    color: #8a969c;
    width: 75%;
    margin: auto;
    margin-bottom: 30px;
}
.account_pages .card .card-body .form-label {
    color: #6c757d;
    font-weight: 600;
}
.account_pages .card .card-body .form-check-label {
    color: #6c757d;
    font-weight: 600;
}
.account_pages .card .card-body .form-check-label a {
    color: #6c757d;
    text-decoration: none;
}
.account_pages .card .card-body .form-check-label a:hover {
    text-decoration: underline;
}
.account_pages .card .card-body .btn_primary {
    margin: auto;
    display: block;
}
.account_pages .card .card-body small a {
    color: #6c757d;
    font-size: 14px;
    text-decoration: none;
}
.account_pages .card .card-body small a:hover {
    text-decoration: underline;
}
.account_pages .dont-acc {
    color: #6c757d;
}
.account_pages .dont-acc a {
    color: #6c757d;
    text-decoration: none;
}
.account_pages .dont-acc a:hover {
    text-decoration: underline;
}

.account_footer {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
}
.account_footer p {
    color: #6c757d;
    font-size: 14px;
    padding: 10px 30px;
    text-align: center;
}
</style>
