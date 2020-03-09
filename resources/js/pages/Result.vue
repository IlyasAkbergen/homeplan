<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>
        <div v-show="resultIsReady">
                <b-carousel
                        id="carousel-1"
                        v-model="slide"
                        :interval="4000"
                        background="#ababab"
                        img-width="1366"
                        img-height="180"
                        style="text-shadow: 1px 1px 2px #333;"
                        @sliding-start="onSlideStart"
                        @sliding-end="onSlideEnd"
                        touch
                >
                    <b-carousel-slide v-for="(room,index) in orderResult.rooms" :key="index">
                        <template v-slot:img>
                            <img
                                    class="d-block img-fluid w-100 class-name"
                                    width="1024"
                                    height="180"
                                    :src="room.images[0].path"
                                    alt="image slot">
                        </template>
                    </b-carousel-slide>
                </b-carousel>


            <section class="result__content">
                <div class="container-fluid">
                    <div class="result__content__inner">
                        <div class="row justify-content-between result__content--blocks">
                            <div class="col-lg-6 result__content--design ">
                                <div class="row">
                                    <a href="#"
                                       v-for="(room, index) in orderResult.rooms"
                                       @click = "setSlide(index)"
                                       :class="`result__content--link ${index===slide ? 'active':''}`"
                                    >{{ room.type.name }}</a>
                                </div>
                                <h1>В дизайн-проект входит:</h1>
                                <p>1. Обмерный план </p>
                                <p>2. План монтажа </p>
                                <p>3. План расстановки мебели </p>
                                <p>4. План пола </p>
                                <p>5. План расстановки сантехнического оборудования </p>
                                <p>6. План электрики </p>
                                <p>7. Развертки помещений </p>
                                <p>8. Сводные ведомости отделочных материалов, мебели и др. </p>
                                <p>9. 3Д визуализации </p>
                                <p>10. Смета на ремонт и материал</p>

                            </div>
                            <div class="result__content--cost">
                                <h1>Стоимость дизайн-проекта</h1>
                                <h2>ЖК “Достык”, 68 кв.м.</h2>
                                <div class="row justify-content-between">
                                    <p class="content__cost__right">Разработка 3D визуализации</p>
                                    <p class="content__cost__left">от 20 000 тг.</p>
                                </div>
                                <div class="row justify-content-between">
                                    <p class="content__cost__right" >Планировочные решения и перепланировка</p  >
                                    <p class="content__cost__left" >от 25 000 тг.</p>
                                </div>
                                <div class="row justify-content-between">
                                    <p class="content__cost__right">Разработка рабочей документации</p >
                                    <p class="content__cost__left">от 19 000 тг.</p>
                                </div>
                                <div class="row justify-content-between">
                                    <p class="content__cost__right">Составление смет и ведомостей</p>
                                    <p class="content__cost__left">от 15 000 тг.</p>
                                </div>
                                <div class="row justify-content-between">
                                    <h3>итого:</h3>
                                    <h3>79 000 тг.</h3>
                                </div>
                                <div class="result__content--input">
                                    <h4>Оформить заказ</h4>
                                    <input type="text" placeholder="Имя">
                                    <input type="text" placeholder="Телефон">
                                    <button>оформить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<!--<script type="text/javascript" src="../../assets/javascript/slider.js"></script>-->
<!--<script type="text/javascript" src="../../assets/slick/slick.min.js"></script>-->

<script>
    import { mapActions, mapState } from 'vuex';
    export default {
        name: "Result",
        component: {
            Loader: () => import('../components/Loader')
        },
        data(){
            return {
                resultIsReady: false,
                slide:0,
                sliding: null,
            }
        },
        methods: {
            ...mapActions('order', ['getOrderResult']),
            onSlideStart(slide) {
                this.sliding = true
            },
            onSlideEnd(slide) {
                this.sliding = false
            },
            setSlide(num){
                this.slide = num;

            }
        },
        computed: {
            ...mapState('order', ['orderResult',
                'selectedComplexId',
                'selectedLayoutId',
                'selectedRooms',
            ]),
        },
        created(){
            this.getOrderResult({
                selectedComplexId: this.selectedComplexId,
                selectedLayoutId: this.selectedLayoutId,
                selectedRooms: this.selectedRooms,
            }).then(() => {
                this.resultIsReady = true;
            })

        }


    }
</script>

<style scoped>
    @import '../../assets/slick/slick.css';
    @import "../../assets/slick/slick-theme.css";
</style>

<style>
    .class-name{
        max-width:100%;
        /*width: 100%;*/
        min-height: 40vh;
        /*object-fit: cover;*/
        max-height:600px;

    }
</style>


