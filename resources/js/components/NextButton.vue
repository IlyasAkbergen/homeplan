<template>
    <div :class="centered
        ? 'col main__save--button'
        : 'col-md-2 col-sm-12 nav__next--button'"
    >
        <router-link
            :to="nextPath"
            :class="`next--button ${disabled ? 'disabled' : ''}`"
            :event="!disabled ? 'click' : ''"
        >
            далее
        </router-link>
    </div>
</template>

<script>
    import { mapActions } from 'vuex';
    export default {
        name: "NextButton",
        props: {
            nextPath: String,
            disabled: {
                type: Boolean,
                default: false
            },
            centered: {
                type: Boolean,
                default: false,
            }
        },
        methods: {
            ...mapActions('stage', ['incrementStep']),
        }
    }
</script>

<style scoped>

</style>
