<template>
    <AppLayout title="Show">
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-200 leading-tight">Details</h2>
                <Link :href="'/employees/email/' + employee.id" class="bg-pink-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2 mr-2">Send Email</Link>
                <Link class="bg-pink-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2" as="button" :href="'/employees/'">Back</Link>
            </div>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-pink-100 overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex">
                        <div class="w-[600px] h-[200px] flex justify-center items-center">
                            <img :src="employee.picUrl" alt="employee Image" class="aspect-square">
                        </div>
                        <div class="flex-1 ml-4">
                            <div class="mt-4">Employee name: {{ employee.name }}</div>
                            <div class="mt-4">Position: {{ employee.position }}</div>
                            <div class="mt-4">Salary: {{ employee.salary }}</div>
                            <div class="mt-4">Mail: {{ employee.email }}</div>
                            <div class="mt-4" v-if="employee.payed">
                                Payed: <bold class="text-green-500"> Yes </bold>
                            </div>
                            <div class="mt-4" v-else>
                                Payed: <bold class="text-red-500"> No </bold>
                            </div>
                                 <div class="mt-5">
                                    <Link class="bg-red-500 rounded mr-2" :href="'/employees/' + employee.id" method="delete" as="button">Delete</Link>
                                    <Link class="bg-green-500 rounded mb-2" :href="'/employees/edit/' + employee.id" as="button">Edit</Link>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Head, Link, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue'

    const props = defineProps({
        employee: Object,
        auth: Object
    })

    const page = usePage()

    const user = computed(() => page.props.auth.user)
</script>
