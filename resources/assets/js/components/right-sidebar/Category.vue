<template>
    <div>
        <img :src="option.url" :alt="option.alt" v-if="option.is_loading" class="img-fluid mx-auto d-block">
        <a v-for="category in categories" :title="category.name" :href="category.url">
            <span class="badge badge-info ml-1">
                {{ category.name }}
            </span>
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'category_list'
        ],
        data() {
            return {
                post: {
                    category: [],
                },
                categories: [],
                endpoint: '/api/v1/categories',
                option: {
                    url: '/images/loading.gif',
                    is_loading: true,
                    alt: 'Please wait me!'
                },
            }
        },

        mounted() {
            this.categoriesList();
            this.getCategories();
        },

        methods: {
            categoriesList: function () {
                let vm = axios;
                this.option.is_loading = true;
                vm.get(this.endpoint).then(response => {
                    this.categories.push(...response.data.data);
                    this.option.is_loading = false;
                });
            },
            getCategories: function () {
                this.post.category = this.category_list;
            }
        }
    }
</script>
