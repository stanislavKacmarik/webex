<template>
    <div>
        <div class="navbar navbar-dark bg-primary">
            <span class="navbar-brand mb-0 h1">Image galery - Webex</span>
        </div>

        <LightBox v-if="showGallery" :loop="true" :media="media"></LightBox>
        <div class="container">
            <div class="row">
                <NewImage @saved="showNewImage"/>
                <div class="offset-1"></div>
                <div class="col-4 pt-4 d-flex align-items-stretch" v-for="image in images" v-bind:key="image.id">
                    <imageComponent @openGallery="openGallery" @remove="removeImage" :image="image"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import NewImage from './NewImage'
    import ImageComponent from "./ImageComponent"
    import LightBox from 'vue-image-lightbox'

    export default {
        name: 'app',
        components: {
            NewImage, ImageComponent, LightBox
        },
        data() {
            return {
                images: {},
                showGallery: false,
                media: [
                    {
                        thumb: 'https://i-thethao.vnecdn.net/2018/05/27/000-15E0FA-1527377507_680x0.jpg',
                        src: 'https://i-thethao.vnecdn.net/2018/05/27/000-15E0FA-1527377507_680x0.jpg',
                    },
                    {
                        thumb: 'https://i-thethao.vnecdn.net/2018/05/27/000-15E0FA-1527377507_680x0.jpg',
                        src: 'https://i-thethao.vnecdn.net/2018/05/27/000-15E0FA-1527377507_680x0.jpg',
                    },
                ]
            }
        },
        created() {
            this.getImages();
        },
        methods: {
            getImages() {
                axios.get('/image')
                    .then(resp => {
                        this.images = resp.data;
                    });

            },
            showNewImage(value) {
                this.images.unshift(value);
            },
            removeImage(value) {
                this.images = this.images.filter(function (image) {
                    return image.id !== value
                })
            },
            openGallery(value) {
                // transform data
                this.media = this.images.map(function (image) {
                    return {
                        thumb: image.fullPath,
                        src: image.fullPath
                    }
                });
                this.showGallery = value;
            }
        }
    }
</script>
