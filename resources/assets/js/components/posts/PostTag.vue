<template>
    <div>
        <img :src="option.url" :alt="option.alt" v-if="option.is_loading" class="img-fluid">
        <a v-for="tag in post.tags" :title="tag.name" href="#">
            <span class="badge badge-info ml-1">
                {{ tag.name }}
            </span>
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'post_id',
        ],
        data() {
            return {
                post: {
                    tags: [],
                },
                endpoint: '/api/v1/posts/134/tags/',
                option: {
                    url: '/images/loading.gif',
                    is_loading: true,
                    alt: 'Please wait me!'
                },
            }
        },

        mounted() {
            this.postTags();
        },

        methods: {
            postTags: function () {
                let vm = axios;
                this.option.is_loading = true;
                vm.get(this.endpoint).then(response => {
                    this.post.tags.push(...response.data.data);
                    this.option.is_loading = false;
                });
            }
        }
    }
</script>
