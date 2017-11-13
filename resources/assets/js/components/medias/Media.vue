<template>
    <b-tabs>
        <b-tab title="Media Library" active @click="retrieveMedias">
            <br>
            <media-list :data_confirm="data_confirm">
            </media-list>
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

    let photo_counter = 0;
    let csrt_token = window.axios.defaults.headers.common['X-CSRF-TOKEN'];
    export default {
        name: 'app',
        components: {
            vueDropzone: vue2Dropzone
        },
        props: [
            'media',
        ],
        data() {
            return {
                medias: [],
                isLoading: false,
                endpoint: '/api/v1/medias',
                dropzoneOptions: {
                    url: '/api/v1/medias',
                    thumbnailWidth: 200,
                    maxFilesize: 10,
                    headers: {'X-CSRF-TOKEN': csrt_token},
                    addRemoveLinks: true,
                    dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> UPLOAD ME",
                    dictFileTooBig: 'Image is bigger than 10MB',
                },
                data_confirm: 'Are you sure to delete this?'
            }
        },

        mounted() {
            //this.retrieveMedias();
        },

        methods: {
            retrieveMedias() {
                this.isLoading = true;

                axios.get(this.endpoint).then(response => {
                    this.medias.push(...response.data.data);
                    this.isLoading = false;
                });
            },
        }
    }
</script>
