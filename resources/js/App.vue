<template>
    <transition name="fade">
        <router-view />
    </transition>
</template>

<script>
    import { mapActions } from 'vuex';
    export default {
        name: 'App',
        mounted() {
            this.getAllComplexes();
        },
        methods: {
            ...mapActions([
                'getAllComplexes',
            ])
        }
    }
</script>

<style lang="sass">
    @import "../assets/style/all.css"

    .component-fade-enter-active, .component-fade-leave-active, .fade-enter-active, .fade-leave-active
        transition: opacity .3s ease
    .component-fade-enter, .component-fade-leave-to, .fade-enter, .fade-leave-to
        opacity: 0
</style>
