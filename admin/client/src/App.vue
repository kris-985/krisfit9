<template>
  <navigation-bar />
  <users-dialogs />
  <posts-dialogs />
</template>

<script>
import NavigationBar from "./components/NavigationBar.vue";
import UsersDialogs from "./components/users/UsersDialogs.vue";

import PostsDialogs from "./components/posts/PostDialogs.vue";

export default {
  components: {
    NavigationBar,
    UsersDialogs,
    PostsDialogs,
  },
};
</script>
