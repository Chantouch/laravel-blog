<template>
    <ul class="list-unstyled">
        <img :src="option.url" :alt="option.alt" v-if="option.is_loading" class="img-fluid mx-auto d-block">
        <li v-for="post in posts">
            <a :href="post.url" :title="post.title">
                <i class="fa fa-hand-o-right mr-1"></i>{{ post.title }}
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        props: [],
        data() {
            return {
                posts: [],
                endpoint: '/api/v1/latest-posts',
                option:{
                    url: '/images/loading.gif',
                    is_loading: true,
                    alt: 'Please wait me!'
                },
            }
        },

        mounted() {
            this.popularPost();
        },

        methods: {
            popularPost: function () {
                let vm = axios;
                this.option.is_loading = true;
                vm.get(this.endpoint).then(response => {
                    this.posts.push(...response.data.data);
                    this.option.is_loading = false;
                });
            }
        }
    }
</script>
