<template>
    <div class="col-md-2 nav__prev--button">
        <a class="prev--button"
           href="#"
           @click="clickHandler()"
        >назад</a>
    </div>
</template>

<script>
    import { mapActions } from 'vuex';
    export default {
        name: "BackButton",
        props: {
            prevPath: String,
            onClick: {
                type: Function,
                default: () => null
            }
        },
        methods: {
            ...mapActions('stage', ['decrementStep']),
            clickHandler () {
                this.decrementStep();
                return this.onClick()
                  ? null : this.$router.push(this.prevPath);
            }
        }
    }
</script>

<style scoped>

</style>
