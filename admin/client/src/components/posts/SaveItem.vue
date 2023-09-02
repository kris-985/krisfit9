<template>
  <div class="medium-dialog">
    <h2 class="text-2xl text-center">Create Post</h2>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label for="title">Title</label>
        <input type="text" id="title" v-model="post.item.title" class="form-control">
      </div>
      <div class="mb-4">
        <label for="image_url">Image url</label>
        <input type="text" id="image_url" v-model="post.item.image_url" class="form-control">
      </div>
      <div class="mb-4">
        <label for="text">Text</label>
        <textarea id="text" v-model="post.item.text" class="form-control"></textarea>
      </div>
      <div>
        <button type="submit" class="btn-control">Save</button>
        <button type="button" class="ml-4 hover:text-primary" @click="close">Cancel</button>
      </div>
    </form>
  </div>
</template>

<script>
import { EnvStore } from '../../stores/env';
import { PostStore } from '../../stores/post';

  export default {
    setup() {
      const env = EnvStore();
      const post = PostStore();

      const functions = {
        saveCallBack() {
          env.dialogs.posts.save = false;
        },
        close() {
          env.dialogs.posts.save = false;
        },
        submit() {
          post.saveItem(functions.saveCallBack);
        }
      }

      return { post, ...functions }
    }
    
  }
</script>
