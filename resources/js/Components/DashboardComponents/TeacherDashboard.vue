<script setup>
import { Link } from "@inertiajs/vue3";

// import { Inertia } from '@inertiajs/inertia';
defineProps({
    teachers: Object,
});

const changePage = (page) => {
    Inertia.get(url("/teacher"), { page }, { preserveState: true });
    // alert(page)
};
</script>
<template>
    <div class="m-2 p-2">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="pb-4 bg-white dark:bg-gray-900 p-2">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div
                        class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none"
                    >
                        <svg
                            class="w-4 h-4 text-gray-500 dark:text-gray-400"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 20 20"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                            />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="table-search"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for items"
                    />
                </div>
            </div>
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <!-- {{ teachers[0] }} -->
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input
                                    id="checkbox-all-search"
                                    type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                />
                                <label for="checkbox-all-search" class="sr-only"
                                    >checkbox</label
                                >
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Teacher Name</th>
                        <th scope="col" class="px-6 py-3">Teacher Class</th>
                        <th scope="col" class="px-6 py-3">Teacher Email</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="teacher in teachers.data"
                        :key="teacher.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input
                                    id="checkbox-table-search-1"
                                    type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                />
                                <label
                                    for="checkbox-table-search-1"
                                    class="sr-only"
                                    >checkbox</label
                                >
                            </div>
                        </td>
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ teacher.user.id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ teacher.user.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ teacher.user.email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ teacher.user.id }}
                        </td>
                        <td
                            class="px-6 py-4 flex items-center justify-start gap-2"
                        >
                            <a
                                href="#"
                                class="font-medium text-green-600 dark:text-green-500 hover:underline"
                                >Edit</a
                            >
                            <a
                                href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                >View</a
                            >
                            <a
                                href="#"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                >Delete</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Pagination Controls -->
            <div class="p-3">
                <div class="flex gap-2 items-center justify-center divide-y-1">
                    <!-- Create links for pagination -->
                    <template v-for="link in teachers.links" :key="link.label">
                        <!-- Style the pagination container -->
                         <div
                         v-if="link.url"
                         class="inline-block py-2 px-2 text-sm font-medium text-gray-500 transition
                         duration-150 ease-in-out hover:text-gray-700 hover:bg-gray-100
                         dark:hover:text-gray-400 dark:hover:bg-gray-700"
                         >
                         <Link :href="link.url" v-html="link.label" preserveState: true class="text-gray-500 transition duration-150 ease
                         in-out hover:text-gray-700 dark:hover:text-gray-400"
                         :class="{ 'bg-white px-2 py-1 border border-gray-200 rounded-md  dark:bg-gray-900 font-bold text-lg': link.active }"
                         />

                        </div>
                        <!-- The v-if looks if the link has a url make it visible else show the label -->
                        <span v-else :v-html="link.label"
                        class="
                        inline-block py-2 px-4 text-sm font-medium text-gray-500 transition
                        duration-150 ease-in-out hover:text-gray-700 hover:bg-gray-100
                        dark:hover:text-gray-400 dark:hover:bg-gray-700"
                        ></span>
                    </template>
                    <!-- <button
                        v-if="teachers.current_page > 1"
                        @click="changePage(teachers.current_page - 1)"
                        class="border rounded-s-lg p-2 hover:border-gray-500"
                    >
                        Previous
                    </button>

                    <button
                        v-for="page in teachers.last_page"
                        :key="page"
                        @click="changePage(page)"
                        class="border p-2 hover:border-gray-500"
                        :class="{ 'font-bold': teachers.current_page === page }"
                    >
                        {{ page }}
                    </button>

                    <button
                        v-if="teachers.current_page < teachers.last_page"
                        @click="changePage(teachers.current_page + 1)"
                        class="border rounded-e-lg hover:border-gray-500 p-2"
                    >
                        Next
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</template>
