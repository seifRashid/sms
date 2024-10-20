<script setup>
// import DashboardContent from "@/Components/DashboardComponents/DashboardContent.vue";
import AdminDashboard from "@/Components/DashboardComponents/AdminDashboard.vue";
import CreateUserModal from "@/Components/DashboardComponents/CreateUserModal.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

import { useCreateUserStore } from "@/Stores/CreateUser";
import TeacherDashboard from "@/Components/DashboardComponents/TeacherDashboard.vue";
const showModal = useCreateUserStore();

defineProps({
    teachers: Array
})

</script>

<template>
    <Head title="Dashboard" />

    <div
        :class="{
            'blur-sm':
                showModal.CreateModalBtnTeacher ||
                showModal.CreateModalBtnStudent ||
                showModal.CreateModalBtnGuardian ||
                showModal.CreateModalBtnDarasa,
        }"
    >
        <AuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Teachers
                </h2>
            </template>

            <!-- Content -->
             <TeacherDashboard :teachers="teachers"/>
        </AuthenticatedLayout>
    </div>
    <CreateUserModal />
</template>
