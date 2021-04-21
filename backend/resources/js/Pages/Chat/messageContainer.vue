<template>
  <div class="h-96 w-full">
    <div class="h-full p-2 flex flex-col-reverse overflow-y-scroll">
      <div v-for="(item_message, index) in prop_messages" :key="index">
        <message-item :prop_message="item_message" />
      </div>
    </div>
  </div>
</template>

<script>
import messageItem from "./messageItem.vue";
export default {
  components: { messageItem },
  props: ["prop_messages"],
};
</script>

<style>
</style>