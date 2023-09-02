<template>
  <div>

  </div>
</template>

<script>
import { EnvStore } from '../../stores/env';
import { UserStore } from '../../stores/user';

  export default {
    setup() {
      const env = EnvStore();
      const user = UserStore();

      const token = JSON.parse(localStorage.getItem("token"));
      if (!token) {
        user.logout();
        env.dialogs.users.login = true;
        return;
      }

      user.getUser();
    }
  }
</script>