window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";
Vue.config.productionTip = false;

import BootstrapVue from 'bootstrap-vue'

Vue.component('comment', require('./components/comments/Comment.vue'));
Vue.component('comment-list', require('./components/comments/Comment-list.vue'));
Vue.component('comment-form', require('./components/comments/Comment-form.vue'));
Vue.component('media', require('./components/medias/Media.vue'));
Vue.component('media-list', require('./components/medias/Media-list.vue'));
Vue.component('post-categories', require('./components/posts/Post.vue'));
Vue.component('post-tags', require('./components/posts/Tag.vue'));
Vue.component('right-sidebar-category', require('./components/right-sidebar/Category.vue'));
Vue.component('right-sidebar-latest-post', require('./components/right-sidebar/LatestPost.vue'));
Vue.component('right-sidebar-popular-post', require('./components/right-sidebar/PopularPost.vue'));
Vue.component('tags-list', require('./components/home/Tag.vue'));
Vue.component('post-tags-list', require('./components/posts/PostTag.vue'));
Vue.component('post-slug-widget', require('./components/posts/SlugWidget.vue'));

Vue.use(BootstrapVue);

window.Event = new Vue();

const app = new Vue({
    el: '#app',

    mounted() {
        $('[data-confirm]').on('click', function() {
            return confirm($(this).data('confirm'))
        })
    }
});
