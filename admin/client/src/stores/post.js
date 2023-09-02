import { defineStore } from "pinia";
import { api } from "../boot/axios";

export const PostStore = defineStore("post", {
  state: () => ({
    loading: false,
    items: [],
    item: {},
    url: "/posts"
  }),
  actions: {
    saveItem(cb) {
      this.loading = true;
      api.post(`${this.url}/save`, this.item)
        .then((res) => {
          this.item = res.data;
          if (cb) cb();
          this.getItems();
        })
        .catch(err => {
          console.log(err);
        })
        .finally(() => this.loading = false);
    },
    getItems() {
      api.get(`${this.url}`, {
        params: {
          all: true,
        }
      })
        .then((res) => {
          this.items = res.data;
        })
        .catch(err => {
          console.log(err);
        })
        .finally(() => this.loading = false);
    },
    getItem() {
      api.get(`${this.url}`, {
        params: {
          id: this.item.id,
        }
      })
        .then((res) => {
          this.item = res.data;
        })
        .catch(err => {
          console.log(err);
        })
        .finally(() => this.loading = false);
    },
    deleteItem() {
      api.delete(`${this.url}/${this.item.id}`)
        .then((res) => {
          this.getItems();
        })
        .catch(err => {
          console.log(err);
        })
        .finally(() => this.loading = false);
    }
  }
});