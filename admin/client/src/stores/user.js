import { defineStore } from "pinia";
import { api } from "../boot/axios";

export const UserStore = defineStore("user", {
  state: () => ({
    loading: false,
    me: {},
    credentials: {
      email: "",
      password: "",
    },
    url: "/users",
    error: null,
    isLoggedIn: false,
  }),
  actions: {
    login(cb) {
      this.loading = true;
      api.post(`${this.url}/login`, this.credentials)
        .then((res) => {
          this.afterLogin(res.data.token);
          if (cb) cb();
        })
        .catch(err => {
          console.log(err);
        })
        .finally(() => this.loading = false);
    },
    register() {
      if (this.credentials.password != this.credentials.cpassword) {
        this.error = "Passwords don't match";
        return;
      }
      this.loading = true;
      api.post(`${this.url}/register`, this.credentials)
        .then(() => {
          console.log("Registered");
        })
        .catch(err => {
          console.log(err);
        })
        .finally(() => this.loading = false);
    },
    afterLogin(token) {
      localStorage.setItem("token", JSON.stringify(token));
      api.defaults.headers.authorization = `Bearer ${token}`;
      this.isLoggedIn = true;
    },
    logout() {
      localStorage.removeItem("token");
      api.defaults.headers.authorization = null;
      this.isLoggedIn = false;
    },
    getUser() {
      this.loading = true;
      api.get(`${this.url}`)
        .then((res) => {
          this.me = res.data;
        })
        .catch(err => {
          console.log(err);
          this.logout();
        })
        .finally(() => this.loading = false);
    }
  },
});
