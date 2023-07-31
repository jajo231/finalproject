<template>
    <AppLayout title="Index">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">Clients</h2>
                <div>
                    <input type="text" class="border border-gray-500 w-[250px] text-center" placeholder="&#128269;Search" @keydown.enter="search($event)">
                </div>
                <div>
                    <Link href="/employees/create" class="bg-pink-500  text-white font-semibold  py-2 px-4 border border-gray-700 rounded mb-2">Add</Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap justify-between">
                    <div class="w-[49%] mb-4" v-for="employee in employees" :key="employee.id">
                        <EmployeeCard :employee="employee" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import EmployeeCard from '@/Components/EmployeeCard.vue'
    import { usePage, router, Link } from '@inertiajs/vue3';
    import { computed } from 'vue'


    const props = defineProps({
        employees: Array,
        auth: Object
    })

    function search(ev) {
        router.visit('/employees/search/' + ev.target.value)
    }

    const page = usePage()

    const user = computed(() => page.props.auth.user)
</script>
