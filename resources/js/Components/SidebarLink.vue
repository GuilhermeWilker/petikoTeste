<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
  url: {
    type: String,
    required: true,
  },
  icon: {
    type: String,
    required: true,
  },
});

const iconClass = computed(() => {
  return `fa-solid fa-${props.icon} text-accent`;
});
</script>

<template>
  <Link
    :href="url"
    class="w-full hover:bg-[#10294b] p-1 px-5 flex items-center gap-3"
  >
    <i :class="iconClass"></i>
    <slot />
  </Link>
</template>



