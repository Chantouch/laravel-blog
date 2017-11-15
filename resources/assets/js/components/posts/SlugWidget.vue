<template>
    <div class="input-group">
        <input type="text" v-model="posts.title" class="form-control">
        <input type="hidden" name="title" :value="posts.title">
        <input type="hidden" name="slug" :value="slug">
        <span class="input-group-addon" id="post-slug">{{ url }}/{{ subdirectory }}</span>
        <input readonly type="text" class="form-control" id="basic-url" aria-describedby="post-slug"
               :value="slug">
        <span class="input-group-addon">Edit</span>
    </div>
</template>

<script>
    export default {
        props: {
            url: {
                type: String,
                required: true
            },
            subdirectory: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                slug: this.convertTitle(),
                posts: {
                    title: '',
                    slug: '',
                }
            }
        },

        mounted() {
        },

        methods: {
            convertTitle: function () {
                return Slug(this.title);
            }
        },
        watch: {
            title: function () {
                this.slug = this.convertTitle()
            }
        }
    }
</script>
