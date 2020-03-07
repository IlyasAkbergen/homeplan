<template>
<!--    <div class="col main__save&#45;&#45;button" @click="this.incrementStep">-->
<!--        <router-link :to="nextPath">далее</router-link>-->
<!--    </div>-->
    <div class="col-md-2 col-sm-12 nav__next--button">
        <router-link :to="nextPath" class="next--button">далее</router-link>
    </div>
</template>

<script>
    import { mapActions } from 'vuex';
    export default {
        name: "NextButton",
        props: {
            nextPath: String,
        },
        methods: {
            ...mapActions('stage', ['incrementStep']),
        }
    }
</script>

<style scoped>

</style>
