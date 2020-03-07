<template>
    <div>
        <Header />
        <StepInfo step="2">Какая у вас <span>планировка?</span></StepInfo>
        <section class="layout">
            <div class="container-fluid">
                <div class="layout__inner row justify-content-between">
                    <BackButton prevPath="/" />
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" v-for="layout in layouts">
                                <div
                                    :class="`card layout__card ${
                                        layout.id === selectedLayoutId ? 'layout__active' : ''
                                    }`"
                                    @click="setSelectedLayoutId(layout.id)"
                                >
                                    <div class="layout__card-image">
                                        <img :src="layout.images[0].path" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">42 м2</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <NextButton nextPath="/rooms" :disabled="selectedLayoutId === null"/>
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
            Header: () => import('../components/Header')
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
        }
    }
</script>

<style scoped>

</style>
