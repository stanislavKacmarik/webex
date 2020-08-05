<template>
    <div>
        <div class="navbar navbar-dark bg-primary">
            <span class="navbar-brand mb-0 h1">Image galery - Webex</span>
        </div>

        <div class="container">
            <OldImages/>
            <NewImage/>

        </div>
    </div>
</template>

<script>
    import NewImage from './NewImage'
    import OldImages from './OldImages'

    export default {
        name: 'app',
        components: {
            NewImage, OldImages
        }

    }
</script>
