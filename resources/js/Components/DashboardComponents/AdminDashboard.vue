<script setup>
import { useCreateUserStore } from "@/Stores/CreateUser";
import { ref } from "vue";
import CreateDeleteComponent from "../CreateDeleteComponent.vue";
import { Link } from "@inertiajs/vue3";

const showModal = useCreateUserStore();

const showCreateModalBtn = ref(true);

function showModalBtnTeacher() {
    showModal.showCreateModalBtnTeacher(showCreateModalBtn.value);
    // alert('hello')
}

function showModalBtnStudent() {
    showModal.showCreateModalBtnStudent(showCreateModalBtn.value);
    // alert('hello')
}

function showModalBtnGuardian() {
    showModal.showCreateModalBtnGuardian(showCreateModalBtn.value);
    // alert('hello')
}

function showModalBtnClass() {
    showModal.showCreateModalBtnClass(showCreateModalBtn.value);
    // alert('hello')
}
</script>

<template>
    <div>
        <CreateDeleteComponent
            forAttribute="teacher"
        >
            <template #labelRole> Teacher Role </template>

            <template #createRole><p @click="showModalBtnTeacher"> Create Teacher </p></template>

            <template #deleteRole> Delete Teacher </template>

            <template #showRole> <Link :href="route('teacher.index')"> Show Teachers </Link></template>
        </CreateDeleteComponent>

        <!-- Guardian buttons -->
        <CreateDeleteComponent
            forAttribute="guardian"
        >
            <template #labelRole> Guardian Role </template>

            <template #createRole ><p @click="showModalBtnGuardian"> Create Guardian </p></template>

            <template #deleteRole> Delete Guardian </template>

            <template #showRole> <Link :href="route('guardian.index')"> Show Guardians </Link> </template>
        </CreateDeleteComponent>

        <!-- Student buttons -->
        <CreateDeleteComponent
            forAttribute="student"
        >
            <template #labelRole> Student Role </template>

            <template #createRole ><p @click="showModalBtnStudent"> Create Student </p></template>

            <template #deleteRole> Delete Student </template>

            <template #showRole> <Link :href="route('student.index')"> Show Students </Link> </template>
        </CreateDeleteComponent>

        <!-- Class buttons -->
        <CreateDeleteComponent forAttribute="class">
            <template #labelRole> Class Role </template>

            <template #createRole><p @click="showModalBtnClass"> Create Class </p></template>

            <template #deleteRole> Delete Class </template>

            <template #showRole> Show Class </template>
        </CreateDeleteComponent>
    </div>
</template>
