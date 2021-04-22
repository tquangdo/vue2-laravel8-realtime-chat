<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <chat-room-selection
          v-if="v_currentRoom.id"
          :prop_chatRooms="v_chatRooms"
          :prop_currentRoom="v_currentRoom"
          v-on:emitRoomChanged="onSetRoom($event)"
        />
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <message-container :prop_messages="v_messages" />
          <input-message
            :prop_room="v_currentRoom"
            v-on:emitMessageSent="onGetMessages()"
          />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import InputMessage from "./inputMessage.vue";
import MessageContainer from "./messageContainer.vue";
import ChatRoomSelection from "./chatRoomSelection.vue";

export default {
  components: {
    AppLayout,
    InputMessage,
    MessageContainer,
    ChatRoomSelection,
  },
  data() {
    return {
      v_chatRooms: [],
      v_currentRoom: [],
      v_messages: [],
    };
  },
  methods: {
    onGetRooms() {
      axios
        .get("/chat/rooms")
        .then((res) => {
          this.v_chatRooms = res.data;
          this.onSetRoom(res.data[0]);
        })
        .catch((err) => {
          alert("SEL rooms ERR!!! " + err);
        });
    },
    onSetRoom(arg_room) {
      this.v_currentRoom = arg_room;
      this.onGetMessages();
    },
    onGetMessages() {
      axios
        .get("/chat/room/" + this.v_currentRoom.id + "/messages")
        .then((res) => {
          this.v_messages = res.data;
        })
        .catch((err) => {
          alert("SEL messages ERR!!! " + err);
        });
    },
  },
  created() {
    this.onGetRooms();
  },
};
</script>