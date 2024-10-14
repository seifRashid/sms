<script setup>
import { useCreateUserStore } from "@/Stores/CreateUser";
import { ref } from "vue";
import CreateDeleteComponent from "../CreateDeleteComponent.vue";

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
            @click="showModalBtnTeacher"
        >
            <template #labelRole> Teacher Role </template>

            <template #createRole> Create Teacher </template>

            <template #deleteRole> Delete Teacher </template>
        </CreateDeleteComponent>

        <!-- Guardian buttons -->
        <CreateDeleteComponent
            forAttribute="guardian"
            @click="showModalBtnGuardian"
        >
            <template #labelRole> Guardian Role </template>

            <template #createRole> Create Guardian </template>

            <template #deleteRole> Delete Guardian </template>
        </CreateDeleteComponent>

        <!-- Student buttons -->
        <CreateDeleteComponent
            forAttribute="student"
            @click="showModalBtnStudent"
        >
            <template #labelRole> Student Role </template>

            <template #createRole> Create Student </template>

            <template #deleteRole> Delete Student </template>
        </CreateDeleteComponent>

        <!-- Class buttons -->
        <CreateDeleteComponent forAttribute="class" @click="showModalBtnClass">
            <template #labelRole> Class Role </template>

            <template #createRole> Create Class </template>

            <template #deleteRole> Delete Class </template>
        </CreateDeleteComponent>
    </div>
</template>
