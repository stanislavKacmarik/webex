<template>

    <div v-on:click.self="openGallery" class="card card-image" style="width: 100%;">

        <img class="card-img-top" v-bind:src="image.fullPath" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Description</h5>
            <p class="card-text">{{image.description}}</p>
        </div>
        <button href="#" @click="remove()" class="btn btn-danger delete">Delete</button>

    </div>

</template>

<script>
    export default {
        name: 'image-component',
        props: ['image'],
        methods: {
            remove() {
                axios.delete('/image/' + this.image.id)
                    .then(resp => {
                        this.$emit('remove', this.image.id);
                        this.$destroy();
                    });
            },
            openGallery() {
                this.$emit('openGallery', true);
            }
        }
    }
</script>
