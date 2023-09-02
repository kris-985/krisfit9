<template>
  <div class="container pt-20">
    <div v-if="post.items.length > 0">
      <ul>
        <li
          v-for="(item, index) in post.items"
          :key="index"
          class="mb-10 p-5 rounded border border-gray-light shadow"
        >
          <h2 class="text-2xl">{{ item.title }}</h2>
          <img :src="item.image_url" :alt="item.title" v-if="item.image_url" />
          {{ item.created_at }}
        </li>
      </ul>
    </div>
    <div v-else>No posts yet!</div>
  </div>
</template>

<script>
import { PostStore } from "../../stores/post";

export default {
  setup() {
    const post = PostStore();
    post.getItems();
    return { post };
  },
};
</script>
