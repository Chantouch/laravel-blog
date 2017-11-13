<template>
    <div>
        <input type="hidden" name="categories" :value="post.category">
        <label class="custom-control custom-checkbox" v-for="category in categories">
            <input type="checkbox" class="custom-control-input" :id="'checkbox-'+category.id" :value="category.id"
                   v-model="post.category">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">{{ category.name }}</span>
        </label>
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
                endpoint: '/api/v1/categories'
            }
        },

        mounted() {
            this.categoriesList();
            this.getCategories();
        },

        methods: {
            categoriesList: function () {
                let vm = axios;
                vm.get(this.endpoint).then(response => {
                    this.categories.push(...response.data.data);
                });
            },
            getCategories: function () {
                this.post.category = this.category_list;
            }
        }
    }
</script>
