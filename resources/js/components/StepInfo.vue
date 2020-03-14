<template>
    <section class="title">
        <div class="title__inner">
            <div class="title__step-block">
                <h1 class="title__step">ШАГ {{ step }}/3</h1>
            </div>
            <div class="title__name-block">
                <div class="title__back" @click="goBack()" v-if="step > 1">
                    <img src="../../assets/img/back.png">
                </div>
                <div :class="step > 1 ? '' : 'col-12 pb-4'">
                    <h1 class="title__name">
                        <slot></slot>
                    </h1>
                </div>
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
            goBack: {
                type: Function,
                default: () => {}
            },
        },
        computed: {
            // ...mapState('stage', ['step'])
        }
    }
</script>

<style scoped>

</style>
