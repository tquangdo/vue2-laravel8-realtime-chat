<template>
  <div>{{ prop_message.user.name }}: {{ prop_message.message }}</div>
</template>

<script>
export default {
  props: ["prop_message"],
};
</script>

<style>
</style>