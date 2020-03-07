<template>
    <div>
        <Header />
        <StepInfo step="1">
            Выберите ваш <span>ЖК</span>
        </StepInfo>
        <section class="main">
            <div class="container">
                <div class="main__inner">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <select class="main__select" >
                                <option selected>выбрать ЖК</option>
                                <option>выбрать ЖК</option>
                                <option>выбрать ЖК</option>
                                <option>выбрать ЖК</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center main__content">
                        <div class="col-xl-2 col-lg-3 col-md-4">
                            <h1 class="main__rooms">Количество комнат</h1>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-6 main__content--buttons">
                            <button class="main__content--button active">1</button>
                            <button class="main__content--button">2</button>
                            <button class="main__content--button">3</button>
                            <button class="main__content--button">4</button>
                            <button class="main__content--button">5+</button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col main__save--button" @click="this.incrementStep">
                            <router-link to="/layouts">далее</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import Header from '../components/Header';
    import StepInfo from '../components/StepInfo';
    import NextButton from '../components/NextButton';
    import { mapActions } from 'vuex';

    export default {
        name: "FirstStep",
        components: {
            NextButton,
            Header,
            StepInfo,
        },
        methods: {
            ...mapActions('stage', ['incrementStep']),
        }
    }
</script>

<style scoped>

</style>
