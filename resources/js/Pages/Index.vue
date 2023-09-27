<script setup>
import { router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
defineProps({
  "tasks": Object,
  pagination: Object,
})
function create() {
  return router.get("/tasks/create")
}
function Destroy(tasks) {

  const isConfirmed = window.confirm("Are you sure you want to delete this task?");

  if (isConfirmed) {

    return router.delete("/tasks/" + tasks);
  } else {

    return "Delete action cancelled.";
  }
}
function Edit(tasks) {

  return router.get("/tasks/" + tasks)
}
function Filter(status) {
  return router.get("/tasks/filter/" + status)
}
function Sort() {
  return router.get("/tasks/sort/date");
}
function navigateToPage(page) {
  router.get('/tasks?page=' + page);
}

</script>
<template>


    <div>

      <header class="bg-white ">
        <div
          class="col-md-12 mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 d-flex justify-content-between align-items-center">
          <h1 class="text-center text-3xl font-bold tracking-tight">Tasks</h1>

          <div>
            <button @click.prevent="Sort()" class="btn btn-outline-info ml-2">Sort By Date</button>
            <button @click.prevent="create()" class="btn btn-outline-success ml-2">Create</button>
          </div>
        </div>


      </header>
      <div class="">
        <table class="table table-bordered table-hover ">
          <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Status</th>
              <th>Due Date</th>
              <th colspan="5" class="text-centre">Action</th>

            </tr>
          </thead>
          <tbody>
            <tr v-for="task in tasks">
              <td>{{ task.title }}</td>
              <td>{{ task.description }}</td>
              <td><span
                  :class="{ 'text-success': task.status === 'Completed', 'text-warning': task.status === 'In Progress' }">{{
                    task.status }}</span></td>
              <td>{{ task.datedue }}</td>
              <td>

              </td>
              <td> <button @click.prevent="Edit(task.id)" class="btn btn-outline-primary">Edit</button></td>
              <td> <button @click.prevent="Filter(task.status)" class="btn btn-outline-info ml-2">Filter</button>

              </td>
            
              <td> <button @click.prevent="Destroy(task.id)" class="btn btn-outline-danger">Delete</button>
              </td>
            </tr>
          </tbody>

        </table>
        <!-- Pagination Controls -->
        <div class="mt-4 text-center"> <!-- Center the pagination -->
          <ul class="pagination justify-content-center"> <!-- Center the pagination list -->
            <li class="page-item" :class="{ 'disabled': !pagination.prev_page_url }">
              <a class="page-link"
                @click.prevent="pagination.prev_page_url ? navigateToPage(pagination.current_page - 1) : null" href="#">
                Previous
              </a>
            </li>

            <li class="page-item" :class="{ 'disabled': !pagination.next_page_url }">
              <a class="page-link"
                @click.prevent="pagination.next_page_url ? navigateToPage(pagination.current_page + 1) : null" href="#">
                Next
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  
</template>