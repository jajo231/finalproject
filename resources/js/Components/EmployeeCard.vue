<template>
    <div class="bg-pink-100 shadow flex hover:bg-pink-300">
        <div class="flex flex-1">
            <div class="w-[150px] h-[150px] flex justify-center items-center">
                <img :src="employee.picUrl" alt="employee Image" class="aspect-square">
            </div>
            <div class="ml-6 flex-1"  @click="open(employee)">
                <div class="text-2xl mt-5">{{ employee.name}}</div>
                <div class="italic">{{ employee.position }}</div>
                <div class="italic">{{ employee.salary }}</div>
                <div class="italic">{{ employee.email }}</div>
            </div>
            <div class="flex justify-between">
                <div>&nbsp;</div>
                <label :for="'status-' + employee.id" class="switch">
                    <input type="checkbox" :id="'status-' + employee.id" :checked="employee.payed" @change="toggleActive(employee)">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { router } from '@inertiajs/vue3';
    import { computed } from 'vue'


    const props = defineProps({
        employee: Object,
    })

    function open(employee) {
        router.visit('/employees/' + employee.id)
    }

    function toggleActive(employee) {
        router.visit('/employees/toggle/' + employee.id, {
            method: 'post',
            preserveScroll: true
        })
    }

</script>

<style scoped>
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(16px);
        -ms-transform: translateX(16px);
        transform: translateX(16px);
    }

    .slider.round {
        border-radius: 20px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
