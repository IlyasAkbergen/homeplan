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
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <div class="card layout__card layout__active">
                                    <div class="layout__card-image">
                                        <img src="" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">42 м2</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <NextButton nextPath="/rooms" />
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import StepInfo from "../components/StepInfo";
    import BackButton from "../components/BackButton";
    import NextButton from "../components/NextButton";

    export default {
        name: "Layouts",
        components: {
            StepInfo,
            BackButton,
            NextButton,
        }
    }
</script>

<style scoped>

</style>
