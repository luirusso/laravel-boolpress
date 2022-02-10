<template>
    <section class="container">
        <div v-if="post">
            <h1 class="mb-5">{{ post.title }}</h1>
            <p>{{ post.content }}</p>
        </div>
        <div v-else>Loading posts...</div>
    </section>
</template>

<script>
import axios from "axios";

export default {
    name: "PostDetail",
    data() {
        return {
            post: null,
        };
    },
    created() {
        this.getPostDetail();
    },
    methods: {
        getPostDetail() {
            // GET POST FROM API
            axios
                .get(
                    `http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`
                )
                .then((res) => {
                    this.post = res.data;
                })
                .catch((err) => log.error(err));
        },
    },
};
</script>

<style></style>
