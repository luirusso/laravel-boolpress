<template>
    <div class="container">
        <h1 class="my-5">
            Our Blog
        </h1>

        <div v-if="posts">
            <article class="mb-3" v-for="post in posts" :key="`post-${ post.id }`">
                <h2>
                    {{ post.title }}
                </h2>
                <div class="mb-3">
                    {{ post.created_at }}
                </div>
                <p>
                    {{ post.content }}
                </p>
            </article>
        </div>
        <div v-else>
            Loading posts...
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'App',
    components: {},
    data() {
        return {
            posts: null,
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {

            axios.get('http://127.0.0.1:8000/api/posts')
                .then(res => {
                    this.posts = res.data;
                });
        }
    }
}
</script>

<style lang="scss">

</style>