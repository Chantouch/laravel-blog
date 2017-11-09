<template>
    <b-tabs>
        <b-tab title="Media Library" active>
            <br>I'm the first fading tab
        </b-tab>
        <b-tab title="Uploads">
            <br>
            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
        </b-tab>
    </b-tabs>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.css'

    export default {
        name: 'app',
        components: {
            vueDropzone: vue2Dropzone
        },
        props: [],
        data() {
            return {
                medias: [],
                isLoading: false,
                endpoint: '/api/v1/medias',
                dropzoneOptions: {
                    url: '/api/v1/medias',
                    thumbnailWidth: 200,
                    maxFilesize: 10,
                    headers: {'X-CSRF-TOKEN': window.axios.defaults.headers.common['X-CSRF-TOKEN']},
                    addRemoveLinks: true,
                    dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> UPLOAD ME"
                }
            }
        },

        mounted() {
            this.retrieveComments();
        },

        methods: {
            retrieveComments() {
                console.log('Method run...!')
            }
        }
    }
</script>
