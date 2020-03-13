<template>
    <div :class="centered
        ? 'col main__save--button'
        : 'col-md-2 nav__next--button justify-content-center'"
    >
        <a class="next--button"
           :class="`next--button ${disabled ? 'disabled' : ''}`"
           href="#"
           @click="clickHandler()"
        >
            далее
        </a>
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
            },
            onClick: {
                type: Function,
                default: () => null
            }
        },
        methods: {
            ...mapActions('stage', ['incrementStep']),
            clickHandler () {
              this.incrementStep();
              return this.onClick()
                ? null : this.$router.push(this.nextPath);
            }
        }
    }
</script>

<style scoped>

</style>
