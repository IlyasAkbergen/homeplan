<template>
    <div>
        <StepInfo step="1">
            Выберите Ваш <span>ЖК</span>
        </StepInfo>
        <section class="main" v-show="!loading">
            <div class="container">
                <div class="main__inner">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <select class="main__select" v-model="complex">
                                <option :value="null">выбрать ЖК</option>
                                <option v-for="complex in allComplexes"
                                        :value="complex.id"
                                >{{ complex.name }}</option>
                                <option value="none">Другой</option>
                            </select>
                        </div>
                    </div>

                    <transition name="fade" mode="out-in">
                        <div v-if="this.selectedComplexId !== 'none'"
                             class="row justify-content-center main__content"
                             key="roomsCount"
                        >
                            <div class="col-xl-2 col-lg-3 col-md-4">
                                <h1 class="main__rooms">Количество комнат</h1>
                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-6 main__content--buttons">
                                <button :class="getClassOfRoomCount(1)"
                                        @click="setRoomsCount(1)">
                                    1
                                </button>
                                <button :class="getClassOfRoomCount(2)"
                                        @click="setRoomsCount(2)">
                                    2
                                </button>
                                <button :class="getClassOfRoomCount(3)"
                                        @click="setRoomsCount(3)">
                                    3
                                </button>
                                <button :class="getClassOfRoomCount(4)"
                                        @click="setRoomsCount(4)">
                                    4
                                </button>
                                <button :class="getClassOfRoomCount(5)"
                                        @click="setRoomsCount(5)">
                                    5+
                                </button>
                            </div>
                        </div>

                        <div v-if="selectedComplexId === 'none'" key="customComplex">
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
                                    <input type="number"
                                           value="0"
                                           name="area"
                                           class="form-control main__select"
                                           placeholder="Введите площадь"
                                           v-model="customComplex.space"
                                    >
                                </div>
                            </div>
                        </div>
                    </transition>

                    <div class="row justify-content-center">
                        <NextButton
                                :nextPath="`${complex === 'none' ? '/custom-room-types' : '/layouts'}`"
                                centered
                                :disabled="!allowNext"
                        />
                    </div>

                </div>
            </div>
        </section>
        <Loading v-show="loading" />
    </div>
</template>

<script>
    import { mapActions, mapState, mapMutations } from 'vuex';

    export default {
        name: "FirstStep",
        components: {
            StepInfo: () => import('../components/StepInfo'),
            NextButton: () => import('../components/NextButton'),
            Loading: () => import('../components/Loader'),
        },
        methods: {
            ...mapActions('stage', ['incrementStep']),
            ...mapMutations('order', ['setRoomsCount', 'setSelectedComplex', 'setSelectedRooms']),
            getClassOfRoomCount(count){
                return `main__content--button ${count === this.selectedRoomsCount ? 'active' : ''}`;
            },
        },
        computed: {
            ...mapState(['allComplexes', 'loading']),
            ...mapState('order', ['selectedComplexId', 'selectedRoomsCount', 'customComplex']),
            complex: {
                get () {
                    return this.selectedComplexId;
                },
                set (value) {
                    this.setSelectedComplex(value)
                }
            },
          allowNext () {
            if (this.selectedComplexId === 'none') {
              return this.customComplex.space && this.customComplex.space;
            } else {
              return this.selectedComplexId != null && this.selectedRoomsCount > 0;
            }
          },
        },
        created() {
          this.setSelectedRooms({})
        }
    }
</script>

