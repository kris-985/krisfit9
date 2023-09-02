<template>
  <display-items />
  <save-item v-if="env.dialogs.posts.save" />
</template>

<script>
import { EnvStore } from "../../stores/env";
import DisplayItems from "./DisplayItems.vue";
import SaveItem from "./SaveItem.vue";

export default {
  components: {
    DisplayItems,
    SaveItem,
  },
  setup() {
    const env = EnvStore();
    return { env }
  }
};
</script>
