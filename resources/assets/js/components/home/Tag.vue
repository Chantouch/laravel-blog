<template>
    <div>
        <img :src="option.url" :alt="option.alt" v-if="option.is_loading" class="img-fluid">
        <a v-for="tag in tags" :title="tag.name" :href="tag.url">
            <span class="badge badge-primary ml-1">
                {{ tag.name }}
            </span>
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'tag_list'
        ],
        data() {
            return {
                tags: [],
                endpoint: '/api/v1/tags',
                option:{
                    url: '/images/loading.gif',
                    is_loading: true,
                    alt: 'Please wait me!'
                },
            }
        },

        mounted() {
            this.tagsList();
        },

        methods: {
            tagsList: function () {
                let vm = axios;
                this.option.is_loading = true;
                vm.get(this.endpoint).then(response => {
                    this.tags.push(...response.data.data);
                    this.option.is_loading = false;
                });
            }
        }
    }
</script>
