<template>
    <div>
        <div v-show="resultIsReady">
            <section class="result" id="result">
                <div class="result-slider"v-for="room in orderResult.rooms" :key="room.order_pivot_id">
                    <img :src="room.images[0].path">
                </div>
            </section>

            <section class="result__content">
                <div class="container-fluid">
                    <div class="result__content__inner">
                        <div class="row justify-content-between result__content--blocks">
                            <div class="col-lg-6 result__content--design ">
                                <div class="row">
                                    <a href="#"
                                       v-for="room in orderResult.rooms"
                                       class="result__content--link active"
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
                                    <input type="text" placeholder="Имя" v-model="clientname">
                                    <input type="text"
                                           placeholder="Телефон"
                                           v-model="clientphone"
                                           v-mask="`+7(###)-###-##-##`"
                                    >
                                    <button @click="submitForm">оформить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapMutations, mapState } from 'vuex';
    export default {
        name: "Result",
        component: {
            Loader: () => import('../components/Loader')
        },
        data(){
            return {
                resultIsReady: false,
            }
        },
        methods: {
            ...mapActions('order', [
                'getOrderResult',
                'setOrderClientInfo'
            ]),
            ...mapMutations('order', [
                'setClientName',
                'setPhone',
            ]),
            submitForm () {
                this.setOrderClientInfo({
                    id: this.orderResult.id,
                    clientName: this.clientname,
                    clientPhone: this.clientphone,
                }).then((r) => console.log(r));
            }
        },
        computed: {
            ...mapState('order', ['orderResult',
                'selectedComplexId',
                'selectedLayoutId',
                'selectedRooms',
                'clientName',
                'phone'
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
            }
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
