<template>
    <div class="row" v-images-loaded:on.progress="imageProgress">
        <div class="col-sm-3" v-for="media in medias">
            <div class="card mb-2">
                <img :src="media.url" :alt="media.original_filename" class="card-img-top"/>
                <div class="card-block">
                    <p class="card-text">
                        <small class="text-muted">Last updated {{ media.updated }}</small>
                    </p>
                    <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="#!" class="btn btn-danger" @click="removeImage(media)">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .card-block {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }
</style>
<script>
    import imagesLoaded from 'vue-images-loaded';

    export default {
        name: 'app',
        directives: {
            imagesLoaded
        },
        props: [
            'loading_medias',
            'data_confirm',
            'media',
        ],
        data() {
            return {
                medias: [],
                isLoading: false,
                endpoint: '/api/v1/medias',
            }
        },

        mounted() {
            this.retrieveMedias();
        },

        methods: {
            retrieveMedias() {
                this.isLoading = true;

                axios.get(this.endpoint).then(response => {
                    this.medias.push(...response.data.data);
                    this.isLoading = false;
                });
            },
            imageProgress(instance, image) {
                const result = image.isLoaded ? 'loaded' : 'broken';
                console.log('image is ' + result + ' for ' + image.img.src);
            },
            removeImage(media) {
                if (confirm(this.data_confirm)) {
                    axios.delete('/api/v1/medias/' + media.id)
                        .then(response => {
                            this.medias = this.medias.filter(item => {
                                return item.id !== media.id
                            })
                        })
                        .catch(error => {
                            console.log(error)
                        });
                }
            },
        }
    }
</script>
