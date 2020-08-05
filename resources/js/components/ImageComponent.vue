<template>
    <div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" v-bind:src="image.fullPath" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{image.name}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'image-component',
        props: ['image'],
    }
</script>
