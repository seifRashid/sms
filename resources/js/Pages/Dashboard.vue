<script setup>
// import DashboardContent from "@/Components/DashboardComponents/DashboardContent.vue";
import AdminDashboard from "@/Components/DashboardComponents/AdminDashboard.vue";
import CreateUserModal from "@/Components/DashboardComponents/CreateUserModal.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

import { useCreateUserStore } from "@/Stores/CreateUser";
const showModal = useCreateUserStore();

</script>

<template>
    <Head title="Dashboard" />

    <div :class="{ 'blur-sm': showModal.CreateModalBtnTeacher || showModal.CreateModalBtnStudent || showModal.CreateModalBtnGuardian || showModal.CreateModalBtnDarasa }">
        <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        You're logged in! {{ $page.props.auth.user.name }},
                        welcome 🤗
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <AdminDashboard/>
    </AuthenticatedLayout>
</div>
<CreateUserModal/>
</template>
