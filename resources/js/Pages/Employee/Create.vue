<template>
    <AppLayout title="Add">
      <template #header>
        <div class="flex">
          <h2 class="flex-1 font-semibold text-xl text-gray-200 leading-tight">Add</h2>
          <Link
            class="bg-pink-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2"
            as="button"
            href="/employees"
          >
            Back
          </Link>
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

              <div class="form-field">
                <label for="img">Image Image</label>
                <input type="file" @input="handleImageChange" class="input-field" accept="image/jpeg" />
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                  {{ form.progress.percentage }}%
                </progress>
              </div>

              <div class="mt-auto flex justify-center">
                <button class="bg-pink-500 text-white font-semibold py-2 px-4 border border-gray-700 rounded mb-2" type="submit">Add</button>
              </div>
            </div>
          </form>
          </div>
        </div>
    </AppLayout>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { Link, useForm } from '@inertiajs/vue3';
  import { ref } from 'vue';

  const form = useForm({
    name: '',
    position: '',
    salary: '',
    email: '',
    img: '',
  });

  function submit() {
    form.post('/employees/');
  }
  </script>

  <style>
  .input-field {
    border: 1px solid #e2e8f0;
    padding: 0.5rem;
    width: 100%;
    border-radius: 0.375rem;
    margin-bottom: 1rem;
  }

  .w-40 {
    width: 10rem;
  }

  .h-40 {
    height: 10rem;
  }
  </style>
