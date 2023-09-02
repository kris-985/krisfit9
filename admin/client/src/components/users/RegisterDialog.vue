<template>
  <div class="medium-dialog">
    <h2 class="text-2xl text-center mb-2">Register</h2>
    <div v-if="user.error">{{ user.error }}</div>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label for="fullname">Fullname</label>
        <input type="text" id="fullname" v-model="user.credentials.fullname" class="form-control">
      </div>
      <div class="mb-4">
        <label for="email">Email</label>
        <input type="email" id="email" v-model="user.credentials.email" class="form-control">
      </div>
      <div class="mb-4">
        <label for="password">Password</label>
        <input type="password" id="password" v-model="user.credentials.password" class="form-control">
      </div>
      <div class="mb-4">
        <label for="cpassword">Confirm Password</label>
        <input type="password" id="cpassword" v-model="user.credentials.cpassword" class="form-control">
      </div>
      <div>
        <button type="submit" class="btn-control">Register</button>
        <button type="button" class="ml-4 hover:text-primary" @click="openLoginDialog">Login</button>
      </div>
    </form>
  </div>
</template>

<script>
import { EnvStore } from "../../stores/env";
import { UserStore } from "../../stores/user";

export default {
  setup() {
    const env = EnvStore();
    const user = UserStore();

    const functions = {
      submit() {
        user.register();
      },
      openLoginDialog() {
        env.dialogs.users.register = false;
        env.dialogs.users.login = true;
      }
    }

    return { user, ...functions }
  }
};
</script>
