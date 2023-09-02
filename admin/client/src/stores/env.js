import { defineStore } from "pinia";

export const EnvStore = defineStore("env", {
  state: () => ({
    dialogs: {
      users: {
        register: false,
        login: false,
      },
      posts: {
        save: false,
      },
    },
  }),
});
