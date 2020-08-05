<template>
    <div>
        <div class="navbar navbar-dark bg-primary">
            <span class="navbar-brand mb-0 h1">Image galery - Webex</span>
        </div>

        <div class="container">
            <div class="row">
                <NewImage @saved="showNewImage"/>
                <div class="offset-1"></div>
                <div class="col-4 pt-4 d-flex align-items-stretch" v-for="image in images" v-bind:key="image.id">
                    <imageComponent @remove="removeImage" :image="image"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import NewImage from './NewImage'
    import ImageComponent from "./ImageComponent"

    export default {
        name: 'app',
        components: {
            NewImage, ImageComponent
        },
        data() {
            return {
                images: {},
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
            }
        }
    }
</script>
