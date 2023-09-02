<template>
  <div class="medium-dialog">
    <h2 class="text-2xl text-center">Login</h2>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label for="email">Email</label>
        <input type="email" id="email" v-model="user.credentials.email" class="form-control">
      </div>
      <div class="mb-4">
        <label for="password">Password</label>
        <input type="password" id="password" v-model="user.credentials.password" class="form-control">
      </div>
      <div>
        <button type="submit" class="btn-control">Login</button>
        <button type="button" class="ml-4 hover:text-primary" @click="openRegisterDialog">Register</button>
      </div>
    </form>
  </div>
</template>

<script>
import { EnvStore } from '../../stores/env';
import { UserStore } from '../../stores/user';

export default {
  setup() {
    const env = EnvStore();
    const user = UserStore();

    const functions = {
      loginCallBack() {
        env.dialogs.users.login = false;
      },
      submit() {
        user.login(functions.loginCallBack);
      },
      openRegisterDialog() {
        env.dialogs.users.register = true;
        env.dialogs.users.login = false;
      }
    }

    return { user, ...functions }
  }
};
</script>
