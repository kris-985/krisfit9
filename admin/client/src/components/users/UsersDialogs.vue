<template>
  <initial-logic />
  <register-dialog v-if="env.dialogs.users.register" />
  <login-dialog v-if="env.dialogs.users.login" />
</template>

<script>
import { EnvStore } from "../../stores/env";
import LoginDialog from "./LoginDialog.vue";
import RegisterDialog from "./RegisterDialog.vue";
import InitialLogic from "./InitialLogic.vue";

export default {
  components: {
    LoginDialog,
    RegisterDialog,
    InitialLogic,
  },
  setup() {
    const env = EnvStore();
    return { env }
  }
};
</script>