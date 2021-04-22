<template>
  <div class="grid grid-cols-2">
    <div class="font-bold text-xl">{{ v_selected.name }} Chat</div>
    <div>
      <select
        v-model="v_selected"
        @change="$emit('emitRoomChanged', v_selected)"
        class="float-right rounded-full"
      >
        <option
          v-for="(item_room, index) in prop_chatRooms"
          :key="index"
          :value="item_room"
        >
          {{ item_room.name }}
        </option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  props: ["prop_chatRooms", "prop_currentRoom"],
  data() {
    return { v_selected: "" };
  },
  created() {
    this.v_selected = this.prop_currentRoom;
  },
};
</script>

<style>
</style>