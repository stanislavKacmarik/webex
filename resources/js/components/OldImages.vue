<template>
    <div>
        <div v-for="image in images" v-bind:key="image.id">
            <imageComponent :image="image"/>
        </div>
    </div>
</template>

<script>
    import ImageComponent from "./ImageComponent";

    export default {
        name: 'old-images',
        components: {ImageComponent},
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

            }
        }
    }
</script>
