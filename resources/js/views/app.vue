<template>
    <div class="container">
        <h1 class="my-5">
            Our Blog
        </h1>

        <div v-if="posts">
            Posts list here
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