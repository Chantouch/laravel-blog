window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'

Vue.component('comment', require('./components/comments/Comment.vue'));
Vue.component('comment-list', require('./components/comments/Comment-list.vue'));
Vue.component('comment-form', require('./components/comments/Comment-form.vue'));
Vue.component('media', require('./components/medias/Media.vue'));
Vue.component('media-list', require('./components/medias/Media-list.vue'));
Vue.component('media-image', require('./components/medias/Images.vue'));

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
