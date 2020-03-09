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
                            <input type="text" name = "address" class = "form-control main__select" placeholder = "Введите адресс">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <input type="text" name = "area" class = "form-control main__select" placeholder = "Введите площадь">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <NextButton
                            nextPath="/anotherRooms"
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
        name: "AnotherAppartment",
        components: {
            StepInfo: () => import('../components/StepInfo'),
            NextButton: () => import('../components/NextButton'),
        },
    }
</script>

<style scoped>

</style>