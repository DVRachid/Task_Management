<script setup>
import  {useForm, router} from '@inertiajs/vue3'

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
  errors:Object
})
const form = useForm({
  "title":null,
  "description":null,
  "datedue":null,
  "status":null
});

function submit(){
 router.post('/tasks',form)
}
function Back(){
  return router.get("/tasks")
} 
</script>
<template>
    <AuthenticatedLayout>
<div class="card col-6 offset-3">
  <header class="bg-white ">
          <div class="col-md-4 mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
            <h1 class="text-centre text-3xl font-bold tracking-tight text-gray-900">
              Create Task
            </h1>
          </div>
        </header>

  <div class="card-body">
    <form @submit.prevent="submit">
       
  <div class="mb-3">
    <label for="titleTask" class="form-label">Task Title</label>
    <input type="text" class="form-control" id="title" v-model="form.title">
    <div class="text-danger text-xs" v-if="errors.title">{{ errors.title }}</div>
  </div>
  <div class="mb-3">
    <label for="taskDescription" class="form-label">Task Description address</label>
    <input type="text" class="form-control" id="description" v-model="form.description">
    <div class="text-danger text-xs" v-if="errors.description">{{ errors.description }}</div>

  </div>
  <div class="mb-3">
    <label for="taskStatus" class="form-label">Task Status</label>
    <select id="status" v-model="form.status" class="form-select">
      <option value="In Progress">In Progress</option>
     <option value="Completed">Completed</option>
     <option value="Pending">Pending</option>
      </select>
    <div class="text-danger text-xs" v-if="errors.status">{{ errors.status }}</div>

  </div>
  <div class="mb-3">
    <label for="taskDate" class="form-label">Date Due</label>
    <input type="date" class="form-control" id="datedue" v-model="form.datedue">
    <div class="text-danger text-xs" v-if="errors.datedue">{{ errors.datedue }}</div>

  </div>
  <button type="submit" class="btn btn-centre btn-primary">Submit</button>
</form>
<div class="mx-auto col-md-3">
          <button class= "btn btn-success" type="submit" @click.prevent="Back()" >Back</button>
        </div>
  </div>
</div>
</AuthenticatedLayout>
</template>