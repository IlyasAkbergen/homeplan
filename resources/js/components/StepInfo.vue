<template>
    <section class="title">
        <div class="container-fluid">
            <div class="title__inner">
                <h1 class="title__step">ШАГ {{ step }}/6</h1>
                <h1 class="title__name">
                    <slot></slot>
                </h1>
            </div>
        </div>
    </section>
</template>

<script>
    // import { mapState } from 'vuex';
    export default {
        name: "StepInfo",
        props: {
            title: String,
            step: Number|String,
        },
        computed: {
            // ...mapState('stage', ['step'])
        }
    }
</script>

<style scoped>

</style>
