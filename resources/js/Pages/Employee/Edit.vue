<template>
    <AppLayout title="Edit">
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-200 leading-tight">Edit</h2>
                <Link class="bg-pink-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2" as="button" :href="'/employees/' + employee.id">Back</Link>
            </div>
        </template>

                <div class="py-6">
                    <div class="bg-white max-w-4xl p-4 mx-auto rounded-lg border">
                    <form @submit.prevent="submit" class="">
                        <div class="">
                        <h4 class="text-xl mb-4">Employee</h4>

                        <div class="form-field">
                            <label for="name">Name</label>
                            <input type="text" id="name" v-model="form.name" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="position">Position</label>
                            <input type="text" id="position" v-model="form.position" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="salary">Salary</label>
                            <input type="number" id="salary" v-model="form.salary" class="input-field" />
                        </div>

                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" v-model="form.email" class="input-field" />
                        </div>

                        <div class="mt-auto flex justify-end">
                            <button class="bg-pink-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2" type="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';

    const props = defineProps({
        employee: Object
    })

    const form = useForm({
        name: props.employee.name,
        position: props.employee.position,
        salary: props.employee.salary,
        email: props.employee.email,
    })

    function submit() {
        form.patch('/employees/' + props.employee.id)
    }
</script>
