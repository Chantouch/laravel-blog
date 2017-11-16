<template>
    <div>
        <input type="hidden" name="categories" :value="post.category">
        <label class="custom-control custom-checkbox" v-for="category in categories">
            <input type="checkbox" class="custom-control-input" :id="'checkbox-'+category.id" :value="category.id"
                   v-model="post.category">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">{{ category.name }}</span>
        </label>
        <div class="pull-right">
            <a href="javascript:void(0)" @click="addCategory()" :title="modal_title">
                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
            </a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModalCreateCategory" tabindex="-1" role="dialog"
             aria-labelledby="createCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">{{modal_title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Name:</label>
                                <input type="text" class="form-control" id="name" v-model="newCategory.name">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="form-control-label">Slug:</label>
                                <input type="text" class="form-control" id="slug" v-model="newCategory.slug">
                            </div>
                            <div class="form-group">
                                <label for="parent_id" class="form-control-label">Category:</label>
                                <select name="parent_id" id="parent_id" v-model="newCategory.parent_id"
                                        class="form-control">
                                    <option value=""></option>
                                    <option v-for="category in categories" :value="category.id" :id="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cat-description" class="form-control-label">Description:</label>
                                <textarea class="form-control" id="cat-description" v-model="newCategory.description">
                                </textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{modal_button_close}}
                        </button>
                        <button type="button" class="btn btn-primary" @click="createItem()">{{modal_button_save}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            category_list: {
                type: Array,
                required: false
            },
            modal_title: {
                type: String,
                required: true
            },
            modal_button_close: {
                type: String,
                required: true
            },
            modal_button_save: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                post: {
                    category: [],
                },
                categories: [],
                endpoint: '/api/v1/categories',
                newCategory: {
                    name: '',
                    slug: '',
                    parent_id: '',
                    description: ''
                },
                formErrors: {},
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
                    //this.categories.push(...response.data.data);
                    this.categories = response.data.data;
                });
            },
            getCategories: function () {
                this.post.category = this.category_list;
            },
            addCategory: function () {
                $("#myModalCreateCategory").modal('show');
            },
            createItem: function () {
                let input = this.newCategory;
                let vm = axios;
                vm.post(this.endpoint, input).then((response) => {
                    this.newCategory = {
                        name: '',
                        slug: '',
                        parent_id: '',
                        description: ''
                    };
                    $("#myModalCreateCategory").modal('hide');
                    this.categoriesList();
                }, (response) => {
                    this.formErrors = response.data;
                });
            },

        }
    }
</script>
