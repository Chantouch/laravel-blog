<template>
    <div v-images-loaded:on.progress="imageProgress">
        <div class="card" style="width: 20rem;" v-for="media in medias">
            <img :src="media.url" :alt="media.original_filename" class="card-img-top"/>
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</template>

<script>
    import imagesLoaded from 'vue-images-loaded';

    export default {
        name: 'app',
        directives: {
            imagesLoaded
        },
        props: [
            'loading_medias',
            'data_confirm'
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
            }
        }
    }
</script>
