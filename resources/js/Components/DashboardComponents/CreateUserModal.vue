<script setup>
import { useCreateUserStore } from "@/Stores/CreateUser";

const showModal = useCreateUserStore();
</script>
<template>
    <div
        v-show="showModal.CreateModalBtn"
        class="fixed top-0 left-0 w-full h-screen bg-black/10 flex items-center justify-center"
    >
        Hello
    </div>
</template>
<style></style>
