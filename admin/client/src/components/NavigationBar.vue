<template>
  <nav class="shadow py-2">
    <div class="container">
      <div class="flex justify-between items-center">
        <a href="/" class="website-logo">
          <img src="../assets/logo.png" title="KrisFit.com" alt="KrisFit.com" />
        </a>
        <ul>
          <li v-if="user.isLoggedIn">
            <a href="#" title="Create Post" class="nav-item-link" @click="createPostDialog">Create Post</a>
          </li>
        </ul>
        <ul class="flex" v-if="!user.isLoggedIn">
          <li>
            <a href="#" title="Login" class="nav-item-link" @click="login">Login</a>
          </li>
          <li>
            <a href="#" title="Register" class="nav-item-link" @click="register">Register</a>
          </li>
        </ul>
        <ul v-else>
          <li>
            <a href="#" title="Logout" class="nav-item-link" @click="logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { EnvStore } from "../stores/env";
import { UserStore } from "../stores/user";

export default {
  setup() {
    const env = EnvStore();
    const user = UserStore();

    const functions = {
      register() {
        env.dialogs.users.login = false;
        env.dialogs.users.register = true;
      },
      login() {
        env.dialogs.users.register = false;
        env.dialogs.users.login = true;
      },
      logout() {
        user.logout();
      },
      createPostDialog() {
        env.dialogs.posts.save = true;
      }
    };

    return { env, user, ...functions };
  },
};
</script>