<template>
    <div>
        <img :src="option.url" :alt="option.alt" v-if="option.is_loading" class="img-fluid mx-auto d-block">
        <input type="hidden" name="tags" :value="post.tag">
        <label class="custom-control custom-checkbox" v-for="tag in tags">
            <input type="checkbox" class="custom-control-input" :id="'checkbox-'+tag.id" :value="tag.id"
                   v-model="post.tag">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">{{ tag.name }}</span>
        </label>

        <div class="pull-right">
            <a href="javascript:void(0)" @click="addItem()" :title="modal_title">
                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
            </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModalCreateItem" tabindex="-1" role="dialog"
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
                                <input type="text" class="form-control" id="name" v-model="newItem.name">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="form-control-label">Slug:</label>
                                <input type="text" class="form-control" id="slug" v-model="newItem.slug">
                            </div>
                            <div class="form-group">
                                <label for="tag-description" class="form-control-label">Description:</label>
                                <textarea class="form-control" id="tag-description"
                                          v-model="newItem.description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{modal_button_close}}
                        </button>
                        <button type="button" class="btn btn-primary" @click="createItem()">
                            {{modal_button_save}}
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
            tag_list: {
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
                    tag: [],
                },
                tags: [],
                endpoint: '/api/v1/tags',
                newItem: {
                    name: '',
                    slug: '',
                    description: ''
                },
                formErrors: {},
                option: {
                    url: '/images/loading.gif',
                    is_loading: true,
                    alt: 'Please wait me!'
                },
            }
        },

        mounted() {
            this.tagsList();
            this.getTags();
        },

        methods: {
            tagsList: function () {
                let vm = axios;
                this.option.is_loading = true;
                vm.get(this.endpoint).then(response => {
                    this.tags = response.data.data;
                    this.option.is_loading = false;
                });
            },
            getTags: function () {
                this.post.tag = this.tag_list;
            },
            addItem: function () {
                $("#myModalCreateItem").modal('show');
            },
            createItem: function () {
                let input = this.newItem;
                let vm = axios;
                vm.post(this.endpoint, input).then((response) => {
                    this.newItem = {
                        name: '',
                        slug: '',
                        description: ''
                    };
                    $("#myModalCreateItem").modal('hide');
                    this.tagsList();
                }, (response) => {
                    this.formErrors = response.data;
                });
            },
        }
    }
</script>
