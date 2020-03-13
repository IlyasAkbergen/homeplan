<template>
    <div>
        <transition name="fade" mode="out-in">
            <StepInfo step="3" :goBack="backClicked">
                Выберите стиль для комнаты: <span>{{ selectedRoomType ? selectedRoomType.name : '' }}</span>
            </StepInfo>
        </transition>
        <section class="rooms">
            <div class="container-fluid">
                <div class="rooms__inner row align-items-center justify-content-between">
                    <BackButton :onClick="backClicked" />
                    <div class="col-md-8">
                        <div class="row rooms__button__group">
                            <div class="col-xl col-lg-3 col-md-4 col-4"
                                 v-for="(roomType, index) in selectedRoomTypes">
                                <a
                                    href="#"
                                    :class="`room--button ${
                                      selectedRoomType.pivot_id === roomType.pivot_id
                                        ? 'active' : ''}
                                      ${ selectedRooms[roomType.pivot_id] ? 'done' : ''}
                                    `"
                                    @click="setSelectedRoomTypeIndex(index)"
                                >
                                    {{ roomType.name }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <NextButton :onClick="nextClicked" :disabled="!allowNext" />
                </div>
                <div class="rooms__message">
                    <h1>Выберите понравившийся интерьер</h1>
                </div>
            </div>
            <div class="container-fluid rooms__container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-sm-12 room-mobile"
                         v-for="(room, key) in rooms"
                         :key="room.id"
                    >
                        <div class="card rooms--card active">
                            <div class="rooms__card-image">
                                <img :src="room.images[0].path" class="card-img-top zoom">
                                <div :class="`rooms__card--image__wrapper ${ currentSelectedRoomId === room.id ? 'active' : '' }`">
                                    <a href="#" class="room__zoom" @click="openZoom(key)">
                                        <img src="../../assets/img/zoom.png">
                                    </a>
                                    <div
                                         :class="`rooms__card--image__layer ${ currentSelectedRoomId === room.id ? 'active' : '' }`"
                                    >
                                        <a href=# @click="switchSelectedRoom({ value: room.id, roomTypePivotId: selectedRoomType.pivot_id })">
                                            {{ currentSelectedRoomId === room.id ? 'Выбрано' : 'Выбрать' }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <b-modal ref="zoom-modal" hide-footer>
            <section class="getmodal" id="getmodal">
                <div onclick="closeZoom()" class="modal__backdrop"></div>
                <div class="modal__inner">
                    <img onclick="closeZoom()"
                         class="closeicon"
                         src="../../assets/img/close.png"
                    >
                    <img src="../../assets/img/prev.png"
                         class="previcon"
                         @click="nextZoom()"
                    >
                    <img :src="zoomedRoom ? zoomedRoom.images[0].path : ''"
                         id="modal-img"
                    >
                    <img src="../../assets/img/next.png"
                         class="nexticon"
                         @click="prevZoom()"
                    >
                    <button @click="switchSelectedRoom({ value: zoomedRoom.id, roomTypePivotId: selectedRoomType.pivot_id })">
                        Выбрать
                    </button>
                </div>
            </section>
        </b-modal>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapMutations} from 'vuex';
    export default {
        name: "Rooms",
        components: {
            StepInfo: () => import('../components/StepInfo'),
            BackButton: () => import('../components/BackButton'),
            NextButton: () => import('../components/NextButton'),
        },
        data(){
            return {
                selectedRoomTypeIndex: 0,
                zoomedRoomIndex: 0,
            }
        },
        computed: {
            ...mapState('order', ['selectedRooms', 'selectedComplexId']),
            ...mapGetters(['selectedRoomTypes']),
            allowNext () {
                return this.isLastRoomType
                  ? this.selectedRoomTypes
                    && this.selectedRoomTypes.length === Object.keys(this.selectedRooms).length
                  : this.allowNextRoomTypeSelection;
            },
            allowNextRoomTypeSelection () {
                return this.selectedRoomTypeIndex < this.selectedRoomTypes.length
                    && this.currentRoomTypeStyleSelected;
            },
            currentRoomTypeStyleSelected () {
                return this.currentSelectedRoomId !== null;
            },
            selectedRoomType () {
                return this.selectedRoomTypes
                    ? this.selectedRoomTypes[this.selectedRoomTypeIndex]
                    : null;
            },
            rooms () {
                return this.selectedRoomType ? this.selectedRoomType.rooms : []
            },
            currentSelectedRoomId () {
                return this.selectedRooms[this.selectedRoomType.pivot_id] ?? null
            },
            prevPath () {
                return this.selectedComplexId === 'none'
                  ? '/custom-room-types' : '/layouts';
            },
            nextPath () {
                return '/result';
            },
            isLastRoomType () {
                return this.selectedRoomTypeIndex === this.selectedRoomTypes.length - 1
            },
            isFirstRoomType () {
                return this.selectedRoomTypeIndex === 0;
            },
            zoomedRoom () {
                return this.rooms ? this.rooms[this.zoomedRoomIndex] : {};
            }
        },
        methods: {
            setSelectedRoomTypeIndex (value) {
                this.selectedRoomTypeIndex = value
            },
            ...mapMutations('order', ['switchSelectedRoom']),
            backClicked () {
              if (!this.isFirstRoomType) {
                return this.selectedRoomTypeIndex = this.selectedRoomTypeIndex - 1;
              } else {
                return this.$router.push(this.prevPath);
              }
            },
            nextClicked () {
              if ( !this.isLastRoomType ) {
                return this.selectedRoomTypeIndex = this.selectedRoomTypeIndex + 1;
              } else {
                return this.$router.push(this.nextPath);
              }
            },
            openZoom (index) {
                this.zoomedRoomIndex = index ? index : 0;
                this.$refs['zoom-modal'].show();
            },
            closeZoom () {
                this.$refs['zoom-modal'].hide();
            },
            nextZoom () {
                this.zoomedRoomIndex = this.zoomedRoomIndex + 1 === this.rooms.length
                    ? this.zoomedRoomIndex + 1
                    : 0;
            },
            prevZoom () {
                this.zoomedRoomIndex = this.zoomedRoomIndex === 0
                    ? this.rooms.length - 1
                    : this.zoomedRoomIndex - 1;
            }
        },
    }
</script>

<style scoped>

</style>
