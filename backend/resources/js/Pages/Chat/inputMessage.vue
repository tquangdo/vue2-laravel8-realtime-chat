<template>
  <div class="relative h-10 m-1">
    <div style="border-top: 1px solid #e6e6e6" class="grid grid-cols-6">
      <input
        type="text"
        v-model="v_message"
        @keyup.enter="onSendMessage()"
        placeholder="Say something..."
        class="col-span-5 outline-none p-1"
      />
      <button
        @click="onSendMessage()"
        class="place-self-end bg-gray-500 hover:bg-blue-700 p-1 mt-1 rounded text-white"
      >
        Send
      </button>
    </div>
  </div>
</template>

<script>
import Input from "@/Jetstream/Input.vue";
export default {
  components: { Input },
  props: ["prop_room"],
  data() {
    return { v_message: "" };
  },
  methods: {
    onSendMessage() {
      if (this.v_message == " ") {
        return;
      }
      axios
        .post("/chat/room/" + this.prop_room.id + "/message", {
          message: this.v_message,
        })
        .then((response) => {
          if (response.status == 201) {
            this.v_message = "";
            this.$emit("emitMessageSent");
          }
        })
        .catch((error) => {
          alert("INS message ERR!!! " + err);
        });
    },
  },
};
</script>

<style>
</style>