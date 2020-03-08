<template>
    <div>
        <Header />
        <transition name="slide-fade" mode="out-in">
            <router-view />
        </transition>
    </div>
</template>

<script>
    import { mapActions, mapState } from 'vuex';
    export default {
        name: 'App',
        components: {
            Header: () => import('./components/Header'),
        },
        mounted() {
            this.getAllComplexes();
            this.$router.push('/');
        },
        methods: {
            ...mapActions([
                'getAllComplexes',
            ]),
        },
        computed: {
            ...mapState('stage', ['step']),
        }
    }
</script>

<style lang="sass">
    @import "../assets/style/all.css"

    /*.component-fade-enter-active, .component-fade-leave-active, .fade-enter-active, .fade-leave-active*/
    /*    transition: opacity .3s ease*/
    /*.component-fade-enter, .component-fade-leave-to, .fade-enter, .fade-leave-to*/
    /*    opacity: 0*/
    .slide-fade-enter-active
        transition: all .2s ease
    .slide-fade-leave-active
        transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0)
    .slide-fade-enter, .slide-fade-leave-to
      transform: translateX(10px)
      opacity: 0
</style>
