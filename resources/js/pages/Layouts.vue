<template>
    <div>
        <StepInfo step="2" :goBack="() => $router.push('/')">Какая у Вас <span>планировка?</span></StepInfo>
        <section class="layout">
            <div class="container-fluid">
                <div class="layout__inner row justify-content-between">
                    <BackButton prevPath="/" />
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-6" v-for="layout in layouts">
                                <div
                                    :class="`card layout__card clickable ${
                                        layout.id === selectedLayoutId ? 'layout__active' : ''
                                    }`"
                                    @click="layoutSelected(layout)"
                                >
                                    <div :class="`layout__card-image ${layout.id === selectedLayoutId ? 'layout__mobile_active' : ''}`">
                                        <img :src="layout.images[0].path" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{layout.space}} м2</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<NextButton nextPath="/rooms" :disabled="selectedLayoutId === null"/>-->
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import {mapGetters, mapMutations, mapState} from 'vuex';
    export default {
        name: "Layouts",
        components: {
            StepInfo: () => import('../components/StepInfo'),
            BackButton: () => import('../components/BackButton'),
            NextButton: () => import('../components/NextButton'),
        },
        computed: {
            ...mapGetters({
                layouts: 'getFilteredLayouts'
            }),
            ...mapState('order', ['selectedLayoutId']),
            ...mapState(['allComplexes'])
        },
        created() {
            if (!this.layouts.some((l) => l.id === this.selectedLayoutId)) {
                this.setSelectedLayoutId(null)
            }
        },
        methods: {
            ...mapMutations('order', ['setSelectedLayoutId']),
            layoutSelected (layout) {
                this.setSelectedLayoutId(layout.id);
                this.$router.push('/rooms');
            }
        }
    }
</script>

<style scoped>

</style>
