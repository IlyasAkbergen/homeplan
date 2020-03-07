<template>
    <div class="col-md-2 col-sm-12 nav__prev--button" @click="this.decrementStep">
        <router-link :to="prevPath" class="prev--button">назад</router-link>
    </div>
</template>

<script>
    import { mapActions } from 'vuex';
    export default {
        name: "BackButton",
        props: {
            prevPath: String,
        },
        methods: {
            ...mapActions('stage', ['decrementStep']),
        }
    }
</script>

<style scoped>

</style>
