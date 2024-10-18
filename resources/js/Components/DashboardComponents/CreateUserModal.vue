<script setup>
import { useCreateUserStore } from "@/Stores/CreateUser";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const form = useForm({
    teacher_name: "",
    teacher_email: "",
    teacher_password: "",
    guardian_name: "",
    guardian_email: "",
    guardian_password: "",
    student_name: "",
    student_darasa: "",
    student_password: "",
    darasa_name: "",
    darasa_capasity: "",
    role: "",
});

const formType = ref("student");

const showModal = useCreateUserStore();

// const submitForm = () => {
//     // Handle form submission logic here
//     showModal.CreateModalBtnTeacher = false;
//     showModal.CreateModalBtnStudent = false;
//     showModal.CreateModalBtnGuardian = false;
//     showModal.CreateModalBtnDarasa = false;
// };

const changeEndPointType = () => {
    if (showModal.CreateModalBtnTeacher == true) {
        formType.value = "teacher";
    } else if (showModal.CreateModalBtnStudent) {
        formType.value = "student";
    } else if (showModal.CreateModalBtnGuardian) {
        formType.value = "guardian";
    } else if (showModal.CreateModalBtnDarasa) {
        formType.value = "darasa";
    }
};

// Function to handle form submission
const submitForm = () => {
    form.post(`/${formType.value}`, {
        preserveScroll: true,
        onSuccess: () => {
            console.log("Form submitted successfully");
            showModal.CreateModalBtnTeacher = false;
            showModal.CreateModalBtnStudent = false;
            showModal.CreateModalBtnGuardian = false;
            showModal.CreateModalBtnDarasa = false;
            form.reset(); // Reset the form after successful submission
        },
        onError: (errors) => {
            console.log("Form submission failed with errors:", errors);
        },
    });
};
</script>
<template>
    <div
        v-if="
            showModal.CreateModalBtnTeacher ||
            showModal.CreateModalBtnStudent ||
            showModal.CreateModalBtnGuardian ||
            showModal.CreateModalBtnDarasa
        "
        class="fixed top-0 left-0 w-full h-screen bg-black/10 flex items-center justify-center"
    >
        <!-- Hello {{ showModal.CreateModalBtnTeacher?'teacher':'User' }} -->

        <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-10">
            <h2 class="text-2xl font-semibold mb-6 text-center">
                Create
                {{
                    showModal.CreateModalBtnTeacher
                        ? "Teacher 👨‍🏫"
                        : showModal.CreateModalBtnStudent
                        ? "Student 👨‍🎓"
                        : showModal.CreateModalBtnGuardian
                        ? "Guardian 🤵"
                        : showModal.CreateModalBtnDarasa
                        ? "Class 🏫"
                        : ""
                }}
            </h2>

            <form
                @submit.prevent="submitForm"
                class="grid grid-cols-1 md:grid-cols-2 gap-6"
            >
                <!-- Teacher Information -->
                <div v-if="showModal.CreateModalBtnTeacher">
                    <label
                        for="teacher_name"
                        class="block font-medium text-gray-700"
                        >Teacher Name</label
                    >
                    <input
                        v-model="form.teacher_name"
                        type="text"
                        id="teacher_name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter teacher's name"
                    />
                    <div
                        v-if="form.errors.teacher_name"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.teacher_name }}
                    </div>
                </div>

                <div v-if="showModal.CreateModalBtnTeacher">
                    <label
                        for="teacher_email"
                        class="block font-medium text-gray-700"
                        >Teacher Email</label
                    >
                    <input
                        v-model="form.teacher_email"
                        type="email"
                        id="teacher_email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter teacher's email"
                    />
                    <div
                        v-if="form.errors.teacher_email"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.teacher_email }}
                    </div>
                </div>

                <div v-if="showModal.CreateModalBtnTeacher">
                    <label
                        for="teacher_password"
                        class="block font-medium text-gray-700"
                        >Teacher Password</label
                    >
                    <input
                        v-model="form.teacher_password"
                        type="password"
                        id="teacher_password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter teacher's password"
                    />
                    <div
                        v-if="form.errors.teacher_password"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.teacher_password }}
                    </div>
                </div>

                <!-- Guardian Information -->
                <div v-if="showModal.CreateModalBtnGuardian">
                    <label
                        for="guardian_name"
                        class="block font-medium text-gray-700"
                        >Guardian Name</label
                    >
                    <input
                        v-model="form.guardian_name"
                        type="text"
                        id="guardian_name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter guardian's name"
                    />
                    <div
                        v-if="form.errors.guardian_name"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.guardian_name }}
                    </div>
                </div>

                <div v-if="showModal.CreateModalBtnGuardian">
                    <label
                        for="guardian_email"
                        class="block font-medium text-gray-700"
                        >Guardian Email</label
                    >
                    <input
                        v-model="form.guardian_email"
                        type="email"
                        id="guardian_email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter guardian's email"
                    />
                    <div
                        v-if="form.errors.guardian_email"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.guardian_email }}
                    </div>
                </div>

                <div v-if="showModal.CreateModalBtnGuardian">
                    <label
                        for="guardian_password"
                        class="block font-medium text-gray-700"
                        >Guardian Password</label
                    >
                    <input
                        v-model="form.guardian_password"
                        type="password"
                        id="guardian_password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter guardian's password"
                    />
                    <div
                        v-if="form.errors.guardian_password"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.guardian_password }}
                    </div>
                </div>

                <!-- Student Information -->
                <div v-if="showModal.CreateModalBtnStudent">
                    <label
                        for="student_name"
                        class="block font-medium text-gray-700"
                        >Student Name</label
                    >
                    <input
                        v-model="form.student_name"
                        type="text"
                        id="student_name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter student's name"
                    />
                    <div
                        v-if="form.errors.student_name"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.student_name }}
                    </div>
                </div>

                <div v-if="showModal.CreateModalBtnStudent">
                    <label
                        for="student_darasa"
                        class="block font-medium text-gray-700"
                        >Student Darasa</label
                    >
                    <input
                        v-model="form.student_darasa"
                        type="text"
                        id="student_darasa"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter student's darasa"
                    />
                    <div
                        v-if="form.errors.student_darasa"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.student_darasa }}
                    </div>
                </div>

                <div v-if="showModal.CreateModalBtnStudent">
                    <label
                        for="student_password"
                        class="block font-medium text-gray-700"
                        >Student Password</label
                    >
                    <input
                        v-model="form.student_password"
                        type="password"
                        id="student_password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter student's password"
                    />
                    <div
                        v-if="form.errors.student_password"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.student_password }}
                    </div>
                </div>

                <!-- Darasa Information -->
                <div v-if="showModal.CreateModalBtnDarasa">
                    <label
                        for="darasa_name"
                        class="block font-medium text-gray-700"
                        >Darasa Name</label
                    >
                    <input
                        v-model="form.darasa_name"
                        type="text"
                        id="darasa_name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter darasa name"
                    />
                    <div
                        v-if="form.errors.darasa_name"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.darasa_name }}
                    </div>
                </div>

                <div v-if="showModal.CreateModalBtnDarasa">
                    <label
                        for="darasa_capasity"
                        class="block font-medium text-gray-700"
                        >Darasa Capacity</label
                    >
                    <input
                        v-model="form.darasa_capasity"
                        type="number"
                        id="darasa_capasity"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter darasa capacity"
                    />
                    <div
                        v-if="form.errors.darasa_capasity"
                        class="text-red-500 text-sm"
                    >
                        {{ form.errors.darasa_capasity }}
                    </div>
                </div>

                <div
                    v-if="
                        showModal.CreateModalBtnGuardian ||
                        showModal.CreateModalBtnTeacher ||
                        showModal.CreateModalBtnStudent
                    "
                >
                    <label for="role" class="block font-medium text-gray-700"
                        >Role</label
                    >
                    <input
                        v-model="form.role"
                        type="text"
                        id="role"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter darasa capacity"
                    />
                    <div v-if="form.errors.role" class="text-red-500 text-sm">
                        {{ form.errors.role }}
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-span-2 text-center">
                    <button
                        @click="changeEndPointType"
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<style></style>
