<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>
        <div v-show="resultIsReady">
            <b-carousel
                    id="carousel-1"
                    v-model="slide"
                    background="#ababab"
                    img-width="1366"
                    img-height="180"
                    style="text-shadow: 1px 1px 2px #333;"
                    controls
                    @sliding-start="onSlideStart"
                    @sliding-end="onSlideEnd"
                    touch
            >
                <b-carousel-slide v-for="(room,index) in orderResult.rooms" :key="index">
                    <template v-slot:img>
                        <img
                                class="d-block img-fluid w-100 class-name result"
                                width="1024"
                                height="180"
                                :src="room.images[0].path"
                                alt="image slot">
                    </template>
                </b-carousel-slide>
            </b-carousel>

            <section class="result__content">
                <div class="result__navbar">
                    <a href="#"
                       v-for="(room, index) in orderResult.rooms"
                       @click.prevent="setSlide(index)"
                       :class="`result__content--link mobile ${index === slide ? 'active':''}`"
                       style="z-index: 100"
                    >{{ room.type.name }}</a>
                </div>
                <div class="container-fluid">
                    <div class="result__content__inner">
                        <div class="row justify-content-between result__content--blocks">
                            <div class="col-lg-6 result__content--design ">
                                <div class="row">
                                    <a href="#"
                                       v-for="(room, index) in orderResult.rooms"
                                       @click.prevent="setSlide(index)"
                                       :class="`result__content--link  ${index === slide ? 'active':''}`"
                                       style="z-index: 100"
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
                            <div class="result__content--cost" >
                                <div class="row justify-content-between">
                                    <h1>Стоимость дизайн-проекта</h1>
                                    <h2 v-if="orderResult.complex !== null
                                        && resultIsReady">
                                            {{ orderResult.complex.name || '' }}
                                    </h2>
                                    <h2 v-else>
                                        {{ this.customComplex.address || '' }}
                                    </h2>
                                </div>
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
                                    <h3>{{ orderResult.price }}тг.</h3>
                                </div>
                                <div class="row result__content--input" id = "form-submit">
                                    <h4>Оформить заказ</h4>
                                    <form @submit.prevent="submitForm" class="col-12 p-0">
                                        <input type="text" placeholder="Имя" v-model="clientname" required>
                                        <input type="text"
                                               placeholder="Телефон"
                                               v-model="clientphone"
                                               v-mask="`+7(###)-###-##-##`"
                                               required
                                        >
                                        <button type="submit"
                                                :class="`${loading ? 'disabled' : ''}`"
                                                :disabled="loading">
                                            оформить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer__inner">
                        <h1>{{ orderResult.price }}тг.</h1>
                        <a href="#form-submit"> <button>оставить заявку</button></a>
                    </div>
                </div>
            </footer>
        </div>
        <Loader v-show="!resultIsReady" text="Рассчитываем стоимость" />
        <b-modal ref="order-created-modal" hide-footer>
            <div class="d-block text-center">
                <h3>Ваша заявка успешно создана!</h3>
            </div>
            <b-button
                    class="mt-3"
                    block
                    @click="hideModal"
            >На главную</b-button>
        </b-modal>
    </div>
</template>

<script>
    import { mapActions, mapMutations, mapState } from 'vuex';
    export default {
        name: "Result",
        components: {
            Loader: () => import('../components/Loader'),
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
            },
            ...mapActions('order', [
                'getOrderResult',
                'setOrderClientInfo'
            ]),
            ...mapMutations('order', [
                'setClientName',
                'setPhone',
                'setLoading'
            ]),
            submitForm () {
                this.setOrderClientInfo({
                    id: this.orderResult.id,
                    clientName: this.clientname,
                    clientPhone: this.clientphone,
                }).then(() => {
                    this.$router.push('/success-order');
                    this.setLoading(false)
                }).catch(() => {
                    this.setLoading(false)
                });
            },
            hideModal(){
                this.$refs['order-created-modal'].hide();
                this.$router.push('/');
                location.reload();
            }
        },
        computed: {
            ...mapState('order', [
                'orderResult',
                'selectedComplexId',
                'selectedLayoutId',
                'selectedRooms',
                'clientName',
                'phone',
                'customComplex',
                'loading',
            ]),
            clientname: {
                get () {
                    return this.clientName;
                },
                set (value) {
                    this.setClientName(value);
                }
            },
            clientphone: {
                get () {
                    return this.phone;
                },
                set (value) {
                    this.setPhone(value);
                }
            },
        },
        created(){
            this.getOrderResult({
                selectedComplexId: this.selectedComplexId,
                selectedLayoutId: this.selectedLayoutId,
                selectedRooms: this.selectedRooms,
                customAddress: this.customComplex.address,
                customSpace: this.customComplex.space,
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
        object-fit: cover;
        max-height:600px;
    }
</style>


