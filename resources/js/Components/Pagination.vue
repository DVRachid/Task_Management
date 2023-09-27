<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/inertia-vue3';

defineProps({
  pagination: Object,
});

function navigateToPage(page) {

  return router.get('/tasks?page=' + page);
}

</script>
<template>
  <div class="mt-4">
    <ul class="pagination">
      <li class="page-item" :class="{ 'disabled': !pagination.prev_page_url }">
        <a
          class="page-link"
          @click.prevent="pagination.prev_page_url ? navigateToPage(pagination.current_page - 1) : null"
          href="#"
        >
          Previous
        </a>
      </li>

      <li class="page-item" :class="{ 'disabled': !pagination.next_page_url }">
        <a
          class="page-link"
          @click.prevent="pagination.next_page_url ? navigateToPage(pagination.current_page + 1) : null"
          href="#"
        >
          Next
        </a>
      </li>
    </ul>
  </div>
</template>

