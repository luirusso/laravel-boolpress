<template>
    <div class="container">
        <h1 class="my-5">Our Blog</h1>

        <div v-if="posts">
            <article
                class="mb-3"
                v-for="post in posts"
                :key="`post-${post.id}`"
            >
                <h2>
                    {{ post.title }}
                </h2>
                <div class="mb-3">
                    {{ formatDate(post.created_at) }}
                </div>
                <p>
                    {{ getExcerpt(post.content, 100) }}
                </p>
            </article>
        </div>
        <div v-else>Loading posts...</div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "App",
    components: {},
    data() {
        return {
            posts: null,
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get("http://127.0.0.1:8000/api/posts").then((res) => {
                this.posts = res.data;
            });
        },
        getExcerpt(text, maxLength) {
            if (text.length > maxLength) {
                return text.substring(0, maxLength) + "...";
            }
            return text;
        },
        formatDate(postDate) {
            const date = new Date(postDate);

            const formatted = new Intl.DateTimeFormat('it-IT').format(date);
            return formatted;
        }
    },
};
</script>

<style lang="scss"></style>
