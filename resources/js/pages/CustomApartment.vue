<template>
    <div>
        <StepInfo step="1">
            Выберите ваш <span>ЖК</span>
        </StepInfo>
        <section class="main">
            <div class="container">
                <div class="main__inner">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <input type="text"
                                   name="address"
                                   class="form-control main__select"
                                   placeholder="Введите адресс"
                                   v-model="customComplex.address"
                            >
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <input type="text"
                                   name="area"
                                   class="form-control main__select"
                                   placeholder="Введите площадь"
                                   v-model="customComplex.space"
                            >
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <NextButton
                            nextPath="/custom-room-types"
                            centered
                            :disabled="!allowNext"
                        />
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import { mapActions, mapState, mapMutations } from 'vuex';
    export default {
        name: "CustomApartment",
        components: {
            StepInfo: () => import('../components/StepInfo'),
            NextButton: () => import('../components/NextButton'),
        },
        computed: {
          ...mapState('order', ['customComplex']),
          allowNext(){
            return this.customComplex.space && this.customComplex.space;
          },
        },
    }
</script>

<style scoped>

</style>