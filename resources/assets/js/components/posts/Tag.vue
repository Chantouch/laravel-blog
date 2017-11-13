<template>
    <div>
        <input type="hidden" name="tags" :value="post.tag">
        <label class="custom-control custom-checkbox" v-for="tag in tags">
            <input type="checkbox" class="custom-control-input" :id="'checkbox-'+tag.id" :value="tag.id"
                   v-model="post.tag">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">{{ tag.name }}</span>
        </label>
    </div>
</template>

<script>
    export default {
        props: [
            'tag_list'
        ],
        data() {
            return {
                post: {
                    tag: [],
                },
                tags: [],
                endpoint: '/api/v1/tags'
            }
        },

        mounted() {
            this.tagsList();
            this.getTags();
        },

        methods: {
            tagsList: function () {
                let vm = axios;
                vm.get(this.endpoint).then(response => {
                    this.tags.push(...response.data.data);
                });
            },
            getTags: function () {
                this.post.tag = this.tag_list;
            }
        }
    }
</script>
