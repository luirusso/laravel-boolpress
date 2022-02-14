<template>
    <section class="container">
        <div v-if="post">
            <h1 class="mb-5">{{ post.title }}</h1>
            <h4 v-if="post.category">Category: {{ post.category.name }}</h4>
            <h4 v-else>Uncategorized</h4>

            <!-- <div class="mb-5">
                <span v-for="tag in post.tags" :key="`tag-${tag.id}`" class="badge badge-primary mr-2">{{ tag.name }}</span>
            </div> -->

            <Tags :list="post.tags" class="mb-5" />

            <p>{{ post.content }}</p>
        </div>
        <Loader text="Loading post..." v-else />
    </section>
</template>

<script>
import axios from "axios";
import Loader from '../components/Loader';
import Tags from '../components/Tags'

export default {
    name: "PostDetail",
    components: {
        Tags,
        Loader,
    },
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

                    if(res.data.not_found) {
                        this.$router.push({ name: 'not-found' });
                    } else {
                        this.post = res.data;
                    }
                })
                .catch((err) => log.error(err));
        },
    },
};
</script>

<style></style>
