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
</style>
