<template>
    <form class="col-3 pt-4" v-on:submit.prevent="save">
        <div class="form-group">
            <h2 class="text-center">
                <label for="image">Add image</label>
            </h2>
            <img class="card-img-top pb-4" v-if="image" v-bind:src="image.fullPath" alt="Card image cap">
            <input ref="image" v-on:change="uploadFile()"
                   type="file" id="image" accept="image/png, image/jpeg">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input v-model="description" v-on:change="" type="text" id="description" placeholder="Add description"
                   class="form-control">
        </div>

        <div class="mx-auto text-center">
            <button type="submit" class="btn btn-primary center">Save</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: 'new-image',
        data() {
            return {
                form: '',
                description: '',
                image: '',
                id: 0,
            }
        },
        methods: {
            uploadFile() {
                let img = this.$refs.image.files[0];
                let fd = new FormData();
                fd.append('image', img);
                axios.post('/image', fd)
                    .then(resp => {
                        this.image = resp.data;
                    });
            },
            save() {
                axios.put('/image/' + this.image.id, {
                    description: this.description
                }).then(resp => {
                    this.$emit('saved', resp.data);
                    this.image = null;
                    this.description = '';
                });
            }
        }
    }
</script>
